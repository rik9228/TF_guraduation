<?php get_header(); ?>

<section class="news_child">

  <?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
      <h1 class="section_ttl"> <?php the_title(); ?> </h1>

    <?php endwhile; ?>
  <?php endif; ?>

  <div class="news_card_contents">
    <?php
    /* 現在のページ数を取得 */
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    // $paged = get_query_var('page')  ?: 1;  //静的フロントページの場合
    $the_query = new WP_Query(array(
      'post_status' => 'publish',
      'post_type' =>
      array('post'),
      'posts_per_page' => 9, /* 表示する数 */
      'paged' => $paged,
      'order' => 'DESC'  //何順で並べるかの指定
    )); ?>

    <?php if ($the_query->have_posts()) : ?>
      <?php
      while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <!-- ▽ ループ開始 ▽ -->
        <a href="#" class="news_card">
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
            <dt><?php the_date('Y,m,d'); ?></dt>
            <dd><?php the_title(); ?></dd>
          </dl>
        </a>
        <!-- △ ループ終了 △ -->
      <?php endwhile; ?>
    <?php endif; ?>
  </div>

  <div class="pager">
    <?php if ($the_query->max_num_pages > 1) {
      echo paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => 'page/%#%/',
        'current' => max(1, $paged),
        'total' => $the_query->max_num_pages
      ));
    }
    ?>

  </div>

</section>
<?php get_footer(); ?>