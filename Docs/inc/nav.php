<?php
	$currentPage = basename($_SERVER["PHP_SELF"]);
	
	function isActive($pageName){
		global $currentPage;
		if($currentPage == $pageName){
			return 'active';
		}
	};
?>
<nav class="navbar navbar-inverse" role="navigation">
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php echo isActive('index.php') ?>"><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usage <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">JDF</a></li>
            <li><a href="#">JMF</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://github.com/dominickp/PHP-JDF-Library" target="_blank"><i class="fa fa-github-alt"></i> GitHub</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>