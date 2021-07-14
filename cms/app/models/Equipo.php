<?php
class Equipo
{
   public $id = null;
   public $nombre = null;
   public $funcionalidad = null;
   public $descripcion = null;
   public $foto = null;

   function __construct($data = [])
   {
      if (isset($data['id'])) $this->id = $data['id'];
      if (isset($data['nombre'])) $this->nombre = $data['nombre'];
      if (isset($data['funcionalidad'])) $this->funcionalidad = $data['funcionalidad'];
      if (isset($data['descripcion'])) $this->descripcion = $data['descripcion'];
      if (isset($data['foto'])) $this->foto = $data['foto'];
   }
}