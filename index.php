<!DOCTYPE html>

<head>
<?php include_once("./php/header.php"); 

$file = "";
	
if (empty($_GET)) {
    $file = "./pages/index.md";
} else {
    $file = './pages/' . $_GET['page'];
}

$pagename = ucwords(basename("./pages/" . $file, ".md"));
$title = "";

if ($pagename === 'Index') {
	$title = $sitename;
} else {
	$title = $pagename . ' - ' . $sitename;
}
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
        				        if ($filename != "." && $filename != ".." && $filename != "index.md" && $filename[0] != '.' && $filename != 'LICENSE.md' && $filename != 'Readme.md' && $filename != '404.md'){
        				        $readfilename = basename($filename, ".md");
            				    $page = $page . "<li><a href = ". "?page=" . rawurlencode(substr($file, 7) . '/' .$filename) .">$readfilename</a></li>";
            				    }
            				}
            				
            				$page = $page . "</ul>";
        				    closedir($handle);
        				}
    				    
				    } else if (file_exists($file)){ 
					   $page      = file_get_contents($file);
				    } else {
    				    $page = file_get_contents('./pages/404.md');
				    }
					
					$json_page = $json->encode($page);
					
					echo '<div class="row-fluid">';
					echo "<article class='span9'>";
					echo '<script type="text/javascript">';
					echo "var page = $json_page;";
					echo 'var converter = new Markdown.Converter();';
					echo 'document.write(converter.makeHtml(page));';
					echo '</script>';
					echo "<noscript><pre style='padding:0px;margin:0px;border:0px;'>$page</pre></noscript>";
					echo '</article>';
					echo '<div class="span3 scrollable visible-desktop"><div id="toc" data-spy="affix" data-offset-top="60"></div></div>';
					echo '</div>';
				
				?>
			
		
	</div>
</div>

<?php include_once("./php/footer.php"); ?>

</body>
</html>