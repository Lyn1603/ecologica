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
        <link rel="stylesheet" href="../style.css">
        <br>
        <br>
        <br>
        <br>

	<main>
    <h2>  Ecologica - votre école superieur </h2>

    <br>
    <div class="notre-ecole">

    <?php
    echo wp_get_attachment_image(16, "full", false, [
        "class" => "illu1"
    ]);    
    ?>

    <br>

    <p>
        TEXT
        TEXT
        TEXT 
    </p>

    </div>


    
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php
    echo wp_get_attachment_image(17, "full", false, [
        "class" => "illu2"
    ]);    
    ?>
    <h2> Les Formations, du Bachelor au Master </h2>
    <section class="divs">
        
        <div class="div1">
            
            </div>

    
        

        <div class="div2">
            
    
        </div>
        
    
        <div class="div3">
        
    
        </div>
       
        </section>


        <section class="buttons">
        
        <button class="b1">
            Candidatez
            </button>

    
        

            <button class="b2">
            Candidatez
            </button>
        
    
            <button class="b3">
            Candidatez
            </button>
       
        </section>
      


        <section class="formations">

        <h2> Comment participer et soutenir l'école</h2>


        <p> TEXT TEXT TEXT</p>


        <button>
            Text
        </button>


        </section>


        <h2> FORMULAIRE </h2>

        <form action="" method="post">
        <label for="name">Nom :</label>
        <input type="text" id="nom" name="user_name">
        <label for="mail">Prenom :</label>
        <input type="text" id="prenom" name="user_prenom">
        <label for="msg"> Adresse de messagerie :</label>
        <input type="text" id="adresse" name="user_msg">
        <label for="msg"> Liste selective :</label>
        <select name="who" id="who">
            <option value="étudiant"></option>
            <option value="parent d'élève"></option>
        </select>

        <button> S'abonner </button>

        </form>


    </main><!-- #main -->

<?php
get_footer();