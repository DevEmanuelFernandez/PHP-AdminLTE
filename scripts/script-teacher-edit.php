<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Bootstrap Duallistbox
    
    var dual = $('.duallistbox').bootstrapDualListbox({
        selectedListLabel: 'Seleccionados',
        nonSelectedListLabel: 'No seleccionados',
        infoText: 'Total {0} elementos',
        infoTextEmpty: 'No selecciono ningun elemento'
    })

    
});

$(function () {
  var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  $('#teacher').validate({
    ignore: [], 
    rules: {
      name: {
        required: true,
        minlength: 3,
      },
      lastname: {
        required: true,
        minlength: 3,
      },
      email: {
        required: true,
        email: true,
      },
      dni: {
        required: true,
        number: true,
        minlength: 8,
        maxlength:8,
      },
      telefono: {
        minlength: 8,
      }
    },
    messages: {
      name: {
        required: "Este campo es obligatorio",
        minlength: "debe contener como minimo 3 caracteres"
      },
      lastname: {
        required: "Este campo es obligatorio",
        minlength: "debe contener como minimo 3 caracteres"
      },
      email: {
        required: "Este campo es obligatorio",
        email: "Debe ingresar un emial valido ej. user@example.com"
      },
      dni: {
        required: "Este campo es obligatorio",
        number: "Debe ingresar solo numeros",
        minlength: "debe contener solo 8 caracteres",
        maxlength: "debe contener solo 8 caracteres"
      },
      telefono: {
        minlength: "Este campo debe contener al menos 8 caracteres",
      }
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
      $(element).addClass('is-valid');
    },
    submitHandler: function(form){
                var datos = new FormData(form);
                $.ajax({
                    type: $(form).attr('method'),
                    data: datos,
                    url: $(form).attr('action'),
                    dataType: 'json',
                    contentType: false,
                    processData : false,
                    cache: false,
                    success: function(data) {
                        console.log(data);
                        var resultado = data;
                        if(resultado.respuesta == 'exitoso') {
                            Toast.fire({
                                icon: 'success',
                                timer: 3000,
                                title: 'El profesor se actualizo correctamente !! '
                              }).then(function(){
                                window.location = "teacher-list.php"
                              })
                        } else if(resultado.respuesta == 'error' && resultado.errno === 1062) {
                            Toast.fire({
                                icon: 'error',
                                timer: 3000,
                                title:'El id ya existe codigo de error ' + resultado.errno
                              })
                        } else if(resultado.respuesta == 'error' && resultado.errno === 1406) {
                            Toast.fire({
                                icon: 'error',
                                timer: 3000,
                                title:'Se exedio la cantidad de caracteres permitidos en la base ' + resultado.errno
                              })
                        } 
                    }
                })
    }
  });
  
});
$(function () {
  bsCustomFileInput.init();
});

</script>