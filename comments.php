<?php
/*
Template Name: comments
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) :
  while (have_posts()) : the_post(); ?>

    <section class="comments mt0">
      <h1 class="section_ttl"> <?php the_excerpt(); ?> </h1>
      <h2 class="section_subttl"><?php the_content(); ?></h2>
    <?php endwhile; ?>
  <?php endif; ?>


  <div class="comments_card">

    <div class="comments_card_text">
      <h3 class="comments_card_ttl"><span class="comments_card_span">京都佛立ミュージアム館長</span> 長松清潤</h3>
      <p class="comments_card_lead">「文に非ず、其の義に非ず、唯だ一部の意のみ。」 まずこの聖句が浮かんだ。境界線に立つ人類。超越する意志。小池博史氏の心象が生み出したアバターが乱舞しながら深層意識に波紋を起こしてゆく。</p>
    </div>
    <div class="comments_img">
      <?php $image = get_field('comment_img'); //フィールド名
      $size = 'full'; // 画像サイズ
      if (!empty($image)) { //画像があれば表示
        echo wp_get_attachment_image($image, $size);
      } ?>
    </div>
  </div>
  <div class="comments_card_sp"></div>
  <div class="comments_card_text_sp">
    <h3 class="comments_card_ttl_sp"><span class="comments_card_span_sp">京都佛立ミュージアム館長</span> 長松清潤</h3>
    <p class="comments_card_lead_sp">「文に非ず、其の義に非ず、唯だ一部の意のみ。」 まずこの聖句が浮かんだ。境界線に立つ人類。超越する意志。小池博史氏の心象が生み出したアバターが乱舞しながら深層意識に波紋を起こしてゆく。</p>
    <div class="comments_btn_sp wrapper">
      <a href="#" class="btn">もっと見る</a>
    </div>
  </div>
  <div class="comments_textCard_contents">

    <?php $comments_group = SCF::get('協賛コメント');
    foreach ($comments_group as $field_name => $field_value) : ?>
      <div class="comments_textCard">
        <h3 class="comments_textCard_ttl"><?php echo $field_value['comment_name']; ?><span class="comments_textCard_span"><?php echo $field_value['comment_title']; ?></span></h3>
        <p class="comments_textCard_lead">
          <?php echo $field_value['comment_lead']; ?>
      </div>
      <!-- △ ループ終了 △ -->
    <?php endforeach; ?>
  </div>
    </section>
    <?php get_footer(); ?>