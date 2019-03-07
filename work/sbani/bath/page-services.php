<?
/*
Template Name: Сраница услуг
*/
?>
<?php

if($wp_query->post->ID === BATH_KORENOVSK_SERVICES_PAGE && intval($_COOKIE['city']) === 1)
{
    header('Location: '.get_page_link(BATH_KRASNODAR_SERVICES_PAGE));
    exit();
}
elseif($wp_query->post->ID === BATH_KRASNODAR_SERVICES_PAGE && intval($_COOKIE['city']) === 2)
{
    header('Location: '.get_page_link(BATH_KORENOVSK_SERVICES_PAGE));
    exit();
}

get_header();
  
if(have_posts()) 
{
    the_post();
    get_template_part('content', 'services');
}

get_footer(); 
?>