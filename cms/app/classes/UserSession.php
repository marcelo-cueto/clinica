<?php

class UserSession
{
   public static function set_current_user($user_id, $user_name)
   {
      if (is_null($user_id)) return;
      $_SESSION['user']['id'] = $user_id;
      $_SESSION['user']['name'] = $user_name;
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
