$(() => {
    let arrayInputs = [...document.querySelectorAll("form input")];

    arrayInputs.forEach((input) => {
        input.addEventListener("keyup", () => {
            if (input.type !== 'file' && input.type !== 'submit') {
                document.getElementsByClassName("btn-submit")[0].disabled = false;
                arrayInputs.forEach(input => {
                    if (input.type !== 'file' && input.type !== 'submit') {
                        if (input.nextElementSibling.classList.contains('text-danger')) {
                            document.getElementsByClassName("btn-submit")[0].disabled = true;
                        }
                    }
                })
            }
        });
    });
});

function validateName() {
    let input = event.target;
    if (input.value.length === 0) {
        document.getElementById("nameValidationMsg").innerText = "Cannot be empty";
    } else {
        if (!/^([a-zñáéíóú]+\s?){3,20}$/i.test(input.value)) {
            document.getElementById("nameValidationMsg").innerHTML =
                "De 3 a 20 letras";
            document.getElementById("nameValidationMsg").classList.add("text-danger");
        } else {
            document.getElementById("nameValidationMsg").innerHTML = '✓';
            document.getElementById("nameValidationMsg").classList.remove("text-danger")
        }
    }
}

function validatePrice() {
    let input = event.target;
    if (input.value === 0 || input.value.includes('\[a-z]\i')) {
        document.getElementById("precioValidationMsg").innerText = "Cannot be empty";
        document.getElementById("precioValidationMsg").classList.add("text-danger");
    } else {
        if (!/^(^\d+(\.\d{1,2})?$)$/.test(input.value)) {
            document.getElementById("precioValidationMsg").innerHTML = "Precio no valido";
            document.getElementById("precioValidationMsg").classList.add("text-danger");
        } else {
            document.getElementById("precioValidationMsg").innerHTML = '✓';
            document.getElementById("precioValidationMsg").classList.remove("text-danger")
        }
    }
}

function viewFile(input,n) {
    const file = $("input[type=file]").get(n).files[0];

    if (file) {
        let reader = new FileReader();
        reader.onload = function () {
            $("#previewImg"+n).attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
}