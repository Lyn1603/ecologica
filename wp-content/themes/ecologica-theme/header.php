<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecologica-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
<<<<<<< HEAD
=======
	<link rel="stylesheet" href="wp-content/themes/ecologica-theme/style.css">
>>>>>>> lynda

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
<<<<<<< HEAD
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ecologica-theme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$ecologica_theme_description = get_bloginfo( 'description', 'display' );
			if ( $ecologica_theme_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $ecologica_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ecologica-theme' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
=======

	<header id="masthead" class="site-header">
		<div class="site-branding">
		<?php
    	echo wp_get_attachment_image(83, "full", false, [
        "class" => "customimg",
		
		
    ]);    
    ?>
			<h1>Ecologica</h1>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" style="position: relative; left: 200px ;">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'Header',
				)
			);
			?>
		 <button id="candidatez"> Candidatez </button>
		</nav><!-- #site-navigation -->
		

>>>>>>> lynda
	</header><!-- #masthead -->
