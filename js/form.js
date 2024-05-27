const regEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/
const regTel = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/

const emailFields = document.querySelectorAll('input[type="email"]');
const telFields = document.querySelectorAll('input[type="tel"]');

emailFields.forEach(field => {
    field.addEventListener('input', function() {
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
    field.addEventListener('input', function() {
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