<?php

class EquiposController extends Controller
{
   function index()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Equipos'];
      View::render('equipos', $data);
   }

}