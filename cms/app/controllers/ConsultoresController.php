<?php

class ConsultoresController extends Controller
{
   function index()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Consultores'];
      $data['consultores'] = Factory::get_list('Consultor', 'consultores');
      View::render('consultores', $data);
      return;
   }

   function nuevo_consultor()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Nuevo Consultor'];
      View::render('nuevoConsultor', $data);
      return;
   }

   function insertar()
   {
      if (empty($_POST['consultor-nombre'])) Redirect::to('consultores/nuevo_consultor');
      $consultor = ['nombre' => $_POST['consultor-nombre']];
      if (isset($_FILES['consultor-img']['name']) && $_FILES['consultor-img']['name'] != '') {
         if ($_FILES['consultor-img']['type'] == 'image/png' || $_FILES['consultor-img']['type'] == 'image/jpeg' || $_FILES['consultor-img']['type'] == 'image/bmp') {
            if ($_FILES['consultor-img']['size'] < 3670016) {
               $consultor['img_logo'] = $_FILES['consultor-img']['name'];
            } else {
               Alert::throw_msg('Tama&ntilde;o de archivo excede el l&iacute;mite', 'danger');
               Redirect::to('consultores/nuevo_consultor');
            }
         } else {
            Alert::throw_msg('Formato de archivo no admitido', 'danger');
            Redirect::to('consultores/nuevo_consultor');
         }
      }
      if (Factory::insert_array('consultores', $consultor)) {
         move_uploaded_file($_FILES['consultor-img']['tmp_name'], ROOT.'assets/images/consultores/'.$_FILES['consultor-img']['name']);
         Alert::throw_msg('Datos ingresados con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo ingresar informaci&oacute;n', 'danger');
      }
  
      Redirect::to('consultores');
      return;
   }
}
