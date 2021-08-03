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
            $admin = Administrador::validate($_POST['email'], sha1($_POST['clave']));
            if ($admin) {
               if ($admin->cambiar_clave == 1) {
                  Redirect::to("login/nueva_clave/$admin->id");
               }
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

   function olvide_clave()
   {
      if (isset($_SESSION['user'])) Redirect::to('profesionales');
      View::render('olvideClave');
   }

   function enviar_provisoria()
   {
      if (isset($_SESSION['user'])) Redirect::to('profesionales');
      $mensaje = '';
      if ($_REQUEST['csrf_token'] == $_SESSION['csrf_token']['token']) {
         if (isset($_POST['email'])) {
            $admin = Factory::get('Administrador', 'administradores', ['email' => $_POST['email']]);
            if ($admin) $mensaje = self::clave_provisoria($admin->id, $admin->email);
            else $mensaje = 'No hay administradores registrados con este email';
         } else $mensaje = 'Falta completar datos';
      } else $mensaje = 'Acceso denegado';
      Alert::throw_msg($mensaje, 'danger');
      Redirect::to('login');
   }

   private static function clave_provisoria($id, $email)
   {
      $clave     = random_string(6);
      $para      = $email;
      $titulo    = 'Clave provisoria';
      $mensaje   = 'Esta es su clave provisoria:' . "\r\n" . $clave;
      $cabeceras = 'From: noresponder@centrolibertador.com.ar' . "\r\n" .
         'Reply-To: info@centrolibertador.com.ar' . "\r\n" .
         'X-Mailer: PHP/' . phpversion();
      var_dump($mensaje);
      exit();
      if (mail($para, $titulo, $mensaje, $cabeceras)) {
         $resultado = 'Email enviado con &eacute;xito';
         $data = [
            'clave' => sha1($clave),
            'cambiar_clave' => 1
         ];
         Factory::update_array('administradores', $data, ["`id` = $id"]);
      } else $resultado = 'Disculpe. No se pudo enviar el email';
      return $resultado;
   }

   function nueva_clave($id)
   {
      if (isset($_SESSION['user'])) Redirect::to('profesionales');
      if (isset($_POST['nueva-clave']) && $_POST['nueva-clave'] == $_POST['confirmacion-clave']) {
         $data = [
            'clave' => sha1($_POST['nueva-clave']),
            'cambiar_clave' => 0
         ];
         $id = $_POST['admin-id'];
         $result = Factory::update_array('administradores', $data, ["`id` = $id"]);
         if ($result == true) $mensaje = 'Clave modificada con &eacute;xito';
         else $mensaje = 'Disculpe. No se pudo modificar la clave';
         Alert::throw_msg($mensaje, 'danger');
         Redirect::to('login');
      }
      $data = ['id' => $id];
      View::render('nuevaClave', $data);
   }
}
