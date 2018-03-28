<?php get_header(); ?>

<div class="services">
	<div class="services__inner">
        <div class="services__list">

		<?php if ( have_posts() ) :  
			while ( have_posts() ) : the_post(); 
			
			$image = get_field('service-image');

			?>
			
			<a href="<?php the_permalink(); ?>" class="services__item">
				<span style="background-image: url(<?php echo $image['url']; ?>)" class="services__image"></span>
				<span class="services__text"><?php the_title() ?></span>
			</a>
				
			<?php endwhile; ?>
			
		<?php endif; ?>
		
		</div>
	</div>
</div>
<?php get_footer(); ?>