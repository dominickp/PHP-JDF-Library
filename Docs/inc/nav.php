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
        <li class="dropdown <?php echo isActive('jdf_usage.php').isActive('jmf_usage.php') ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usage <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="jdf_usage.php">JDF</a></li>
            <li><a href="jmf_usage.php">JMF</a></li>
            <li><a href="jmf_usage.php">JMF Manager</a></li>
          </ul>
        </li>
        <li class="<?php echo isActive('examples.php') ?>"><a href="examples.php">Examples</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo $libraryGitHubURL; ?>" target="_blank"><i class="fa fa-github-alt"></i> GitHub</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>