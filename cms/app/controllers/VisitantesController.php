<?php

class VisitantesController extends Controller
{
   function index()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Visitantes'];
      View::render('visitantes', $data);
   }

}