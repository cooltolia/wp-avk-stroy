<?php
/**
 * Template Name: О компании
 *
 * @package WordPress
 * @subpackage avk-stroy
 */

get_header(); ?>

<?php $aboutPage = get_post(62); ?>

<div class="about-data"> 
    <h2 class="about-data__heading"><?php echo $aboutPage->post_title ?></h2>

    <?php echo $aboutPage->post_content ?>
    
</div><!--/ about-data -->

<?php get_template_part( 'template-parts/tenders' ); ?> 

<?php get_footer(); ?>

