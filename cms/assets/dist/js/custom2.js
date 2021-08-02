$(document).ready(function () {
   $('.select2').select2();

   var n = 0;
   $('.cargos').each(function () {
      n++;
   });
   
   $('#tit-agregar').click(function (event) {
      event.preventDefault();
      n++;
      var elem = "<div class='col-md-12 mt-2'><input type='text' class='form-control form-control-line' name='cargos[" + n + "]' id='cargo" + n + "'></div>";
      $("#grupo-cargos").append(elem);
   });

   $('.img-input').change(function (e) {
      const file = $('.img-input')[0].files;
      if (file.length >= 1) {
         const objectURL = URL.createObjectURL(file[0]);
         $('.img-preview')[0].src = objectURL;
      }
      return;
   });

   $(".delete-element").click(function (e) {
      e.preventDefault();
      link = $(this).attr('href');
      element = $('.modal-confirm');
      $(element).attr('href', link);
   });
});