<?php
class Administrador
{
   public $id = null;
   public $nombres = null;
   public $apellidos = null;
   public $email = null;
   public $clave = null;
   public $superadmin = null;

   function __construct($data = [])
   {
      if (isset($data['id'])) $this->id = $data['id'];
      if (isset($data['nombres'])) $this->nombres = $data['nombres'];
      if (isset($data['apellidos'])) $this->apellidos = $data['apellidos'];
      if (isset($data['email'])) $this->email = $data['email'];
      if (isset($data['clave'])) $this->clave = $data['clave'];
      if (isset($data['superadmin'])) $this->superadmin = $data['superadmin'];
      if (isset($data['cambiar_clave'])) $this->cambiar_clave = $data['cambiar_clave'];
   }

   public static function validate($email, $clave)
   {
      $params = [
         'email' => $email,
         'clave' => $clave
      ];
      $result = Factory::get(Static::class, 'administradores', $params);
      return $result;
   }
}
