from flask import Flask, jsonify, request, Response, render_template
from flask_cors import CORS

import easyocr
import bentoml
import cv2
import re
import numpy as np

app = Flask(__name__)
    
def preprocessing_image(image_path, ktp = True):
    image_path = f"public/{image_path}"
    image = cv2.imread(image_path)
    gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY) # convert to gray

    if ktp:
        resize = cv2.resize(gray, (1500, 1000)) # resize image to 1000*600
        blur = cv2.GaussianBlur(resize, (3,3), 0) # blur
        return np.clip(blur * 1.5, 0, 255).astype(np.uint8) # add brightness
    else:
        otsu_binary = cv2.threshold(gray, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)[1]
        output_path = 'registrar/threshold.jpg'
        cv2.imwrite(output_path, otsu_binary)
        return otsu_binary

def get_texts(image, paragraph = False):
    loaded_reader = bentoml.easyocr.load_model('id-reader')
    return loaded_reader.readtext(image, detail=0, paragraph=paragraph)


# fungsi mengekstrak data nama dari ktp hasil ocr
def contains_number(string):
    return any(char.isdigit() for char in string)

def get_name(ktp_lists):
  new_list = [x for x in ktp_lists if (x.isupper() and not contains_number(x) and True)]
  index_name = [index for index, x in enumerate(new_list) if (x.isupper() and (x.lower() == 'laki-laki' or x.lower() == 'perempuan'))][0] - 1
  return [x for x in ktp_lists if (x.isupper() and not contains_number(x) and True)][index_name].title()


# extract information needed in ktp
def get_ktp_info(ktp_lists):
    data = {}
    # get nik
    data['nik'] = [x for x in ktp_lists if x.isdigit()][0]
    data['name'] = get_name(ktp_lists)

    temp_born = [x for x in ktp_lists if any(c.isdigit() for c in x)][1]
    born_place = re.sub('[^a-zA-Z]+', '', temp_born).title()
    data['born_place'] = born_place

    temp_date = [x for x in ktp_lists if any(c.isdigit() for c in x)][1]
    date = ''.join([x for x in temp_date if x.isdigit()])
    data['birth_date'] = f"{date[4:]}-{date[2:4]}-{date[:2]}"

    temp_gender = [x for x in ktp_lists if ("laki" in x.lower() or "puan" in x.lower())][0].lower()
    gender = 'male' if('ki' in temp_gender) else 'female'
    data['gender'] = gender

    return data

def get_yudis_info(yudis_lists, name):
  data = {}
  name = name.lower()

  # get nim
  nim = [yudis_lists.index(x) for x in yudis_lists if any(n in x.lower() for n in name.split(' '))]

  if len(nim) == 1:
    nim = yudis_lists[nim[0]+2]
  else :
    nim = yudis_texts[nim[0]:nim[1]]
    nim = [x for x in nim if x.isdigit()][0]

  data['nim'] = nim

  # grad date
  temp_date = [x for x in [x for x in yudis_lists if any(c.isdigit() for c in x)] if '/' in x ][0]
  only_digit = ''.join([x for x in temp_date if x.isdigit()])
  data['graduate_date'] = f"{only_digit[4:]}-{only_digit[2:4]}-{only_digit[:2]}"

  # faculty
  faculties = ['Sains dan Teknologi',
           'Dakwah dan Komunikasi',
           'Syariah dan Hukum',
           'Tarbiyah dan Keguruan',
           'Ushuluddin dan Filsafat',
           'Adab dan Humaiora',
           'Kedokteran dan Ilmu Kesehatan',
           'Ekonomi dan Bisnis']

  temp_faculty = [x for x in yudis_lists if 'fakultas' in x.lower()][0]
  temp_fac_list = [x.lower() for x in temp_faculty.split(' ') if x.isalpha()]

  if len(temp_fac_list) <= 1:
    temp_faculty = [x for x in yudis_lists if 'fakultas' in x.lower()][1]
    temp_fac_list = [x.lower() for x in temp_faculty.split(' ') if x.isalpha()]

  faculty = ''
  break_out_flag = False
  for fac in faculties:
    for t in temp_fac_list:
      if t.lower() in fac.lower():
        faculty = fac
        break_out_flag = True
        break
    if break_out_flag:
      break

  if faculty == 'Ekonomi Dan Bisnis':
    faculty = 'Ekonomi Dan Bisnis Islam'

  data['faculty'] = faculty

  # major
  temp_major = [x for x in yudis_lists if 'jurusan' in x.lower()][0].lower()
  temp_major = [x for x in temp_major.split('jurusan')[1].split(' ') if x != '']
  major = ' '.join(temp_major).title()
  data['major'] = major

  # ipk
  ipk = [yudis_lists.index(x) for x in yudis_lists if any(n in x.lower() for n in name.split(' '))]

  if len(ipk) == 1:
    ipk = yudis_lists[ipk[0]:ipk[0]+10]
    ipk = [x for x in ipk if ',' in x][-1]
  else :
    ipk = yudis_lists[ipk[0]:ipk[1]]
    ipk = [x for x in ipk if ',' in x][-1]
  data['ipk'] = data['ipk'] = float(ipk.replace(',', '.'))

  return data

@app.route("/", methods=['GET'])
def hello_world():
    return "Berhasil terhubung"

@app.route("/read", methods=['POST', 'GET'])
def read_image():
    if 'path' not in request.args or 'type' not in request.args:
        return 'Masukkan path dan type', 400
    
    type = request.args['type']
    path = request.args['path']
    if type == 'ktp':
        # return jsonify({
        #     'nik': '3171234567890123',
        #     'name': 'Mira Setiawan',
        #     'birth_date': '1986-02-18',
        #     'gender': 'female',
        #     'born_place': 'Jakarta',
        # })
        
        ktp_image = preprocessing_image(path)
        ktp_texts = get_texts(ktp_image)
        ktp_data = get_ktp_info(ktp_texts)
        return jsonify(ktp_data)
    
    elif type == 'yudis':
        if 'name' not in request.args:
            return "Nama harus disertakan terlebih dahulu!"
        
        # return jsonify({
        #     'faculty': 'Sains Dan Teknologi',
        #     'graduate_date': '2023-10-31',
        #     'ipk': '3,76',
        #     'major': 'Sistem Informasi',
        #     'nim': '60900119016'
        # })

        yudis_image = preprocessing_image(path, False)
        yudis_texts = get_texts(yudis_image)
        yudis_data = get_yudis_info(yudis_texts, request.args['name'])
        return jsonify(yudis_data)
    
    return 'Pilih type ktp | yudis', 400

@app.route("/define", methods=['GET'])
def define_reader():
    reader = easyocr.Reader(['id'])
    bentoml.easyocr.save_model('id-reader', reader)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)