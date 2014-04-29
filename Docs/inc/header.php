<?php
	// Set page title to a default if not set when included
	if(!isset($pageTitle)) throw new Exception('Page title not set.');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle; ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
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
				<div class="col-sm-5"><h1><a href="index.php">PHP JDF Library</a></h1></div>
				<div class="col-sm-7"><?php include('inc/nav.php'); ?></div>
			</div>
			
		</div>
	</header>
	<div class="container">
