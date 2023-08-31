const mainForm = document.forms.main;
const mainFormInput = mainForm.email;

const changeInputArr = new Map();
const log = document.getElementById("log");

//const id = mainForm.id;

mainForm.addEventListener("change", updateValue);

function updateValue(e) {
    changeInputArr.set(e.target.name, e.target.value);
}

// mainForm.addEventListener("submit", function (event) {
function updateSubmit(id) {
    mainForm.onsubmit = function (event) {
        if (emailValidate(mainFormInput)) {
            mainFormInput.parentElement.insertAdjacentHTML(
                "beforeend",
                `<div class="main-form__error">
                Введите email
            </div>`
            );
            mainFormInput.classList.add("error");
            event.preventDefault();
        }
        else {
            mainFormInput.classList.remove("error");
        }
        //console.log(changeInputArr);
        //alert(changeInputArr);
        mainForm.action = 'action.php?action_type=update&id=' + id;

        changeInputArr.forEach(function (item, i, arr) {
            mainForm.action += '&' + i + '=' + item;
        });

    };
}

function insertSubmit() {
    mainForm.onsubmit = function (event) {
        if (emailValidate(mainFormInput)) {
            mainFormInput.parentElement.insertAdjacentHTML(
                "beforeend",
                `<div class="main-form__error">
                Введите email
            </div>`
            );
            mainFormInput.classList.add("error");
            event.preventDefault();
        }
        else {
            mainFormInput.classList.remove("error");
        }
    }
}

function emailValidate(input) {
    return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
}


