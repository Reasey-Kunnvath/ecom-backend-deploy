import "./bootstrap";

// import "flowbite";
// import { initFlowbite } from "flowbite";
// import "preline";

document.addEventListener("livewire:navigated", () => {

    if (localStorage.getItem("color-theme") === "dark") {
        document.documentElement.classList.add("dark");
        initFlowbite();
    } else {
        document.documentElement.classList.remove("dark");
        initFlowbite();
    }
});

window.addEventListener("livewire:load", () => {
    initFlowbite();
});
