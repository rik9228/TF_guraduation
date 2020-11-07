<?php
/*
Template Name: COMIC
*/

?>
<?php get_header(); ?>


<?php if (have_posts()) :
  while (have_posts()) : the_post(); ?>
    <h2 class="section_ttl"><?php the_title(); ?></h2>
    <?php the_content(); ?>
  <?php endwhile; ?>
<?php endif; ?>
<?php echo do_shortcode('[instagram-feed]'); ?>


<?php get_footer(); ?>