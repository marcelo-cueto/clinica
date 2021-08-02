<?php

class ProfesionalesController extends Controller
{
   function index()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Profesionales'];
      $data['profesionales'] = Factory::get_list('Profesional', 'profesionales');
      View::render('profesionales', $data);
      return;
   }

   function nuevo_profesional()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Nuevo Profesional'];
      $data['especialidades'] = Factory::get_list('Especialidad', 'especialidades');
      View::render('nuevoProfesional', $data);
      return;
   }

   function insertar()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      if (empty($_POST['profesional-nombres'])) Redirect::to('profesionales/nuevo_profesional');

      $profesional = [
         'nombres' => $_POST['profesional-nombres'],
         'apellidos' => $_POST['profesional-apellidos'],
         'dni' => $_POST['profesional-dni'],
         'grado_academico' => $_POST['profesional-grado'],
         'director' => isset($_POST['profesional-director']) ? 1 : 0
      ];
      if (isset($_FILES['profesional-foto']['name']) && $_FILES['profesional-foto']['name'] != '') {
         if ($_FILES['profesional-foto']['type'] == 'image/png' || $_FILES['profesional-foto']['type'] == 'image/jpeg' || $_FILES['profesional-foto']['type'] == 'image/bmp') {
            if ($_FILES['profesional-foto']['size'] < 3670016) {
               $ext = pathinfo($_FILES['profesional-foto']['name'], PATHINFO_EXTENSION);
               $nombreArchivo = time() . ".$ext";
               $profesional['foto'] = $nombreArchivo;
            } else {
               Alert::throw_msg('Tama&ntilde;o de archivo excede el l&iacute;mite', 'danger');
               Redirect::to('profesionales/nuevo_profesional');
            }
         } else {
            Alert::throw_msg('Formato de archivo no admitido', 'danger');
            Redirect::to('profesionales/nuevo_profesional');
         }
      }
      $result = Factory::insert_array('profesionales', $profesional);
      if ($result != false) {
         if (isset($_POST['especialidades'])) self::insertar_especialidades($_POST['especialidades'], $result);
         if (isset($_POST['cargos'])) self::insertar_cargos($_POST['cargos'], $result);
         move_uploaded_file($_FILES['profesional-foto']['tmp_name'], ROOT . 'assets/images/profesionales/' . $nombreArchivo);
         Alert::throw_msg('Datos ingresados con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo ingresar informaci&oacute;n', 'danger');
      }
      Redirect::to('profesionales');
      return;
   }

   function editar($pid)
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Editar Profesional'];
      $data['profesional'] = Factory::get('Profesional', 'profesionales', ['id' => $pid]);
      $data['especialidades'] = Factory::get_list('Especialidad', 'especialidades');
      $data['esp_prof'] = Factory::get_list('EspecialidadProfesional', 'especialidades_profesionales', ['profesional_id' => $pid]);
      $data['cargos'] = Factory::get_list('Cargo', 'cargos_titulos', ['profesional_id' => $pid]);
      View::render('editarProfesional', $data);
      return;
   }

   function reemplazar()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      if (empty($_POST['profesional-nombres'])) Redirect::to('profesionales/nuevo_profesional');
      $profesional = [
         'id' => $_POST['profesional-id'],
         'nombres' => $_POST['profesional-nombres'],
         'apellidos' => $_POST['profesional-apellidos'],
         'dni' => $_POST['profesional-dni'],
         'grado_academico' => $_POST['profesional-grado'],
         'director' => isset($_POST['profesional-director']) ? 1 : 0
      ];
      if (isset($_FILES['profesional-foto']['name']) && $_FILES['profesional-foto']['name'] != '') {
         if ($_FILES['profesional-foto']['type'] == 'image/png' || $_FILES['profesional-foto']['type'] == 'image/jpeg' || $_FILES['profesional-foto']['type'] == 'image/bmp') {
            if ($_FILES['profesional-foto']['size'] < 3670016) {
               $ext = pathinfo($_FILES['profesional-foto']['name'], PATHINFO_EXTENSION);
               $nombreArchivo = time() . ".$ext";
               $profesional['foto'] = $nombreArchivo;
            } else {
               Alert::throw_msg('Tama&ntilde;o de archivo excede el l&iacute;mite', 'danger');
               Redirect::to('profesionales/nuevo_profesional');
            }
         } else {
            Alert::throw_msg('Formato de archivo no admitido', 'danger');
            Redirect::to('profesionales/nuevo_profesional');
         }
      }
      $result = Factory::update_array('profesionales', $profesional, ["`id` = " . $profesional['id']]);
      if ($result === true) {
         if (isset($_POST['especialidades'])) self::reemplazar_especialidades($_POST['especialidades'], $profesional['id']);
         if (isset($_POST['cargos'])) self::insertar_cargos($_POST['cargos'], $profesional['id']);
         move_uploaded_file($_FILES['profesional-foto']['tmp_name'], ROOT . 'assets/images/profesionales/' . $nombreArchivo);
         Alert::throw_msg('Datos ingresados con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo ingresar informaci&oacute;n', 'danger');
      }
      Redirect::to('profesionales');
      return;
   }

   function eliminar($cid)
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $result = Factory::delete('profesionales', ["`id` = $cid"]);
      if ($result === true) {
         Alert::throw_msg('Elemento eliminado con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo completar la operaci&oacute;n', 'danger');
      }
      Redirect::to('profesionales');
      return;
   }

   private static function insertar_especialidades($ep_form, $pid)
   {
      foreach ($ep_form as $e) {
         $esp_prof = [
            'especialidad_id' => $e,
            'profesional_id' => $pid
         ];
         Factory::insert_array('especialidades_profesionales', $esp_prof);
      }
      return;
   }

   private static function insertar_cargos($cargos_form, $pid)
   {
      foreach ($cargos_form as $c) {
         $cargo = [
            'nombre' => $c,
            'destacar' => 0,
            'profesional_id' => $pid
         ];
         Factory::insert_array('cargos_titulos', $cargo);
      }
      return;
   }

   private static function reemplazar_especialidades($ep_form, $pid)
   {
      $ep = Factory::get_list('EspecialidadProfesional', 'especialidades_profesionales', ["profesional_id" => $pid]);
      $insertar = [];
      foreach ($ep_form as $nuevo) {
         $existe = false;
         foreach ($ep as $viejo) if ($nuevo == $viejo->especialidad_id) $existe = true;
         if (!$existe) $insertar[] = $nuevo;
      }
      foreach ($insertar as $i) Factory::insert_array('especialidades_profesionales', ['especialidad_id' => $i, 'profesional_id' => $pid]);
      return;
   }

   function eliminar_especialidades($pid)
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $result = Factory::delete('especialidades_profesionales', ["`profesional_id` = $pid"]);
      if ($result === true) {
         Alert::throw_msg('Elementos eliminados con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo completar la operaci&oacute;n', 'danger');
      }
      Redirect::to('profesionales');
      return;
   }

   function eliminar_cargos($pid)
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $result = Factory::delete('cargos_titulos', ["`profesional_id` = $pid"]);
      if ($result === true) {
         Alert::throw_msg('Elementos eliminados con &eacute;xito', 'success');
      } else {
         Alert::throw_msg('Disculpe. No se pudo completar la operaci&oacute;n', 'danger');
      }
      Redirect::to('profesionales');
      return;
   }
}
