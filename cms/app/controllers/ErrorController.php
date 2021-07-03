<?php

class ErrorController extends Controller
{
   function index()
   {
      $data = ['title' => 'Error'];
      View::render('404', $data);
   }

}