import {
  input_img_preview
} from "../../lib";

input_img_preview("photo", (url) => {
  const img = document.getElementById('photo_preview');
  img.src = url;
  img.classList.remove('hidden');
  document.getElementById('photo_placeholder').classList.add('hidden');
});
