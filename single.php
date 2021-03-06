<?php
/**
 * Single Template render a single post
 * @package NeoBabis_StarterTheme
 */

get_header();
?>

  <h1>================= SINGLE.php =================</h1>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post();

          get_template_part('content', 'single');

        endwhile;
      endif;
      ?>
    </div>
  </div>
</div>

<?php
get_footer();
