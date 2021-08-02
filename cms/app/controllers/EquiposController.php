<?php

class EquiposController extends Controller
{
   function index()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Equipos'];
      $data['equipos'] = Factory::get_list('Equipo', 'equipos');
      View::render('equipos', $data);
      return;
   }

   function nuevo_equipo()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Nuevo Equipo'];
      View::render('nuevoEquipo', $data);
      return;
   }

   function insertar()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      if (empty($_POST['equipo-nombre'])) Redirect::to('equipos/nuevo_equipo');
      $equipo = [
         'nombre' => $_POST['equipo-nombre'],
         'funcionalidad' => $_POST['equipo-funcionalidad'],
         'descripcion' => $_POST['equipo-descripcion']
      ];
      if (isset($_FILES['equipo-img']['name']) && $_FILES['equipo-img']['name'] != '') {
         if ($_FILES['equipo-img']['type'] == 'image/png' || $_FILES['equipo-img']['type'] == 'image/jpeg' || $_FILES['equipo-img']['type'] == 'image/bmp') {
            if ($_FILES['equipo-img']['size'] < 3670016) {
               $ext = pathinfo($_FILES['equipo-img']['name'], PATHINFO_EXTENSION);
               $nombreArchivo = time() . ".$ext";
               $equipo['foto'] = $nombreArchivo;
            } else {
               Alert::throw_msg('Tama&ntilde;o de archivo excede el l&iacute;mite', 'danger');
               Redirect::to('equipos/nuevo_equipo');
            }
         } else {
            Alert::throw_msg('Formato de archivo no admitido', 'danger');
            Redirect::to('equipos/nuevo_equipo');
         }
      }
      $result = Factory::insert_array('equipos', $equipo);
      if ($result != false) {
         move_uploaded_file($_FILES['equipo-img']['tmp_name'], ROOT.'assets/images/equipos/'.$nombreArchivo);
         Alert::throw_msg('Datos ingresados con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo ingresar informaci&oacute;n', 'danger');
      }
      Redirect::to('equipos');
      return;
   }

   function editar($eid)
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Editar Equipo'];
      $data['equipo'] = Factory::get('Equipo', 'equipos', ['id' => $eid]);
      View::render('editarEquipo', $data);
   }

   function reemplazar()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      if (empty($_POST['equipo-nombre']) || empty($_POST['equipo-id'])) Redirect::to('equipos');
      $equipo = [
         'id' => $_POST['equipo-id'],
         'nombre' => $_POST['equipo-nombre'],
         'funcionalidad' => $_POST['equipo-funcionalidad'],
         'descripcion' => $_POST['equipo-descripcion']
      ];
      if (isset($_FILES['equipo-img']['name']) && $_FILES['equipo-img']['name'] != '') {
         if ($_FILES['equipo-img']['type'] == 'image/png' || $_FILES['equipo-img']['type'] == 'image/jpeg' || $_FILES['equipo-img']['type'] == 'image/bmp') {
            if ($_FILES['equipo-img']['size'] < 3670016) {
               $ext = pathinfo($_FILES['equipo-img']['name'], PATHINFO_EXTENSION);
               $nombreArchivo = time() . ".$ext";
               $equipo['foto'] = $nombreArchivo;
            } else {
               Alert::throw_msg('Tama&ntilde;o de archivo excede el l&iacute;mite', 'danger');
               Redirect::to('equipos/nuevo_equipo');
            }
         } else {
            Alert::throw_msg('Formato de archivo no admitido', 'danger');
            Redirect::to('equipos/nuevo_equipo');
         }
      }
      $result = Factory::update_array('equipos', $equipo, ["`id` = " . $equipo['id']]);
      if ($result === true) {
         move_uploaded_file($_FILES['equipo-img']['tmp_name'], ROOT . 'assets/images/equipos/' . $nombreArchivo);
         Alert::throw_msg('Datos ingresados con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo ingresar informaci&oacute;n', 'danger');
      }
      Redirect::to('equipos');
      return;
   }

   function eliminar($eid)
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $result = Factory::delete('equipos', ["`id` = $eid"]);
      if ($result === true) {
         Alert::throw_msg('Elemento eliminado con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo completar la operaci&oacute;n', 'danger');
      }
      Redirect::to('equipos');
      return;
   }
}