<?php 
  namespace App\Controllers;

  class Dashboard extends BaseController
  {
      public function index()
      {
          return view('admin/Dashboard/index');
      }
  }
?>