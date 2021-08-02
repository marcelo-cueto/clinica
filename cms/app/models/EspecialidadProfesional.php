<?php
class EspecialidadProfesional
{
   public $id = null;
   public $especialidad_id = null;
   public $profesional_id = null;

   function __construct($data = [])
   {
      if (isset($data['id'])) $this->id = $data['id'];
      if (isset($data['especialidad_id'])) $this->especialidad_id = $data['especialidad_id'];
      if (isset($data['profesional_id'])) $this->profesional_id = $data['profesional_id'];
   }
}