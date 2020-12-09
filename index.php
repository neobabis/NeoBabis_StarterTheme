<?php
/**
 * Index Page for blog posts
 * @package NeoBabis_StarterTheme
 */
?>
<?php get_header(); ?>

  <h1>================= INDEX.php =================</h1>


<?php if ( have_posts() ) : ?>

  <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', get_post_format() ); ?>
  <?php endwhile; ?>

<?php else : ?>
  <?php get_template_part( 'no-results', 'index' ); ?>
<?php endif; ?>


  <!-- for sidebar.php -->
  <?php //get_sidebar(); ?>
  <!-- for sidebar-footer.php -->
  <?php //get_sidebar( 'footer' ); ?>


<?php get_footer(); ?>
