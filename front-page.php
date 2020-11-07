<?php get_header(); ?>



<section class="mv">
  <div class="mv_background">
    <div class="mv_contents wrapper">
      <img src="<?php echo get_template_directory_uri(); ?>/img/heroTtl.png">
      <div class="mv_contents_subBlock">
        <img class="mv_TextImage" src="<?php echo get_template_directory_uri(); ?>/img/holeText.png">

        <?php if (have_posts()) :
          while (have_posts()) : the_post(); ?>
            <p class="mv_lead"><?php the_content();?></p>
          <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </div>
    <div class="mv_reserve wrapper">
      <a class="btn" href="<?php the_field('reserve_btn'); ?>">チケット予約サイトへ</a>
    </div>
  </div>
</section>
<div class="container">
  <section class="about">
    <div class="about_ttls">
      <h2 class="section_ttl">INTRODUCTION</h2>
      <h2 class="about_subTtl">なぜ今「マハーバーラタ」なのか？</h2>
    </div>
    <div class="about_text">
      <p class="about_lead">
        <?php $about_group = SCF::get('about');
        foreach ($about_group as $field_name => $field_value) : ?>
          <?php echo $field_value['about_text']; ?>
        <?php endforeach; ?>
      </p>
    </div>
  </section>

  <section class="video">
    <?php if (get_field('movie_url')) : ?>
      <?php echo $embed_code = wp_oembed_get(get_field('movie_url')); ?>
    <?php endif; ?>
  </section>
  <section class="news">
    <div class="ttl_contents">
      <h2 class="section_ttl">
        <?php $page_date =  get_page_by_path('news');
        echo ($page_date->post_title)
        ?>
      </h2>
      <a class="btn" href="<?php echo esc_url(home_url('news')); ?>">ニュース一覧</a>
    </div>
    <div class="news_card_contents">

      <?php
      $args = array(
        'post_type' =>
        array('post'), /* カスタム投稿名を複数表示*/
        'posts_per_page' => 5, /* 表示する数 */
      ); ?>
      <?php $my_query = new WP_Query($args); ?>
      <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <!-- ▽ ループ開始 ▽ -->

        <a href="<?php the_permalink();?>" class="news_card">
          <?php
          if (has_post_thumbnail()) {
            // アイキャッチ画像が設定されてれば大サイズで表示
            echo get_thumb_img('large');
          } else {
            // なければnoimage画像をデフォルトで表示
            echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
          }
          ?>
          <dl class="card_caption">
            <dt><?php echo get_the_date('Y,m,d'); ?></dt>
            <dd><?php the_title(); ?></dd>
          </dl>
        </a>
        <!-- △ ループ終了 △ -->
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>

    </div>
    <a class="btn" href="#">ニュース一覧</a>
  </section>
</div>
<section class="story">
  <div class="container">
    <h2 class="section_ttl">
      <?php
      $page_date = get_page_by_path('story');
      echo ($page_date->post_title)
      ?>
    </h2>
    <?php $story_group = SCF::get('ストーリー');
    foreach ($story_group as $field_name => $field_value) : ?>
      <p class="story_lead">
        <?php echo $field_value['story']; ?>
      </p>
    <?php endforeach; ?>
    <div class="story_btn wrapper">
      <a class="btn" href="#">もっと詳しく</a>
    </div>
  </div>
</section>
<div class="container">
  <section class="comments">
    <h2 class="section_ttl">
      <?php
      $page_date = get_page_by_path('comments');
      echo ($page_date->post_title)
      ?></h2>
    <h2 class="section_subttl">舞台関係者のみならず各界著名人からコメントが届いています！</h2>
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
      <div class="comments_btn wrapper">
        <a href="#" class="btn">もっと見る</a>
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
  </section>
</div>
<section class="cast_main">
  <h2 class="section_ttl">
    <?php
    $page_date = get_page_by_path('cast');
    echo ($page_date->post_title)
    ?> </h2>
  <div class="container">
    <div class="cast_main_card_contents">
      <?php get_template_part('cast_introduction'); ?>
    </div>
    <div class="cast_main_btn">
      <a href="<?php echo esc_url(home_url('comments')); ?>" class="btn">もっと見る</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>