<?php get_header(); ?>
<link href="https://fonts.googleapis.com/css?family=Dosis:700&display=swap" rel="stylesheet">
<div class="breadcrumb">
    <div class="container">
        <a href="/">Главная</a> <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }
    ?>
    </div>
</div>

<section class="not_find">
	<div class="container">
		<h1>404</h1>
		<p>Опс... такой страницы не существует &nbsp;&nbsp;&nbsp;&nbsp;</p>
		<p><a href="/" class="btn btn-outline-accent">на главную</a></p>
	</div>
</section>

<?php get_footer(); ?>