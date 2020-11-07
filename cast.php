<?php
/*
Template Name: CAST
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) :
  while (have_posts()) : the_post(); ?>
    <h1 class="section_ttl"><?php the_excerpt(); ?></h1>

  <?php endwhile; ?>
<?php endif; ?>
<section class="cast">
  <div class="cast_card_contents">

    <?php get_template_part('cast_introduction'); ?>

  </div>
  </div>
</section>

<div class="container">
  <section class="cast_contents">
    <div class="cast_card_appearance">
      <?php $cast_group = SCF::get('キャスト');
      foreach ($cast_group as $field_name => $field_value) : ?>
        <!-- ▽ ループ開始 ▽ -->
        <div class="cast_card_appearance_contents">
          <?php echo wp_get_attachment_image($field_value['cast_photo'], 'medium'); ?>
          <div class="cast_card_appearance_text">
            <p class="cast_cat"><?php echo $field_value['cast_from']; ?></p>
            <h3 class="cast_name"><?php echo $field_value['cast_name']; ?></h3>
            <p class="cast_type"><?php echo $field_value['cast_title']; ?></p>
            <p class="cast_lead"><?php echo $field_value['cast_lead']; ?> </p>
          </div>
        </div>
        <!-- △ ループ終了 △ -->
      <?php endforeach; ?>
    </div>
  </section>

  <section class="cast_contents">
    <h2 class="section_ttl">MUSICIAN</h2>
    <div class="cast_card_appearance">
      <?php $musisian_group = SCF::get('音楽');
      foreach ($musisian_group as $field_name => $field_value) : ?>
        <!-- ▽ ループ開始 ▽ -->
        <div class="cast_card_appearance_contents">
          <?php echo wp_get_attachment_image($field_value['musisian_photo'], 'medium'); ?>
          <div class="cast_card_appearance_text">
            <p class="cast_cat"><?php echo $field_value['musisian_from']; ?></p>
            <h3 class="cast_name"><?php echo $field_value['musisian_name']; ?></h3>
            <p class="cast_type"><?php echo $field_value['musisian_title']; ?></p>
            <p class="cast_lead"><?php echo $field_value['musisian_intro']; ?> </p>
          </div>
        </div>
        <!-- △ ループ終了 △ -->
      <?php endforeach; ?>
    </div>
  </section>


  <section class="cast_contents">
    <h2 class="section_ttl">STAFF</h2>
    <div class="cast_card_appearance">
      <?php $staff_group = SCF::get('スタッフ');
      foreach ($staff_group as $field_name => $field_value) : ?>
        <!-- ▽ ループ開始 ▽ -->
        <div class="cast_card_appearance_contents">
          <?php echo wp_get_attachment_image($field_value['staff_photo'], 'medium'); ?>
          <div class="cast_card_appearance_text">
            <p class="cast_cat"><?php echo $field_value['staff_from']; ?></p>
            <h3 class="cast_name"><?php echo $field_value['staff_name']; ?></h3>
            <p class="cast_type"><?php echo $field_value['staff_title']; ?></p>
            <p class="cast_lead"><?php echo $field_value['staff_intro']; ?> </p>
          </div>
        </div>
        <!-- △ ループ終了 △ -->
      <?php endforeach; ?>
    </div>
  </section>
</div>
<?php get_footer(); ?>