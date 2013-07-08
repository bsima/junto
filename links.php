<?php
/*
 * Template Name: Links 
 *
 * Lists all links shared.
 *
 * @package Junto
 */

get_header(); ?>

<div class="sleeve_main">
  <div id="main">
    <h2>
      <?php if ( is_home() or is_front_page() ) : ?>
        <?php _e( 'Recent Links', 'p2' ); ?> <?php if ( p2_get_page_number() > 1 ) printf( __( 'Page %s', 'p2' ), p2_get_page_number() ); ?>
      <?php else : ?>
        <?php printf( _x( 'Links from %s', 'Month name', 'p2' ), get_the_time( 'F, Y' ) ); ?>
      <?php endif; ?>
      
      <span class="controls">
        <a href="#" id="togglecomments"> <?php _e( 'Toggle Comment Threads', 'p2' ); ?></a> | <a href="#directions" id="directions-keyboard"><?php _e( 'Keyboard Shortcuts', 'p2' ); ?></a>
      </span>
    </h2>

    <ul id="postlist">
      <?php // WP_Query argumentsi
      
	$args = array(
	      	'post_type' => 'post',
		);
      // The Query
      $query = new WP_Query( $args ); ?>
 		
      <?php if ( $query->have_posts() ) : ?>

	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <?php if ( get_post_format() == 'link' ) : ?>
            <?php p2_load_entry(); ?>
	  <?php endif; ?>
        <?php endwhile; ?>

      <?php else : ?>
        <li class="no-posts">
          <h3><?php _e( 'No posts yet! This isn\'t working...', 'p2' ); ?></h3>
        </li>
      <?php endif; ?>

      <?php wp_reset_postdata(); ?>
    </ul>

    <div class="navigation">
       <p class="nav-older"><?php next_posts_link( __( '&larr; Older posts', 'p2' ) ); ?></p>
       <p class="nav-newer"><?php previous_posts_link( __( 'Newer posts &rarr;', 'p2' ) ); ?></p>
     </div>

  </div> <!-- main -->

</div> <!-- sleeve -->

<?php get_footer(); ?>

