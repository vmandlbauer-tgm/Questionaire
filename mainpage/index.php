<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
    <!--[if lte IE 8]>
		 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php
	include("Scripts.html");
	?>

	<title>Ski-verleih Blitz</title>

	</head>
<body >


<header>
<!-- In den jeweiligen Bereichen werden die Sachen importiert also inlcluded  -->
    <ul id="header-top">
	<?php
		include("Header-Top.html");	
	?>
	</ul>
	
    <?php
		include("Slideshow.html");
	?>
		


</header>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
		
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 2000);   
}

</script>
<script>
function myFunction(x) {
    x.classList.toggle("change");
}
</script>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}
</script>
<script type="text/javascript">
        
        var next=$('.lazyContainerNext');
        var loading=$('.lazyLoader');
        
        $(document).ready(function() {
            $("body").on("change", "#productSearch select", function() {
                ajaxProducts();
                
            });
            
            function ajaxProducts() {
                showAjaxloader();
                $("#productsContainer").css("height",$(this).height());
                $("#productsContainer .cols2").fadeOut();
                $.getJSON(window.location.href + "?type=888", $("#productSearch").serialize(), function(data) {  
                    $("#productsContainer").html(data.content);
                    $("#productsContainer").css("height","auto");
                    $("#productsContainer").fadeIn(); 
                    hideAjaxloader();
                });
            }            
        });

        $(window).scroll(function() {
           productsViewport(); 
        });
         
        function productsViewport() {
            $(".productBox").each(function() {         
                if($(this).is(":in-viewport")) {
                    $(this).fadeIn(2000);
                }
            });
        }
         
         
    </script>
<main role="main" style="
    margin-top: 120px;">
	 
<nav id="navigation">
		
		<?php
		include("Dropdown.html");
		?>
	</nav>
	

<article id="intro" style="display:block;"> 
	<section id="intro">
		<?php 
			if(isset($_GET['site'])){
			$seite = $_GET['site'];
			$pfad = $seite.".php";
			include($pfad);
			
			if(!file_exists($pfad)){
				echo"nicht vorhanden";
			}
		}
		else{
			include("intro.php");
		}
		?>

    </section>

	
</article>
<button onclick="window.location.href='Insy/intro.html'">

</main>
   
</body>
</html>