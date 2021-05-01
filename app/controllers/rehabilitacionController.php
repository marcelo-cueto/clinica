<?php

class RehabilitacionController
{
   public function index()
   {
      
      $data = ['title' => 'Home', 'bg' => 'dark'];
      View::render('rehabilitacion', $data);
   }
}
