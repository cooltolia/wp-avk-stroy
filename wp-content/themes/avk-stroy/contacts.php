<?php
/**
 * Template Name: Контакты
 *
 * @package WordPress
 * @subpackage avk-stroy
 */

get_header(); ?>

<?php $aboutPage = get_post(69); ?>

<div class="contacts-data">
    <div class="contacts-data__name"><?php echo get_option('company_name')?>
    </div>
    <div class="contacts-data__address"><?php echo get_option('company_address')?>
    </div>
    <div class="contacts-data__tel">Телефон: <?php echo get_option('company_phone')?>
    </div>
</div><!--/ contacts-data --> <!-- map --> 
    <div class="map">
      <div id="map" class="map__inner">
      </div>
    </div><!--/ map --> 
    <div class="decoration">
    </div><!-- main-footer --> 

<?php get_footer(); ?>