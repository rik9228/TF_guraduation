<?php
/*
Template Name: CONFIRM
*/
?>

<?php get_header(); ?>
<section class="confirm container">
  <h1 class="section_ttl"> INQUIRY </h1>
  <div class="confirm_contents overlay">
    <h4>お問い合わせありがとうございました。 <br>メッセージは正常に送信されました。</h4>
  </div>
  <div class="news">
    <div class="ttl_contents">
      <h1 class="section_ttl">LATEST NEWS</h1>
      <a class="btn confirm_btn" href="<?php echo esc_url(home_url('news')); ?>">ニュース一覧</a>
    </div>
    <div class="news_card_contents">
      <?php
      $args = array(
        'post_type' => 'post', /* カスタム投稿名を複数表示*/
        'posts_per_page' => 5, /* 表示する数 */
      ); ?>
      <?php $my_query = new WP_Query($args); ?>
      <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <!-- ▽ ループ開始 ▽ -->
        <a href="<?php the_permalink(); ?>" class="news_card">
          <?php
          if (has_post_thumbnail()) {
            // アイキャッチ画像が設定されてれば大サイズで表示
            echo get_thumb_img('large');
          } else {
            // なければnoimage画像をデフォルトで表示
            echo '<img src="' . ' https://rr.img.naver.jp/mig?src=http%3A%2F%2Fblog-imgs-21.fc2.com%2Fq%2Fr%2Fe%2Fqreia%2F3d38c4a1.jpg&twidth=1200&theight=1200&qlt=80&res_format=jpg&op=r">';
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
    <a class="btn confirm_btn_second" href="<?php echo esc_url(home_url('news')); ?>">ニュース一覧</a>
  </div>
</section>
<?php get_footer(); ?>