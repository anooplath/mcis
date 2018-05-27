<html>
<head>
	<title>Mini Car Inventory System</title>
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/jquery.dataTables.min.css">
        <script src="<?php echo ROOT_PATH; ?>assets/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo ROOT_PATH; ?>assets/js/jquery.validate.min.js"></script>
        <script src="<?php echo ROOT_PATH; ?>assets/js/additional-methods.min.js"></script>
        <script src="<?php echo ROOT_PATH; ?>assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo ROOT_PATH; ?>assets/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">Min Car Inventory System</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo ROOT_URL; ?>?controller=manufacturer&action=add">Add Manufacturer</a></li>
            <li><a href="<?php echo ROOT_URL; ?>?controller=model&action=add">Add Model</a></li>
            <li><a href="<?php echo ROOT_URL; ?>?controller=model&action=viewInventory">View Inventory</a></li>
          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

     <div class="row">
     	<?php require($view); ?>
     </div>

    </div><!-- /.container -->
</body>
</html>