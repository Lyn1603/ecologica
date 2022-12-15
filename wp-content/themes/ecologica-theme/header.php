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
	<link rel="stylesheet" href="wp-content/themes/ecologica-theme/style.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="site-branding">
		<?php
    	echo wp_get_attachment_image(83, "full", false, [
        "class" => "customimg"
    ]);    
    ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
		<h1> Ecologica </h1>

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'Header',
				)
			);
			?>
		<button id="candidatez"> Candidatez </button>
		</nav><!-- #site-navigation -->
		

	</header><!-- #masthead -->
