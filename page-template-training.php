<?php
/**
* Template Name: Training Template
*
* @package WordPress
* @subpackage Cascade Orienteering
* @since Cascade Orienteering 1.0.2
*/
require(__DIR__.'/Training-Header.class.php');
?>
<?php get_header(); ?>

<div class="row">

  <div class="col-lg-12" id="no-pad">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- Create Eric's nav menu -->
    <?php Erics_Custom_Walker_Menu::create(); ?>

    <div class="page-header">
      <h1><?php TrainingTemplate::getFixedTitleHack(); ?></h1>
      <hr>
      </hr>
    </div>

    <?php the_content(); ?>

    <?php endwhile; else: ?>

    <div class="page-header">
      <h1>Oh no!</h1>
      <hr>
      </hr>
    </div>
    <p>We've dropped our compass. <a href="<?php echo site_url();?>">Return to the start.</a></p>

    <?php endif; ?>


  </div> <!-- close col-12 -->

</div><!-- close opening row -->

<?php get_footer(); ?>