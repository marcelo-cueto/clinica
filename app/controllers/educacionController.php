<?php

class EducacionController
{
   public function index()
   {
      
      $data = ['title' => 'Home', 'bg' => 'dark'];
      View::render('educacion', $data);
   }
}