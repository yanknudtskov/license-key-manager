<?php 

//call header
get_header();
 
//if valid key
if( have_posts() ) {

    while ( have_posts() ) : the_post();

?>
GOOD<?php

    endwhile;

} 

//call footer
get_footer(); 

?>
