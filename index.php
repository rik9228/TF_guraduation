<?php get_header(); ?>

<section class="news_child">
  <h1 class="section_ttl"> NEWS </h1>

  <div class="news_card_contents">

    <?php if (have_posts()) :
      while (have_posts()) : the_post(); ?>

        <!-- ▽ ループ開始 ▽ -->
        <a href="<?php the_permalink();?>" class="news_card">
          <?php
          if (has_post_thumbnail()) {
            // アイキャッチ画像が設定されてれば大サイズで表示
            //class  = 'card_image'
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
    <?php endif; ?>
  </div>

  <div class="pager">
    <?php wp_pagenavi(); ?>
  </div>

</section>
</div>
<?php get_footer(); ?>