<?php
class Tratamiento
{
   public $id = null;
   public $nombre = null;
   public $descripcion = null;
   public $programas = null;
   public $foto = null;

   function __construct($data = [])
   {
      if (isset($data['id'])) $this->id = $data['id'];
      if (isset($data['nombre'])) $this->nombre = $data['nombre'];
      if (isset($data['descripcion'])) $this->descripcion = $data['descripcion'];
      if (isset($data['programas'])) $this->programas = $data['programas'];
      if (isset($data['foto'])) $this->foto = $data['foto'];
   }
}