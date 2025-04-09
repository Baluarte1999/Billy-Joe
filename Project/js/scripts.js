document.addEventListener("DOMContentLoaded", function () {
    const alert = document.querySelector(".alert-dismissible");
    if (alert) {
        setTimeout(() => {
            alert.classList.remove("show");
            alert.classList.add("fade");
            setTimeout(() => {
                alert.remove();
            }, 500);
        }, 3000);
    }

    const closeBtn = document.querySelector(".alert .close");
    if (closeBtn) {
        closeBtn.addEventListener("click", function () {
            const alert = this.closest(".alert");
            alert.classList.remove("show");
            alert.classList.add("fade");
            setTimeout(() => alert.remove(), 500);
        });
    }
});
