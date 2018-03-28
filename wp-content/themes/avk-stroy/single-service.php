<?php get_header(); ?>

<?php if ( have_posts() ) :  
    while ( have_posts() ) : the_post(); ?>

	<main class="service" role="main">
		<h2 class="service__heading"><?php the_title() ?></h2>
        <div class="service-page">

            <?php the_content() ?>
            
        </div>
	</main>


    <?php endwhile; ?>
    
<?php endif; ?>

<?php get_footer(); ?>