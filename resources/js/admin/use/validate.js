$.validator.setDefaults({
    submitHandler: function (form) {
      form.submit();
    }
});

$('#form-validation').validate({
    rules: {
      name: {
        required: true,
      },
      title: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Please enter a email address",
      },
      title: {
        required: "Please enter a title",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
});