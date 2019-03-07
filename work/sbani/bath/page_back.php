<?php 
get_header();

if(have_posts()) 
{
    the_post();
    get_template_part('content', 'page');
}

get_footer(); 
?>