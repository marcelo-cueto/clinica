<?php

class NosotrosController
{
   public function index()
   {
      
      $data = ['title' => 'Home', 'bg' => 'dark'];
      View::render('nosotros', $data);
   }
}