<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'ecologica' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'R;[IEwT93]2oIi#~_IYlzMpypyi;6w8% F)/w=:^ws9ebMDOOBhb CM3y:EL=C3Q' );
define( 'SECURE_AUTH_KEY',  'J}U)VI,WJ7xS]%T~jsznd:2QwJg{ewlVn.295|mbX*TIthaKaTlqIVUN-Wk!Cleq' );
define( 'LOGGED_IN_KEY',    'bj:&&+ee`g0y4+dB4&R%`Rnu(E-$iy*ba#R8i:XHC,xd=OqC/:Ll77kef,[-1ot=' );
define( 'NONCE_KEY',        '&VwHW9Dm02p$bfM%>LQIrC<_Vg}`tE1VNCKocX#T74ef~W1=X00_GWD&tgk:/$*S' );
define( 'AUTH_SALT',        '={CYnUGg|e-@<=r[v5v+(6#N/TZIziJ)#l@.@ty7?XiL^M 7`0^O0OV#^ED*bJ%i' );
define( 'SECURE_AUTH_SALT', 'qoB]h#)UR)O-N }[+(){D%YFtg!U<4wB qiM?j=qY%,faHsFt02Q&+rST<u_z6CK' );
define( 'LOGGED_IN_SALT',   'u)W;T5wlh]^lw?vZ$8v;.6*[A~cJ:S]Lg)K wbsO*d4.6Cvk7z!8-R0-+:MvQ+(}' );
define( 'NONCE_SALT',       '2>1O6(W][P+s{LLv )39J=yo|E_5H3L=C6(n$Bjo:A:HGHR:Bz*(=m+f[5q4};d+' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'K8oqW_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
