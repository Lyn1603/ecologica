<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecologica-theme
 */

?>

<link rel="stylesheet" href="wp-content/themes/ecologica-theme/built.css">
	<footer id="colophon" class="site-footer">
		<section class="top">
            <div class="left-footer">
                <?php
                echo get_custom_logo( 0 );
                
                echo wp_get_attachment_image(17, "full", false, [
                    "class" => "customimg"
                ]); 
                
                ?>
                <img src="" alt="bot-ecologica">
                <button class="download" >télécharger la documentation</button>
            </div>
            <div id="cont-link">
                <h1>Navigation</h1>
                <li id="list-foot">
                    <ul><a href="">accueil</a></ul>
                    <ul><a href="">Ecologica</a></ul>
                    <ul><a href="">Ecologica dans les médias</a></ul>
                    <ul><a href="">les formations</a></ul>
                    <ul><a href="">Candidater</a></ul>
                    <ul><a href="">Contact</a></ul>
                </li>
            </div>
            <div id="cont-link">
                <h1>Ecologica</h1>
                <li id="list-foot">
                    <ul><a href="">L'école</a></ul>
                    <ul><a href="">la gouvernance</a></ul>
                    <ul><a href="">admissions et tarifs</a></ul>
                    <ul><a href="">la vie étudiante</a></ul>
                    <ul><a href="">le réseau ecologica</a></ul>
                </li>
            </div>
            <div id="cont-link">
                <h1>Nous Contactez</h1>

                <div id="cont-contact">
                    <h2>Téléphone:</h2>
                    <p id="misc-info">+33 7 82 31 78 64</p>
                </div>
                <div>
                    <h2>Email:</h2>
                    <p id="misc-info">contact@ecologica.education</p>
                </div>

            </div>

        </section>

        <section class="bot">
            <div class="bot_var_txt">
                <p>Copyright © 2022 –</p> <p id="var-txt"> Break-Out Company </p> <p>– Agence de communication</p>
            </div>
            <div id="var-txt">Politique de confidentialité – Mentions légales</div>
        </section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
