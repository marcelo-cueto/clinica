<?php

class ConsultoresController extends Controller
{
   function index()
   {
      if (empty($_SESSION['user'])) Redirect::to('login');
      $data = ['title' => 'Consultores'];
      View::render('consultores', $data);
   }

}