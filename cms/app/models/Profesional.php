<?php
class Profesional
{
   public $id = null;
   public $nombres = null;
   public $apellidos = null;
   public $dni = null;
   public $grado_academico = null;
   public $director = null;
   public $foto = null;

   function __construct($data = [])
   {
      if (isset($data['id'])) $this->id = $data['id'];
      if (isset($data['nombres'])) $this->nombres = $data['nombres'];
      if (isset($data['apellidos'])) $this->apellidos = $data['apellidos'];
      if (isset($data['dni'])) $this->dni = $data['dni'];
      if (isset($data['grado_academico'])) $this->grado_academico = $data['grado_academico'];
      if (isset($data['director'])) $this->director = $data['director'];
      if (isset($data['foto'])) $this->foto = $data['foto'];
   }
}