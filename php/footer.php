<footer class="navbar navbar-inverse">
		<div class="navbar-inner">
            <?php     	
                $footer = file_get_contents("./pages/footer.md");
                $json_footer = $json->encode($footer);
                echo '<script type="text/javascript">';
                echo "document.write(converter.makeHtml($json_footer));</script>";
            ?> 
        </div>
</footer>

<script>
    $(function() {
        $("#toc").tocify({ selectors: "h2, h3, h4, h5, h6" });
    });
</script>

<script>
    $(document).ready(function(){
        $('.dropdown-toggle').dropdown()
    });
</script>

<script>
	var _gaq=[['_setAccount','UA-37632044-1'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
<script src="js/vendor/bootstrap.js" type="text/javascript"></script>
<script src="js/vendor/modernizr-2.6.2.min.js" type="text/javascript"></script>
<script src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML" type="text/javascript"></script>

<script type="text/x-mathjax-config">
    MathJax.Hub.Config({
        tex2jax: {inlineMath: [['$','$'], ['$$','$$']]}
    });
</script>