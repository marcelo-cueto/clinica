<?php

class UserSession
{
   public static function set_current_user($id, $name, $super)
   {
      if (is_null($id)) return;
      $_SESSION['user']['id'] = $id;
      $_SESSION['user']['name'] = $name;
      $_SESSION['user']['superadmin'] = $super;
      return;
   }

   public static function unset()
   {
      session_unset();
      session_destroy();
      session_write_close();
      setcookie(session_name(), '', 0, '/');
      return;
   }
}
