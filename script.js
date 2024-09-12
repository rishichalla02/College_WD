const numberInput = document.getElementById('number');

numberInput.addEventListener('input', function () {
    numberInput.value = numberInput.value.replace(/\D/g, '');
});