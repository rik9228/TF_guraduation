<?php
/*
Template Name: INQUIRY
*/
?>

<?php get_header(); ?>
<section class="inquiry container">

  <?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
      <h1 class="section_ttl"> <?php the_title(); ?> </h1>
      <div class="inquiry_contents overlay">
        <h4><?= the_content(); ?></h4>
      <?php endwhile; ?>
    <?php endif; ?>

    <?php echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]'); ?>


      </div>
</section>
<?php get_footer(); ?>