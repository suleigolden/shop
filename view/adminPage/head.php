<?php
session_start();
include_once("../../app/model/DB.php");
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Suleiman Shopping</title>
    <!-- Bootstrap core CSS -->
    <link href="../../assets/sbadmin/css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="../../assets/sbadmin/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/sbadmin/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <script type="text/javascript" src="../../assets/scripts/main_Authentication.js"></script>
  </head>

  <body>

    <div id="wrapper">
     <!-- Include navigation links -->

 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../adminPage">Suleiman Shopping</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="../adminPage"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="../adminPage"><i class="fa fa-edit"></i> Manage Product</a></li>
            <li><a href="../adminPage/order"><i class="fa fa-table"></i> View Order </a></li>
            
          </ul>

          
        </div>
      </nav>