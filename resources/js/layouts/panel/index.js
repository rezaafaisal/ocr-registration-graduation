const ctn = document.getElementById("content");
const drawerBtn = document.getElementById("drawer-btn");
const notifBtn = document.getElementById("notif-btn");
const themeBtn = document.getElementById("theme-btn");
const drawerEl = document.getElementById("drawer-main");
const maxLG = matchMedia("(max-width: 768px)");
const drawerOpt = {
    placement: "left",
    backdrop: false,
    bodyScrolling: true,
    edge: true,
    edgeOffset: "",
    onHide: () => {
        drawerBtn.innerHTML = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>`;
        drawerEl.style.flexBasis = "0";
        drawerEl.style.position = "absolute";
    },
    onShow: () => {
        drawerBtn.innerHTML = `<svg class="w-6 h-6" focusable="false" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24"><path d="M3 18h13v-2H3v2zm0-5h10v-2H3v2zm0-7v2h13V6H3zm18 9.59L17.42 12 21 8.41 19.59 7l-5 5 5 5L21 15.59z"></path></svg>`;
        drawerEl.style.flex = "300px 0 0";
        drawerEl.style.position = "static";
    },
};
let drawer = new Drawer(drawerEl, drawerOpt);
drawer.show();
drawerBtn.addEventListener("click", (event) => {
    drawer.toggle();
});
if (maxLG.matches) {
    drawer.hide();
} else {
    drawer.show();
}
maxLG.addEventListener("change", (event) => {
    if (event.matches) {
        drawer.hide();
    } else {
        drawer.show();
    }
});
themeSelect(localStorage.getItem("theme") ?? "light");
themeBtn?.addEventListener("click", (event) => {
    localStorage.setItem(
        "theme",
        themeToggle(localStorage.getItem("theme") ?? "light")
    );
});
function themeSelect(theme) {
    if (!themeBtn) return;
    if (theme == "light") {
        document.documentElement.classList.remove("dark");
        themeBtn.innerHTML = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>`;
    } else if (theme == "dark") {
        document.documentElement.classList.add("dark");
        themeBtn.innerHTML = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>`;
    } else {
        alert("something wrong");
    }
}
function themeToggle(theme) {
    if (theme == "light") {
        document.documentElement.classList.add("dark");
        themeBtn.innerHTML = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>`;
        return "dark";
    } else if (theme == "dark") {
        document.documentElement.classList.remove("dark");
        themeBtn.innerHTML = `<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>`;
        return "light";
    } else {
        alert("something wrong");
    }
}
