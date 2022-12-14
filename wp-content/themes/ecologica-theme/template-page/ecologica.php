<?php
/**
 * Template Name: Ecologica
 */

get_header();
?>


    <main id="primary" class="site-main body-image">

        <?php
        while ( have_posts() ) :
            the_post();

            if(is_front_page()):
?>
                <div class="content-homepage">
                <?php the_content();?>
                </div>

            <?php
            else:
                ?>
                <div class="Banner-other-page"><p><?php the_title()?></p></div>
                <?php
            endif;

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->

<?php

get_footer();
