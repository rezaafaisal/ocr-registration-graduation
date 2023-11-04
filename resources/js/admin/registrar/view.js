const viewer = document.getElementById("viewer");
const img = document.getElementById("view_img");
const close_btn = document.getElementById("view_close");
for (const iterator of [
    "photo",
    "munaqasyah",
    "school_certificate",
    "ktp",
    // "kk",
    "spukt",
]) {
    const img_src = document.getElementById(`${iterator}_img`).src;
    document.getElementById(`${iterator}_btn`).addEventListener("click", () => {
        img.src = img_src;
        viewer.classList.remove("hidden");
    });
}
close_btn.addEventListener("click", () => {
    viewer.classList.add("hidden");
});
