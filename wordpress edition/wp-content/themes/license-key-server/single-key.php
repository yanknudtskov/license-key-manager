<?php 

//call header
get_header();
 
//if valid key
if( have_posts() ) {

while ( have_posts() ) : the_post(); 

?>

<h1>VALID</h1>

<?php 

endwhile;

}

//call footer
get_footer(); 

?>
