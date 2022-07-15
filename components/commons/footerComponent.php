</body>

<!-- jQuery -->
<script src="/peluqueria/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/peluqueria/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="/peluqueria/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/peluqueria/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="/peluqueria/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/peluqueria/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
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
});
</script>
</html>