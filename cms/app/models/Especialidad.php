<?php
class Especialidad
{
   public $id = null;
   public $nombre = null;

   function __construct($data = [])
   {
      if (isset($data['id'])) $this->id = $data['id'];
      if (isset($data['nombre'])) $this->nombre = $data['nombre'];
   }
}