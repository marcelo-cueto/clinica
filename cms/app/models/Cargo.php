<?php
class Cargo
{
   public $id = null;
   public $nombre = null;
   public $destacar = null;
   public $profesional_id = null;

   function __construct($data = [])
   {
      if (isset($data['id'])) $this->id = $data['id'];
      if (isset($data['nombre'])) $this->nombre = $data['nombre'];
      if (isset($data['destacar'])) $this->destacar = $data['destacar'];
      if (isset($data['profesional_id'])) $this->profesional_id = $data['profesional_id'];
   }
}