// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()


function autoAnak()
{
  var status = document.getElementById('status').value;
  if(status == 'Belum Menikah') {
    document.getElementById('jml_anak').value = '0';
    document.getElementById('jml_anak').setAttribute('readonly', '');
  } else if(status == 'Menikah') {
    document.getElementById('jml_anak').value;
    document.getElementById('jml_anak').removeAttribute('readonly', '');
  }
}