if (window) {
    window.onclick = function (event) {
        try {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        } catch (e) {
        }
    };
}
