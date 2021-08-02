<?php

class TratamientosController extends Controller
{
   function index()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Tratamientos'];
      $data['tratamientos'] = Factory::get_list('Tratamiento', 'tratamientos');
      View::render('tratamientos', $data);
      return;
   }

   function nuevo_tratamiento()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Nuevo Tratamiento'];
      View::render('nuevoTratamiento', $data);
   }

   function insertar()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      if (empty($_POST['tratamiento-nombre'])) Redirect::to('tratamientos/nuevo_tratamiento');
      $tratamiento = [
         'nombre' => $_POST['tratamiento-nombre'],
         'descripcion' => $_POST['tratamiento-descripcion'],
         'programas' => $_POST['tratamiento-programas']
      ];
      if (isset($_FILES['tratamiento-img']['name']) && $_FILES['tratamiento-img']['name'] != '') {
         if ($_FILES['tratamiento-img']['type'] == 'image/png' || $_FILES['tratamiento-img']['type'] == 'image/jpeg' || $_FILES['tratamiento-img']['type'] == 'image/bmp') {
            if ($_FILES['tratamiento-img']['size'] < 3670016) {
               $ext = pathinfo($_FILES['tratamiento-img']['name'], PATHINFO_EXTENSION);
               $nombreArchivo = time() . ".$ext";
               $tratamiento['foto'] = $nombreArchivo;
            } else {
               Alert::throw_msg('Tama&ntilde;o de archivo excede el l&iacute;mite', 'danger');
               Redirect::to('tratamientos/nuevo_tratamiento');
            }
         } else {
            Alert::throw_msg('Formato de archivo no admitido', 'danger');
            Redirect::to('tratamientos/nuevo_tratamiento');
         }
      }
      $result = Factory::insert_array('tratamientos', $tratamiento);
      if ($result != false) {
         move_uploaded_file($_FILES['tratamiento-img']['tmp_name'], ROOT . 'assets/images/tratamientos/' . $nombreArchivo);
         Alert::throw_msg('Datos ingresados con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo ingresar informaci&oacute;n', 'danger');
      }
      Redirect::to('tratamientos');
      return;
   }

   function editar($tid)
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Editar tratamiento'];
      $data['tratamiento'] = Factory::get('Tratamiento', 'tratamientos', ['id' => $tid]);
      View::render('editarTratamiento', $data);
   }

   function reemplazar()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      if (empty($_POST['tratamiento-nombre']) || empty($_POST['tratamiento-id'])) Redirect::to('tratamientos');
      $tratamiento = [
         'id' => $_POST['tratamiento-id'],
         'nombre' => $_POST['tratamiento-nombre'],
         'descripcion' => $_POST['tratamiento-descripcion'],
         'programas' => $_POST['tratamiento-programas']
      ];
      if (isset($_FILES['tratamiento-img']['name']) && $_FILES['tratamiento-img']['name'] != '') {
         if ($_FILES['tratamiento-img']['type'] == 'image/png' || $_FILES['tratamiento-img']['type'] == 'image/jpeg' || $_FILES['tratamiento-img']['type'] == 'image/bmp') {
            if ($_FILES['tratamiento-img']['size'] < 3670016) {
               $ext = pathinfo($_FILES['tratamiento-img']['name'], PATHINFO_EXTENSION);
               $nombreArchivo = time() . ".$ext";
               $tratamiento['foto'] = $nombreArchivo;
            } else {
               Alert::throw_msg('Tama&ntilde;o de archivo excede el l&iacute;mite', 'danger');
               Redirect::to('tratamientos/nuevo_tratamiento');
            }
         } else {
            Alert::throw_msg('Formato de archivo no admitido', 'danger');
            Redirect::to('tratamientos/nuevo_tratamiento');
         }
      }
      $result = Factory::update_array('tratamientos', $tratamiento, ["`id` = " . $tratamiento['id']]);
      if ($result === true) {
         move_uploaded_file($_FILES['tratamiento-img']['tmp_name'], ROOT . 'assets/images/tratamientos/' . $nombreArchivo);
         Alert::throw_msg('Datos ingresados con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo ingresar informaci&oacute;n', 'danger');
      }
      Redirect::to('tratamientos');
      return;
   }

   function eliminar($tid)
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $result = Factory::delete('tratamientos', ["`id` = $tid"]);
      if ($result === true) {
         Alert::throw_msg('Elemento eliminado con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo completar la operaci&oacute;n', 'danger');
      }
      Redirect::to('tratamientos');
      return;
   }
}
