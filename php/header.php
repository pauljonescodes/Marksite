<?php

include("JSON.php");
$json = new Services_JSON();

$sitename = "Paul Jones at Rutgers University";
$short_sitename = "Paul Jones at Rutgers";
$keywords = "Rutgers,Computer science,Philosophy";
$author = "Paul Jones";
$description = "I am a Computer Science and Philosophy undergraduate at Rutgers New Brunswick.
I earned an Associate's Degree in Liberal Arts from Mercer County Community College where I graduated quite early.
I work as a Web Development Intern for Local Wisdom Inc., where I develop apps in Objective-C for iOS and in C++.
I am aggressively pursuing my Bachelor's with ambitions to continue my formal education.";
	
?>

<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="author" content="<?php echo $author; ?>">
<meta name="description" content= "<?php echo $description; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="apple-mobile-web-app-capable" content="yes" />

<script src="js/vendor/Markdown.Converter.js" type="text/javascript"></script>
<script src="js/vendor/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="js/vendor/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
<script src="js/vendor/jquery.tocify.js"></script>

<link href="css/main.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type = "text/css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" type = "text/css" rel="stylesheet">
<link href="css/normalize.css" type="text/css" rel="stylesheet">
<link href="css/jquery.tocify.css" type="text/css" rel="stylesheet">
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/print.css" rel="stylesheet" type="text/css" media="print" >

<link rel="shortcut icon" href="http://eden.rutgers.edu/~pmj34/img/favicon.ico" />
<link rel="apple-touch-icon-precomposed" href="img/apple-touch/icon.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch/icon-ipad.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch/icon-iphone-retina.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch/icon-ipad-retina.png" />
<link rel="apple-touch-startup-image" href="img/startup.jpg">
