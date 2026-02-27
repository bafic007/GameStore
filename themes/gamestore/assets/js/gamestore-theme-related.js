// Dark Mode Style
let styleMode = localStorage.getItem("styleMode");
const styleToggler = document.querySelector(".header-mode-switcher");

const enableDarkStyle = () => {
    document.body.classList.add("dark-mode-gamestore");
    localStorage.setItem('styleMode', 'dark');
}

const disableDarkStyle = () => {
    document.body.classList.remove("dark-mode-gamestore");
    localStorage.setItem('styleMode', null);
}

if(styleToggler) {
    styleToggler.addEventListener("click", () => {
        styleMode = localStorage.getItem("styleMode");
        if (styleMode !== "dark") {
            enableDarkStyle();
        } else {
            disableDarkStyle();
        }
    });
}

if(styleMode === "dark") {
    enableDarkStyle();
}