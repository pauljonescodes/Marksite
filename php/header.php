<?php
	include("JSON.php");
	$json      = new Services_JSON();
	
	$sitename = "Paul Jones at Rutgers University";
	$keywords = "Rutgers,Computer science,Philosophy";
	$author = "Paul Jones";
	$description = "Paul Jones is a Computer Science and Philosophy undergraduate at Rutgers New Brunswick. He works as a Web Development Intern for Local Wisdom Inc., where he works primarily with Objective-C for iOS. He earned an Associate's Degree in Liberal Arts from Mercer County Community College. He is interested in enrolling in a graduate program centered around neuroscience and philosophy of mind.";
		
?>

<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="author" content="<?php echo $author; ?>">
<meta name="description" content= "<?php echo $description; ?>">

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
<link href="css/night.css" type="text/css" rel="stylesheet" title="alternate">
<link href="css/print.css" rel="stylesheet" type="text/css" media="print" >
<link href="css/style.css" type="text/css" rel="stylesheet" title="default">

<link rel="shortcut icon" href="http://eden.rutgers.edu/~pmj34/img/favicon.ico" />

<link rel="apple-touch-icon" href="img/apple-touch/icon.png" />
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch/icon-ipad.png" />
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch/icon-iphone-retina.png" />
<link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch/icon-ipad-retina.png" />

<meta name="apple-mobile-web-app-capable" content="yes" />
<link rel="apple-touch-startup-image" href="img/startup.jpg">

<script src="js/vendor/tinynav.js"></script>
<script src="js/vendor/jquery.tocify.js"></script>
<script src="js/vendor/styleswitcher.js" type="text/javascript"></script>