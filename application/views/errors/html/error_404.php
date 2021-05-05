<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php 
  $title = !empty($msg) ? $msg : '404 page not found';
  ?>
  <title>esoftgreat | <?php echo $title;?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="bg-dark text-white">
	<div class="container mt-5">
		<h1>SORRY WRONG WAY</h1>
		<?php if (!empty($_SERVER['HTTP_REFERER'])): ?>
			<a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" class="btn btn-info"><- Back</a>
		<?php endif ?>
	</div>
</body>
</html>