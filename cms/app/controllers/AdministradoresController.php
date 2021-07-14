<?php

class AdministradoresController extends Controller
{
   function index()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Administradores'];
      View::render('administradores', $data);
   }

   function nuevo_administrador()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Nuevo Administrador'];
      View::render('nuevoAdministrador', $data);
   }
}