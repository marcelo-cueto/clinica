<?php

class ConsultoriaController
{
   public function index()
   {
      
      $data = ['title' => 'Home', 'bg' => 'dark'];
      View::render('consultoria', $data);
   }
}
