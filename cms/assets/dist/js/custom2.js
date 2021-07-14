$(document).ready(function () {
   $('.select2').select2();

   var n = 2;
   $('#tit-agregar').click(function (event) {
      event.preventDefault();
      var elem = "<div class='col-md-12 mt-2'><input type='text' class='form-control form-control-line' name='cargo" + n + "' id='cargo" + n + "'></div>";
      $("#grupo-cargos").append(elem);
      n++;
   })


   $('.img-input').change(function (e) {
      const file = $('.img-input')[0].files;

      if (file.length >= 1) {
         const objectURL = URL.createObjectURL(file[0]);        
         $('.img-preview')[0].src = objectURL;
      }
      return;
   })
});