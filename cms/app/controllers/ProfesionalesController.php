<?php

class ProfesionalesController extends Controller
{
   function index()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Profesionales'];
      View::render('profesionales', $data);
   }

}