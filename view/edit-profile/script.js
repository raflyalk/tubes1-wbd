var nameField = document.querySelector('#name');
var addressField = document.querySelector('#address');
var phoneNumberField = document.querySelector('#phone-number');
var form = document.querySelector('form');
var submitButton = document.querySelector('#save-button');
var nameValidation = document.querySelector('.validation.name');
var addressValidation = document.querySelector('.validation.address');
var phoneNumberValidation = document.querySelector('.validation.phone-number');

var fields = [
    nameField,
    addressField,
    phoneNumberField
];

var validations = [
    nameValidation,
    addressValidation,
    phoneNumberValidation
];

var checkSubmitOk = function () {
    for (var i = 0; i < fields.length; i++) {
        if (fields[i].value === '') {
            return false;
        }
    }
    return true;
};

var validateInput = (field, validation) => {
    if (field.value === '') {
        validation.classList.remove('hidden');
        submitButton.disabled = true;
    } else {
        validation.classList.add('hidden');
        if (checkSubmitOk()) {
            submitButton.disabled = false;
        }
    }

    return !!field.value;
};

for (var i = 0; i < fields.length; i++) {
  fields[i].onchange = ((i) => {
    validateInput(fields[i], validations[i]);
  }).bind(null, i);
}

form.onsubmit = () => {
    return checkSubmitOk();
};
