const regEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/
const regTel = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/

const emailFields = document.querySelectorAll('input[type="email"]');
const telFields = document.querySelectorAll('input[type="tel"]');
const forms = document.querySelectorAll('form');

emailFields.forEach(field => {
    field.addEventListener('input', function () {
        if (regEmail.test(field.value)) {
            field.classList.add('is-valid')
            // field.closest().classList.add('is-valid')
            field.classList.remove('is-invalid')
            // field.closest().classList.remove('is-invalid')
        } else {
            field.classList.add('is-invalid')
            // field.closest().classList.add('is-invalid')
            field.classList.remove('is-valid')
            // field.closest().classList.remove('is-valid')
        }
    })
})


telFields.forEach(field => {
    field.addEventListener('input', function () {
        if (regTel.test(field.value)) {
            field.classList.add('is-valid')
            // field.closest().classList.add('is-valid')
            field.classList.remove('is-invalid')
            // field.closest().classList.remove('is-invalid')
        } else {
            field.classList.add('is-invalid')
            // field.closest().classList.add('is-invalid')
            field.classList.remove('is-valid')
            // field.closest().classList.remove('is-valid')
        }
    })
})

function checkValidity(form) {
    const email = form.querySelector('input[type="email"]');
    const phone = form.querySelector('input[type="tel"]');
    if (email) {
        if (regEmail.test(email.value) && regTel.test(phone.value)) {
            console.log('valid');
            return true;
        } else {
            console.log('not valid');
            email.classList.add('is-invalid');
            phone.classList.add('is-invalid');
            return false;
        }
    } else {
        if (regTel.test(phone.value)) {
            console.log('valid');
            return true;
        } else {
            console.log('not valid');
            phone.classList.add('is-invalid');
            return false;
        }
    }
}

async function sendForm(form) {
    form.classList.add('_sending');
    let formData = new FormData(form);
    console.log(formData);
    let response = await fetch('sendmail.php', {
        method: 'POST',
        body: formData
    });
    if (response.ok) {
        let result = await response.json();
        alert(result.message);
        form.reset();
        form.classList.remove('_sending');
    } else {

    }
}

forms.forEach(form => {
    form.onsubmit = function (e) {
        e.preventDefault();
        e.stopPropagation();
        if (5 == 5) {
            e.preventDefault();
            e.stopPropagation();
            console.log('validating form...');
            if (checkValidity(form)) {
                console.log('form is valid');
                sendForm(form);
            } else {
                return
            }
        } else {
            form.submit();
        }
    }
    return false;
})