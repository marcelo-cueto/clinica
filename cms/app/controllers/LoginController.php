<?php

class LoginController extends Controller
{
   function index()
   {
      if (isset($_SESSION['user'])) Redirect::to('profesionales');
      $data = ['title' => 'Login'];
      View::render('login', $data);
   }

   function login()
   {
      if (isset($_SESSION['user'])) Redirect::to('profesionales');
      $mensaje = '';
      if ($_REQUEST['csrf_token'] != $_SESSION['csrf_token']['token']) {
         $mensaje = 'Acceso denegado';
      } else {
         if (isset($_POST['email']) && isset($_POST['clave'])) {
            $admin = Administrador::validate($_POST['email'], $_POST['clave']);
            if ($admin) {
               UserSession::set_current_user($admin->id, $admin->nombres, $admin->superadmin);
               Redirect::to('profesionales');
            } else $mensaje = 'Identificacion incorrecta';
         } else $mensaje = 'Falta completar datos';
      }
      Alert::throw_msg($mensaje, 'danger');
      Redirect::to('login');
   }

   function logout()
   {
      UserSession::unset();
      Redirect::to('login');
   }
}
