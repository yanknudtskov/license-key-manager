<?php 

//call header
get_header();
 
//if valid key
if( have_posts() ) {

while ( have_posts() ) : the_post(); 

?>

<h1><span style="color:#008000">VALID</span></h1>

<?php 

endwhile;

}

//call footer
get_footer(); 

?>
