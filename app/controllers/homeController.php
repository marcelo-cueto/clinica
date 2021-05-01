<?php

class homeController
{
   public function index()
   {
      
      $data = ['title' => 'Home', 'bg' => 'dark'];
      View::render('home', $data);
   }
}
