var selecterBox = document.getElementById('credit_input');

function formSwitch() {
    check = document.getElementsByClassName('payment-check')
    if (check[0].checked) {
        selecterBox.style.display = "none";

    } else if (check[1].checked) {
        selecterBox.style.display = "block";

    } else {
        selecterBox.style.display = "none";
    }
}
window.addEventListener('load', formSwitch());
