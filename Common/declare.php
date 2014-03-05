<?php
require_once("includes.php");
require_once("User/UserClass.php" );

if($user->IsUserLoggedIn()===false && getCurrentFileName()!=='login.php'){
    header("Location:login.php?returnurl=".getCurrentFileName());
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=SITE_NAME?></title>
    <!-- Bootstrap core CSS -->
    <link href="<?=BASE_URL?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=BASE_URL?>css/selectize.bootstrap3.css" rel="stylesheet">
    <link href="<?=BASE_URL?>css/styles.css" rel="stylesheet">
    <link href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>  

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class='container'>