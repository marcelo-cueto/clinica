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
      if (empty($_SESSION['user'])) Redirect::to('login');
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
      $result = Factory::insert_array('consultores', $consultor);
      if ($result != false) {
         move_uploaded_file($_FILES['consultor-img']['tmp_name'], ROOT . 'assets/images/consultores/' . $_FILES['consultor-img']['name']);
         Alert::throw_msg('Datos ingresados con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo ingresar informaci&oacute;n', 'danger');
      }
      Redirect::to('consultores');
      return;
   }

   function editar($cid)
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Editar Consultor'];
      $data['consultor'] = Factory::get('Consultor', 'consultores', ['id' => $cid]);
      View::render('editarConsultor', $data);
   }

   function reemplazar()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      if (empty($_POST['consultor-nombre']) || empty($_POST['consultor-id'])) Redirect::to('consultores');
      $consultor = [
         'id' => $_POST['consultor-id'],
         'nombre' => $_POST['consultor-nombre']
      ];
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
      $result = Factory::update_array('consultores', $consultor, ["`id` = " . $consultor['id']]);
      if ($result === true) {
         move_uploaded_file($_FILES['consultor-img']['tmp_name'], ROOT . 'assets/images/consultores/' . $_FILES['consultor-img']['name']);
         Alert::throw_msg('Datos ingresados con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo ingresar informaci&oacute;n', 'danger');
      }

      Redirect::to('consultores');
      return;
   }

   function eliminar($cid)
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $result = Factory::delete('consultores', ["`id` = $cid"]);
      if ($result === true) {
         Alert::throw_msg('Elemento eliminado con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo completar la operaci&oacute;n', 'danger');
      }
      Redirect::to('consultores');
      return;
   }
}
