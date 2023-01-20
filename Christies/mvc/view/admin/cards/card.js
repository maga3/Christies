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

function validateDescription() {
    let input = event.target;
    if (input.value === 0 || input.value.includes('\[a-z]\i')) {
        document.getElementById("desValidationMsg").innerText = "Cannot be empty";
        document.getElementById("desValidationMsg").classList.add("text-danger");
    } else {
        if (!/[\w,-_'¿¡!"\s]{10,255}/gmi.test(input.value)) {
            document.getElementById("desValidationMsg").innerHTML = "Descripcion no valido";
            document.getElementById("desValidationMsg").classList.add("text-danger");
        } else {
            document.getElementById("desValidationMsg").innerHTML = '✓';
            document.getElementById("desValidationMsg").classList.remove("text-danger")
        }
    }
}

function validateComment() {
    let input = event.target;
    let span = input.nextElementSibling;
    if (input.value === 0 || input.value.includes('\[a-z]\i')) {
        span.innerText = "Cannot be empty";
        span.classList.add("text-danger");
    } else {
        if (!/[\w,-_'¿¡!"\s]{3,255}/gmi.test(input.value)) {
            span.innerHTML = "Comentario no valido";
            span.classList.add("text-danger");
        } else {
            span.innerHTML = '✓';
            span.classList.remove("text-danger")
        }
    }
}

function validateEmail() {
    let input = event.target;
    if (input.value === 0 || input.value.includes('\[a-z]\i')) {
        document.getElementById("emailValidationMsg").innerText = "Cannot be empty";
        document.getElementById("emailValidationMsg").classList.add("text-danger");
    } else {
        if (!/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/.test(input.value)) {
            document.getElementById("emailValidationMsg").innerHTML = "Email no valido";
            document.getElementById("emailValidationMsg").classList.add("text-danger");
        } else {
            document.getElementById("emailValidationMsg").innerHTML = '✓';
            document.getElementById("emailValidationMsg").classList.remove("text-danger")
        }
    }
}

function viewFile(input, n) {
    const file = $("input[type=file]").get(n).files[0];

    if (file) {
        let reader = new FileReader();
        reader.onload = function () {
            $("#previewImg" + n).attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
}