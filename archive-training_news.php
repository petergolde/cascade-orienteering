<?php
require(__DIR__.'/Training-Header.class.php');
?>

<?php get_header(); ?>

<div class ="row"> <!-- row for content LEFT -->
  <div class="col-lg-12" id="no-pad">
    
    <!-- Create Eric's nav menu -->
    <?php Erics_Custom_Walker_Menu::create(); ?>
        
    <div class="page-header lg-mrg-bottom">
        <h1>News</h1>
        <hr></hr>
    </div>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article class="post">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <p class="post-info"><?php the_time('F j, Y'); ?> by <?php the_author_posts_link(); ?></p>


        <?php if( get_the_post_thumbnail() ) : ?>
            <div class="img-container">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>
       
        <p><?php the_excerpt(); ?></p>

        <?php the_category( ' ' ); ?>


    </article>



    <?php endwhile; else: ?>

        <div class="page-header">
          <h1>Oh no!</h1>
          <hr></hr>
        </div>
        <p>We've dropped our compass. This is the page-sidebar-right template.</p>

    <?php endif; ?>


  </div> <!-- close  col 12 -->

</div> <!-- close content LEFT row -->

<?php get_footer(); ?>