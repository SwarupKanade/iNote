<?php session_start(); 
include_once $_SERVER['DOCUMENT_ROOT']."/iNote/config.php";
?>
<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="title" content="iNote - Access Your Note Anytime Anywhere">
  <meta name="description" content="Access Your Note Anytime Anywhere. Place your notes at safe place. No Limit for your Notes. You can also manage your Notes, No one can access your Notes. ">
  <meta name="keywords" content="iNote, Note, Notes, Safe Notes, free notes, online notes, note app,free note app">
  <meta name="robots" content="index, follow">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="language" content="English">
  <meta name="revisit-after" content="5 days">
  <meta name="author" content="Admin">

  <title><?php echo "$page"; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo SITE_ROOT.'/assets/css/bootstrap.min.css' ?>" rel="stylesheet">

  <!-- Preload CSS -->
  <link href="<?php echo SITE_ROOT.'/assets/css/preload.css' ?>" rel="stylesheet">

  <!--Table-->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  <!-- Favicons -->
  <link rel="icon" href="<?php echo SITE_ROOT.'/assets/img/favicon.png' ?>">
  <meta name="msapplication-config" content="<?php echo SITE_ROOT.'/assets/img/favicons/browserconfig.xml' ?>">
  <meta name="theme-color" content="#563d7c">

  <!-- Custom styles for this template -->
  <link href="sticky-footer-navbar.css" rel="stylesheet">

</head>

<body class="d-flex flex-column h-100">
  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="#">iNote</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo SITE_ROOT; ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo SITE_ROOT.'/contact.php'; ?>">Contact Us</a>
          </li>
          <?php
        if (isset($_SESSION['Email']) && isset($_SESSION['Password'])) {
            echo '
            <li class="nav-item">
                <a class="nav-link" href="'.SITE_ROOT.'/dashboard/index.php">My Notes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="'.SITE_ROOT.'/dashboard/logout.php">Logout</a>
            </li>';
        }else {
            echo '
            <li class="nav-item">
                <a class="nav-link" href="'.SITE_ROOT.'/dashboard/login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="'.SITE_ROOT.'/dashboard/signup.php">Sign Up</a>
            </li>';
        }
        ?>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Preload -->
<div id="overlay"><div class="load"><hr/><hr/><hr/><hr/></div></div>
