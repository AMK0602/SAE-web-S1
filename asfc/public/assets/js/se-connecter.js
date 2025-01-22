const inputFields = document.querySelectorAll('.se-connecter input');
const submitButton = document.getElementById('submit-btn');
function checkValid() {
    let allFilled = true; 

    for (let input of inputFields) {
        if (input.value.length === 0) {
            allFilled = false;
            break;
        }
    }

    if (allFilled) {
        submitButton.classList.add('enabled');
        submitButton.disabled = false;
    } else {
        submitButton.classList.remove('enabled');
        submitButton.disabled = true;
    }
}

inputFields.forEach(input => {
    console.log(input)
    input.addEventListener('input', checkValid);
});

checkValid();
