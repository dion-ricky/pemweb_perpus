
function checkInputValidity(inputElem) {
    if (!inputElem.validity.valid) {
        inputElem.classList.add("input-invalid");
    } else {
        inputElem.classList.remove("input-invalid");
    }
}

window.onload = () => {
    var inputElements = document.querySelectorAll("input");

    inputElements.forEach(element => {
        element.addEventListener("keyup", (ev) => {
            checkInputValidity(element);
        });
    });
};