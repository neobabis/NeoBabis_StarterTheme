<?php
/**
 * Single Template render a single post
 * @package NeoBabis_StarterTheme
 */
?>

<?php get_header(); ?>

  <h1>================= SINGLE.php =================</h1>
<?php
if ( have_posts() ) :
  while ( have_posts() ) : the_post();

    get_template_part( 'content', 'single' );

  endwhile;
endif;
?>

<?php get_footer(); ?>
