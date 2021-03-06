<?php
    include_once('inc/lang.php');
    // Set page title to a default if not set when included
    if (!isset($pageTitle)) throw new Exception('Page title not set.');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="php, jdf, jmf, indigo, job, definition, format, automation, workflow" />
    <meta name="description" content="PHP JDF Library is a collection of PHP classes made to create and send JDF and JMF." />
    <meta name="author" content="Dominick Peluso" />
    <link href="favicon.ico" rel="icon" type="image/x-icon"/>

    <title><?php echo $libraryTitle . ': ' . $pageTitle; ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- highlight.js -->
    <link rel="stylesheet" href="http://yandex.st/highlightjs/8.0/styles/obsidian.min.css">
    <!-- My styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-5"><h1><a href="index.php"><?php echo $libraryTitle; ?></a></h1></div>
            <div class="col-sm-7"><?php include_once('inc/nav.php'); ?></div>
        </div>

    </div>
</header>
<div id="content_wrapper">
    <div class="container">
