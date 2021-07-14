<?php

class TratamientosController extends Controller
{
   function index()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Tratamientos'];
      View::render('tratamientos', $data);
   }

   function nuevo_tratamiento()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Nuevo Tratamiento'];
      View::render('nuevo_tratamiento', $data);
   }
}