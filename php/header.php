<?php
	include("JSON.php");
	$json      = new Services_JSON();
	$lines = file("meta.txt", FILE_IGNORE_NEW_LINES);	
?>

<meta name="keywords" content="<?php echo substr($lines[1], 9); ?>">
<meta name="author" content="<?php echo substr($lines[2], 7); ?>">
<meta name="description" content= "<?php echo substr($lines[3], 12); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<script src="js/vendor/Markdown.Converter.js" type="text/javascript"></script>
<script src="js/vendor/modernizr-2.6.2.min.js" type="text/javascript"></script>
<script src="js/vendor/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="js/vendor/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
<script src="js/vendor/bootstrap.js" type="text/javascript"></script>

<link href="css/main.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" media="screen" type="text/css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" type = "text/css" rel="stylesheet">
<link href="css/normalize.css" type="text/css" rel="stylesheet">
<link href="css/jquery.tocify.css" type="text/css" rel="stylesheet">
<link href="css/style.css" type="text/css" rel="stylesheet" title="default">
<link href="css/night.css" type="text/css" rel="stylesheet" title="alternate">
<link href="css/print.css" rel="stylesheet" type="text/css" media="print" >


<link href="img/fav.ico" rel="shortcut icon" />
<link rel="apple-touch-icon" href="img/apple-touch/icon.png" />
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch/icon-ipad.png" />
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch/icon-iphone-retina.png" />
<link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch/icon-ipad-retina.png" />

<meta name="apple-mobile-web-app-capable" content="yes" />
<link rel="apple-touch-startup-image" href="img/startup.jpg">

<script src="js/vendor/tinynav.js"></script>
<script src="js/vendor/jquery.tocify.js"></script>
<script src="js/vendor/styleswitcher.js" type="text/javascript"></script>