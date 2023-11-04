import { create_element } from "../../lib"

let ids = 0
const input = document.getElementById("departments")
const add = document.getElementById("departments-add")
const list = document.getElementById("departments-list")

add.addEventListener('click', (event) => {
  if (!input.value) return
  const department = { id: ++ids, value: input.value }
  create_department(department)
  departments.push(department)

})

for (const department of departments) {
  create_department({ id: ++ids, value: department })
}

function create_department({ id, value }) {
  const elm = gen(id, value)
  const btn = elm.querySelector(`#departments-${id}-del`)
  btn.addEventListener('click', () => {
    elm.remove()
  })
  list.append(elm)
  input.value = ""
}
function gen(id, value) {
  const template = `
    <li class="flex items-center gap-2">
        <div class="relative w-full">
            <input type="text" id="departments-${id}" name="departments[]" value="${value}"
                class="block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="{{ __('department') }}" required>
        </div>
        <button type="button" id="departments-${id}-del"
            class="p-2.5 text-sm font-medium text-white bg-red-700 rounded-lg border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4">
                </path>
            </svg>
            <span class="sr-only">delete</span>
        </button>
    </li>
  `
  return create_element(template)
}
