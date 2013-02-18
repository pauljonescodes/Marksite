	<div class="navbar">
		<div class="navbar-inner">
			<a class="brand" href="?page=index.md"><?php echo substr($lines[0], 6); ?></a>
				<ul id="nav" class="nav">

<?php

if ($handle = opendir('./pages')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry != "index.md") {
            if (is_dir("./pages/" . $entry)) {
                echo '<li class="dropdown">';
                echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $entry . '<b class="caret"></b></a>';
                echo '<ul class="dropdown-menu">';
                
                if ($handleii = opendir('./pages/' . $entry)) {
                    while (false !== ($entryii = readdir($handleii))) {
                        if ($entryii != "." && $entryii != ".." && $entryii!= ".git" && $entryii!="Readme.md" && $entryii != "LICENSE") {
                            if (is_dir("./pages/" . $entry . "/" . $entryii)) {
                                echo '<li class="dropdown-submenu">';
                                echo '<a tabindex="-1" href="#">' . $entryii . '</a>';
                                echo '<ul class="dropdown-menu">';
                                
                                if ($handleiii = opendir('./pages/' . $entry . '/' . $entryii)) {
                                    while (false !== ($entryiii = readdir($handleiii))) {
                                        if ($entryiii != "." && $entryiii != "..") {
                                            echo '<li><a tabindex="-1" href="?page=' . rawurlencode($entry . '/' . $entryii . '/' . $entryiii) . '">' . basename("./pages/" . entry . "/" . $entryii . "/" . $entryiii, ".md") . '</a></li>';
                                        }
                                    }
                                    
                                    closedir($handleiii);
                                }
                                
                                echo '</ul>';
                                echo '</li>';
                            } else {
                                echo '<li><a href="?page=' . rawurlencode($entry . '/' . $entryii) . '">' . basename("./pages/" . entry . "/" . $entryii, ".md") . '</a></li>';
                            }
                        }
                    }
                    
                    closedir($handleii);
                }
                
                echo '</ul>';
                echo '</li>';
            } else {
                echo '<li><a href="?page=' . rawurlencode($entry) . ' ">' . ucwords(basename("./pages/" . $entry, ".md")) . '</a></li>';
            }
        }
    }
    closedir($handle);
	//echo '<li><a href="?page=blog">Blog</a></li>';
}

?>
				</ul>
			</div>
		</div>