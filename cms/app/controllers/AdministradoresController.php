<?php

class AdministradoresController extends Controller
{
   function index()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Administradores'];
      $data['administradores'] = Factory::get_list('Administrador', 'administradores');
      View::render('administradores', $data);
      return;
   }

   function nuevo_administrador()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Nuevo Administrador'];
      View::render('nuevoAdministrador', $data);
      return;
   }
   
   function insertar()
   {
      //var_dump($_POST);
      //exit();
      if (empty($_SESSION['user'])) Redirect::to('login');
      if (empty($_POST['administrador-nombres'])) Redirect::to('administradores/nuevo_administrador');
      $superadmin = $_POST['administrador-superadmin'] == 'on' ? 1 : 0;
      $administrador = [
         'nombres' => $_POST['administrador-nombres'],
         'apellidos' => $_POST['administrador-apellidos'],
         'email' => $_POST['administrador-email'],
         'clave' => $_POST['administrador-clave'],
         'superadmin' => $superadmin
      ];
      $result = Factory::insert_array('administradores', $administrador);
      if ($result != false) {
         Alert::throw_msg('Datos ingresados con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo ingresar informaci&oacute;n', 'danger');
      }
      Redirect::to('administradores');
      return;
   }

   function editar($cid)
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Editar Administrador'];
      $data['administrador'] = Factory::get('Administrador', 'administradores', ['id' => $cid]);
      View::render('editarAdministrador', $data);
   }

   function reemplazar()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      if (empty($_POST['administrador-nombres']) || empty($_POST['administrador-id'])) Redirect::to('administradores');
      $superadmin = $_POST['administrador-superadmin'] == 'on' ? 1 : 0;
      $administrador = [
         'id' => $_POST['administrador-id'],
         'nombres' => $_POST['administrador-nombres'],
         'apellidos' => $_POST['administrador-apellidos'],
         'email' => $_POST['administrador-email'],
         'clave' => $_POST['administrador-clave'],
         'superadmin' => $superadmin
      ];
      $result = Factory::update_array('administradores', $administrador, ["`id` = " . $administrador['id']]);
      if ($result === true) {
         Alert::throw_msg('Datos ingresados con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo ingresar informaci&oacute;n', 'danger');
      }
      Redirect::to('administradores');
      return;
   }

   function eliminar($cid)
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $result = Factory::delete('administradores', ["`id` = $cid"]);
      if ($result === true) {
         Alert::throw_msg('Elemento eliminado con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo completar la operaci&oacute;n', 'danger');
      }
      Redirect::to('administradores');
      return;
   }
}