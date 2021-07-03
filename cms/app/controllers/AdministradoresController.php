<?php

class AdministradoresController extends Controller
{
   function index()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Administradores'];
      View::render('administradores', $data);
   }

}