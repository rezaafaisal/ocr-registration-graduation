import { create_element } from "../../lib"
import Datepicker from "flowbite-datepicker/Datepicker";
import {
  input_img_preview
} from "../../lib";

new Datepicker(document.getElementById("dob"), { format: 'yyyy-mm-dd' });
new Datepicker(document.getElementById("doe"), { format: 'yyyy-mm-dd' });
new Datepicker(document.getElementById("dop"), { format: 'yyyy-mm-dd' });

const faculty = document.getElementById('faculty')
const study_program = document.getElementById('study_program')
faculty.addEventListener('change', (event) => {
  const faculty = faculties.find((item) => item.name == event.target.value)
  if (faculty == -1) return
  const options = [create_element(`<option value="" selected>Choose a Study Program</option>`)]
  for (const department of faculty.departments) {
    options.push(create_element(`<option value="${department}">${department}</option>`))
  }
  study_program.replaceChildren(...options)
})

for (const name of ['photo', 'munaqasyah', 'school_certificate', 'ktp', 'kk', 'spukt']) {
  input_img_preview(name, (url) => {
    const img = document.getElementById(`${name}_preview`);
    img.src = url;
    img.classList.remove('hidden')
    document.getElementById(`${name}_placeholder`).classList.add('hidden');
  });
}
