	<footer id="footer">
			<p>| <a href = "https://github.com/pljns/Rutgers-University-Notes">Note source files</a> |
			<a href="https://github.com/pljns/Marksite">#Marksite</a> | 
			<a href="#" onclick='setActiveStyleSheet("default"); return false;'>Day</a> | 
			<a href="#" onclick='setActiveStyleSheet("alternate"); return false;'>Night</a> |
			<a href="http://eden.rutgers.edu/~pmj34/?page=%2FNotes%2F%2FLICENSE.md">License</a> |
			<a href="http://eden.rutgers.edu/~pmj34/socialcontrol.php">#SocialControl</a> |
			<noscript><a href="?page=" style="color:white;text-shadow: 0 2px 0 black;">Noscript sitemap</a></noscript>
			</p>
	</footer>

<script>
$(function() {
                  //Calls the tocify method on your HTML div.
                  $("#toc").tocify({ selectors: "h2, h3, h4, h5, h6" });
              });
</script>

<script>
	var _gaq=[['_setAccount','UA-37632044-1'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<script>
  $(function () {
    $("#nav").tinyNav();
  });
</script>

<script type="text/x-mathjax-config">
MathJax.Hub.Config({
  tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
});
</script>

<script src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML" type="text/javascript"></script>

<script>
$("h2").click(function() {
    var section_idx = parseInt($(this).get(0).id.replace( /section_(\d+)/, "$1" ));
    wm_toggle_section( section_idx );
  })
</script>
