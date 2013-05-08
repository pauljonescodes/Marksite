<!DOCTYPE html>

<head>
<?php include_once("./php/header.php"); 

$file = "";
	
if (empty($_GET)) {
    $file = "./pages/index.md";
} else {
    $file = './pages' . $_GET['page'];
}

$pagename = ucwords(basename("./pages/" . $file, ".md"));
$title = "";

if ($pagename === 'Index') {
	$title = $sitename;
} else {
	$title = $pagename . ' - ' . $sitename;
}

$dont_want = array('.', '..', 'index.md', 'LICENSE.md', 'Readme.md', '404.md');

?>

<title><?php echo $title; ?></title>

</head>
<body>

<!--
Body
---->

<?php include_once("./php/navbar.php"); ?>

<div id="wrap">
	<div class="container-fluid">
			
				
				<?php 
				
				    if (is_dir($file)) {
    				    $page = "<h1> $pagename </h1><ul>";
    				    
    				    if ($handle = opendir($file)) {
        				    while (false !== ($filename = readdir($handle))) {
        				        if (!in_array($filename, $dont_want)) {
        				            $readfilename = basename($filename, ".md");
        				            $relative_path = rawurlencode(substr($file, 7) . '/' .$filename);
        				            $page = $page . "<li><a href='?page=" . $relative_path ."'>$readfilename</a></li>";
            				    }
            				}
            				
            				$page = $page . "</ul>";
        				    closedir($handle);
        				}
    				    
				    } else {
				        
				    
				        if (file_exists($file) && pathinfo($file, PATHINFO_EXTENSION) == 'md') { 
				        echo '<div class="row-fluid">';
				        echo "<article class='span9'>";
    				        $page = file_get_contents($file);
    				        $json_page = $json->encode($page);
    				        echo '<script type="text/javascript">';
    				        echo "var page = $json_page;";
    				        echo 'var converter = new Markdown.Converter();';
    				        echo 'document.write(converter.makeHtml(page));';
    				        echo '</script>';
    				         echo '</article>';
    				    echo '<div class="span3 scrollable visible-desktop"><div id="toc" data-spy="affix" data-offset-top="60"></div></div>';
    				    echo '</div>';
    				    include_once("./php/footer-navmath.php");
    				    } else if (file_exists($file) && pathinfo($file, PATHINFO_EXTENSION) == 'html') { 
    				        echo file_get_contents($file);
    				    } else {
    				        $page = file_get_contents('./pages/404.md');
    				        $json_page = $json->encode($page);
    				        echo '<script type="text/javascript">';
    				        echo "var page = $json_page;";
    				        echo 'var converter = new Markdown.Converter();';
    				        echo 'document.write(converter.makeHtml(page));';
    				        echo '</script>';
    				    }
    				    
    				   
    				}
					
					
					
					
					
					// echo "<noscript><pre style='padding:0px;margin:0px;border:0px;'>$page</pre></noscript>";
					
				
				?>
			
		
	</div>
</div>

<?php include_once("./php/footer.php"); ?>

</body>
</html>