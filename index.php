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
	$sitename = substr($lines[0], 6);
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

<?php include_once("./php/navbar.php"); ?>

<div id="wrap">
	<div class="container-fluid">
			
				
				<?php 
				
					$page      = file_get_contents($file);
					$json_page = $json->encode($page); 
					
					echo '<div class="row-fluid">';
					echo "<article class='span9'>";
					echo "<script type='text/javascript'>";
					echo "var page = $json_page;";
					echo "var converter = new Markdown.Converter();";
					echo "document.write(converter.makeHtml(page));";
					echo "</script>";
					echo "</article>";
					
					echo '<div class="span3 scrollable visible-desktop"><div id="toc"></div></div></div>';
				
				?>
			
		
	</div>
</div>

<?php include_once("./php/footer.php"); ?>

</body>
</html>