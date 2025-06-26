import "./bootstrap";
import 'bootstrap';


import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const themeToggleBtn = document.getElementById("theme-toggle");
    const themeToggleDarkIcon = document.getElementById(
        "theme-toggle-dark-icon"
    );
    const themeToggleLightIcon = document.getElementById(
        "theme-toggle-light-icon"
    );

    // Fungsi untuk menampilkan ikon yang sesuai saat halaman dimuat
    function setInitialIcon() {
        if (
            localStorage.getItem("theme") === "dark" ||
            (!("theme" in localStorage) &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            themeToggleLightIcon.classList.remove("hidden");
        } else {
            themeToggleDarkIcon.classList.remove("hidden");
        }
    }

    if (themeToggleBtn) {
        setInitialIcon();

        themeToggleBtn.addEventListener("click", function () {
            // toggle ikon di dalam tombol
            themeToggleDarkIcon.classList.toggle("hidden");
            themeToggleLightIcon.classList.toggle("hidden");

            // jika tema sudah ada di localStorage
            if (localStorage.getItem("theme")) {
                if (localStorage.getItem("theme") === "light") {
                    document.documentElement.classList.add("dark");
                    localStorage.setItem("theme", "dark");
                } else {
                    document.documentElement.classList.remove("dark");
                    localStorage.setItem("theme", "light");
                }
                // jika tema belum ada di localStorage
            } else {
                if (document.documentElement.classList.contains("dark")) {
                    document.documentElement.classList.remove("dark");
                    localStorage.setItem("theme", "light");
                } else {
                    document.documentElement.classList.add("dark");
                    localStorage.setItem("theme", "dark");
                }
            }
        });
    }

    // Lakukan hal yang sama untuk landing page jika ada tombolnya
    const landingThemeToggleBtn = document.getElementById(
        "landing-theme-toggle"
    );
    if (landingThemeToggleBtn) {
        const landingDarkIcon = document.getElementById(
            "landing-theme-toggle-dark-icon"
        );
        const landingLightIcon = document.getElementById(
            "landing-theme-toggle-light-icon"
        );

        function setLandingIcon() {
            if (
                localStorage.getItem("theme") === "dark" ||
                (!("theme" in localStorage) &&
                    window.matchMedia("(prefers-color-scheme: dark)").matches)
            ) {
                landingLightIcon.classList.remove("hidden");
            } else {
                landingDarkIcon.classList.remove("hidden");
            }
        }

        setLandingIcon();

        landingThemeToggleBtn.addEventListener("click", function () {
            landingDarkIcon.classList.toggle("hidden");
            landingLightIcon.classList.toggle("hidden");
            if (localStorage.getItem("theme")) {
                if (localStorage.getItem("theme") === "light") {
                    document.documentElement.classList.add("dark");
                    localStorage.setItem("theme", "dark");
                } else {
                    document.documentElement.classList.remove("dark");
                    localStorage.setItem("theme", "light");
                }
            } else {
                if (document.documentElement.classList.contains("dark")) {
                    document.documentElement.classList.remove("dark");
                    localStorage.setItem("theme", "light");
                } else {
                    document.documentElement.classList.add("dark");
                    localStorage.setItem("theme", "dark");
                }
            }
        });
    }
});
