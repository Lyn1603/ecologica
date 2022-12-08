<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ecologica-theme
 */
get_header();
?>
        <link rel="stylesheet" href="wp-content/themes/ecologica-theme/style.css">
        <br>
        <br>
        <br>
        <br>

	<main>

    <section class="icons">
        
    <div class="p1">
            <i> ICON </i>
        </div>


    <div class="p2">
    <i> ICON </i>

    </div>

   

    <div class="p3">
    <i> ICON </i>

    </div>

    </section>
     

    <h2>  Ecologica - votre école superieur </h2>
    <br>
    <div class="cust-div-1">
    <?php
    echo wp_get_attachment_image(9, "full", false, [
        "class" => "customimg"
    ]);    
    ?>

    <p>
        TEXT
        TEXT
        TEXT 
    </p>

    </div>


      
      

    </main><!-- #main -->

<?php
get_footer();