<nav class="navbar navbar-default navbar-static-top" role="navigation" id="top">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand hidden-sm hidden-xs" href="http://eden.rutgers.edu/~pmj34"><?php echo $sitename; ?></a>
    <a class="navbar-brand visible-sm visible-xs" href="http://eden.rutgers.edu/~pmj34"><?php echo $short_sitename; ?></a>
  </div>
        
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">

<?php

if ($handle = opendir('./pages')) {
    while (false !== ($entry = readdir($handle))) {
        if (!in_array($entry, $dont_want)) {
            if (is_dir("./pages/" . $entry)) {
                echo '<li class="dropdown">';
                echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $entry . '<b class="caret"></b></a>';
                echo '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">';
                
                print_nav_bar('./pages/' . $entry . '/');
                
                echo '</ul>';
                echo '</li>';
            } else {
                echo '<li><a href="?page=' . rawurlencode($entry) . ' ">' . ucwords(basename("./pages/" . $entry, ".md")) . '</a></li>';
            }
        }
    }
    
    closedir($handle);
}

?>

                <li><a href="http://www.pljns.com/blog">Blog</a></li>
            </ul>
  </div><!-- /.navbar-collapse -->
</nav>
		
<?php

function print_nav_bar($file_name) {
	if ($file_handle = opendir($file_name)) { /* if it opens */
		while (false !== ($current_entry = readdir($file_handle))) { /* while there are entries */
        	if ($current_entry[0] != '.' && !in_array($current_entry, $dont_want) && $current_entry != "LICENSE.md" && $current_entry != "Readme.md") { /* that don't equal this stuff */
        		if (is_dir($file_name . $current_entry)) { /* perform this if it's a directory */
        			echo '<li class="dropdown-submenu" role="presentation">';
                    echo '<a tabindex="-1" href="?page=' . rawurlencode(substr($file_name, 7) . '/' .$current_entry) . '">' . $current_entry . '</a>';
                    echo '<ul class="dropdown-menu">';
        			echo print_nav_bar($file_name . $current_entry . '/');
        			echo '</ul>';
        			echo '</li>';
        		} else if (pathinfo($current_entry, PATHINFO_EXTENSION) == 'md'){
	        		echo '<li><a href="?page=' . rawurlencode(substr($file_name, 7) . '/' .$current_entry) . ' ">' . ucwords(basename("./pages/" . $current_entry, ".md")) . '</a></li>';
        		}
        	}
        }
	}
}

?>
