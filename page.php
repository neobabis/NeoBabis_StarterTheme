<?php
/**
 * Page Template render a static page
 * @package NeoBabis_StarterTheme
 */

get_header();
?>

  <h1>================= PAGE.php =================</h1>
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <?php the_content(); ?>
          </div>
      </div>
  </div>

<?php
get_footer();
