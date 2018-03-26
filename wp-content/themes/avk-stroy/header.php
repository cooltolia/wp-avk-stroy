
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<link rel="profile" href="http://vk.com/cooltolia">
	
	<?php wp_head(); ?>
</head>


<body class="pageload no-js"><!-- main-header --> 
    <header class="main-header">
		<div class="main-header__top-row"><a class="main-header__logo"><?php the_custom_logo(); ?></a>
		</div>
		<div class="main-header__navigation">
			<div class="main-header__inner-row"><!-- main-nav --> 
			<nav class="main-nav">

				<?php
				wp_nav_menu([
					'theme_location' => 'top-menu',
					"menu"           => 'Top menu',
					'menu_class'     => 'main-nav__list',
					"container"      => false,
					'depth'          => 0,
				]);

				
				?>
				<!-- <ul class="main-nav__list">
					<li class="main-nav__item"><a href="about.html" class="main-nav__link">О нас</a>
					</li>
					<li class="main-nav__item"><a href="objects.html" class="main-nav__link">Объекты</a>
					</li>
					<li class="main-nav__item"><a href="licenses.html" class="main-nav__link">Лицензии</a>
					</li>
					<li class="main-nav__item"><a href="testimonials.html" class="main-nav__link">Отзывы</a>
					</li>
					<li class="main-nav__item"><a href="contacts.html" class="main-nav__link">Контакты</a>
					</li>
				</ul> -->
			</nav><!--/ main-nav --> 
			<div class="main-header__tel"><span>тел.:</span> +7(812) 240-20-68
			</div>
			</div>
		</div>
    </header><!--/ main-header --> <!-- services --> 