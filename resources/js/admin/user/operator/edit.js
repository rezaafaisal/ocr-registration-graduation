const department = document.getElementById('department');
const faculty = document.getElementById('field_faculty');

if (department.value == 'faculty') {
  faculty.classList.replace('hidden', 'flex')
} else {
  faculty.classList.replace('flex', 'hidden')
}

department.addEventListener('change', (event) => {
  if (event.target.value == 'faculty') {
    faculty.classList.replace('hidden', 'flex')
  } else {
    faculty.classList.replace('flex', 'hidden')
  }
})
