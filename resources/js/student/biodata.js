import { create_element } from "../lib"
import Datepicker from "flowbite-datepicker/Datepicker";
import { input_img_preview } from "../lib";

input_img_preview("photo", (url) => {
    const img = document.createElement("img");
    img.id = "photo_preview";
    img.src = url;
    img.className =
        "w-[9rem] aspect-square object-cover object-center text-gray-400";
    document.getElementById("photo_preview").replaceWith(img);
});

new Datepicker(document.getElementById("dob"), { format: 'dd MM yyyy' });
// new Datepicker(document.getElementById("doe"), { format: 'dd MM yyyy' });
new Datepicker(document.getElementById("dop"), { format: 'dd MM yyyy' });

const faculty = document.getElementById('faculty')
const study_program = document.getElementById('study_program')
faculty.addEventListener('change', (event) => {
    if (event.target.value) {
        const faculty = faculties.find((item) => item.name == event.target.value)
        if (faculty == -1) return
        create_departments(faculty)
    } else {
        create_empty()
    }
})
if (faculty.value) {
    const result = faculties.find((item) => item.name == faculty.value)
    if (result != -1) {
        create_departments(result, study_program.value)
    }
}
function create_empty() {
    study_program.replaceChildren(create_element(`<option value="" selected>Pilih Jurusan</option>`))
}
function create_departments(faculty, selected) {
    const options = [create_element(`<option value="" selected>Pilih Jurusan</option>`)]
    for (const department of faculty.departments) {
        options.push(create_element(`<option ${selected == department ? 'selected' : ''} value="${department}">${department}</option>`))
    }
    study_program.replaceChildren(...options)
}
