<?php
/*
Template Name: story
*/
?>
<?php get_header(); ?>

<section class="stroy_other">
  <?php $intro_group = SCF::get('紹介文');
  foreach ($intro_group as $field_name => $field_value) : ?>
    <div class="story_other_contents">
      <div class="container">
        <p class="story_other_lead">

          <?php echo $field_value['introduction']; ?>

        </p>
      </div>
    </div>
  <?php endforeach; ?>

</section>


<?php get_footer(); ?>