<?php get_header(); ?>

<div class ="row"> 

  <div class="col-lg-12" id="no-pad"> 
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	  <?php if ( get_the_ID() == 18192) { ?>
    <div class="collapse navbar-collapse" id="collapse">
		<?php
          $args = array(
            'menu'  =>  'training-menu',
            'menu_class'  => 'nav navbar-nav',
            'container' =>  'false',
            );
          wp_nav_menu( $args );
        ?>
    </div>  
	  <?php } ?>
	  
        <div class="page-header">
            <h1><?php the_title(); ?></h1>
            <hr></hr>
        </div>

        <?php the_content(); ?>

	<?php endwhile; else: ?>

	    <div class="page-header">
	      <h1>Oh no!</h1>
	      <hr></hr>
	    </div>
	    <p>We've dropped our compass. <a href="<?php echo site_url();?>">Return to the start.</a></p>

	<?php endif; ?>


  </div> <!-- close col-12 -->

</div><!-- close opening row -->

<?php get_footer(); ?>