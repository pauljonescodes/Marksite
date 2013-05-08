<!--

### Navbar

This is generated recursively with PHP, so it's not readable.
It goes through all files and directories in the `/pages` directory
and makes each directory a nested submenu and each file a clickable link.
Directories are also clickable links.

-->

	<div class="navbar">
		<div class="navbar-inner">
			<a class="brand" href="?page=/index.md"><?php echo $sitename; ?></a>
				<ul id="nav" class="nav">

<?php

if ($handle = opendir('./pages')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry != "index.md" && $entry != "404.md") {
            if (is_dir("./pages/" . $entry)) {
                echo '<li class="dropdown">';
                echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $entry . '<b class="caret"></b></a>';
                echo '<ul class="dropdown-menu">';
                
                print_nav_bar('./pages/' . $entry . '/');
                
                echo '</ul>';
                echo '</li>';
            } else {
                echo '<li><a href="?page=' . rawurlencode($entry) . ' ">' . ucwords(basename("./pages/" . $entry, ".md")) . '</a></li>';
            }
        }
    }
    
    echo '<li><a href="http://www.pljns.com">Blog</a></li>';
    
    closedir($handle);
}
?>

				</ul>
			</div>
		</div>
		
<?php

function print_nav_bar($file_name) {
	if ($file_handle = opendir($file_name)) { /* if it opens */
		while (false !== ($current_entry = readdir($file_handle))) { /* while there are entries */
        	if ($current_entry != "." && $current_entry != ".." && $current_entry != "index.md" && $current_entry[0] != '.' && $current_entry != 'LICENSE.md' && $current_entry != 'Readme.md') { /* that don't equal this stuff */
        		if (is_dir($file_name . $current_entry)) { /* perform this if it's a directory */
        			echo '<li class="dropdown-submenu">';
                    echo '<a tabindex="-1" href="?page=' . rawurlencode(substr($file_name, 7) . '/' .$current_entry) . '">' . $current_entry . '</a>';
                    echo '<ul class="dropdown-menu">';
        			echo print_nav_bar($file_name . $current_entry . '/');
        			echo '</ul>';
        			echo '</li>';
        		} else {
	        		echo '<li><a href="?page=' . rawurlencode(substr($file_name, 7) . '/' .$current_entry) . ' ">' . ucwords(basename("./pages/" . $current_entry, ".md")) . '</a></li>';
        		}
        	}
        }
	}
}

?>