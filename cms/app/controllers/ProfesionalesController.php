<?php

class ProfesionalesController extends Controller
{
   function index()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Profesionales'];
      $data['profesionales'] = Factory::get_list('Profesional', 'profesionales');
      View::render('profesionales', $data);
   }

   function nuevo_profesional()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Nuevo Profesional'];
      View::render('nuevoProfesional', $data);
   }

   function editar()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Editar Profesional'];
      View::render('editarProfesional', $data);
   }

   function eliminar()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Eliminar Profesional'];
      View::render('eliminarProfesional', $data);
   }
}