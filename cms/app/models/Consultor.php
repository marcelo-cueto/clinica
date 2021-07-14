<?php
class Consultor
{
   public $id = null;
   public $nombre = null;
   public $img_logo = null;

   function __construct($data = [])
   {
      if (isset($data['id'])) $this->id = $data['id'];
      if (isset($data['nombre'])) $this->nombre = $data['nombre'];
      if (isset($data['img_logo'])) $this->img_logo = $data['img_logo'];
   }
}