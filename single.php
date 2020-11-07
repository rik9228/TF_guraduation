<?php get_header(); ?>



<section class="news_child">
  <h1 class="section_ttl"> NEWS </h1>


  <?php if (have_posts()) :
    while (have_posts()) :
      the_post();
  ?>

      <div class="single_card">


        <?php
        if (has_post_thumbnail()) {
          // アイキャッチ画像が設定されてれば大サイズで表示
          echo get_thumb_img('large');
        } else {
          // なければnoimage画像をデフォルトで表示
          echo '<img src="' . ' https://rr.img.naver.jp/mig?src=http%3A%2F%2Fblog-imgs-21.fc2.com%2Fq%2Fr%2Fe%2Fqreia%2F3d38c4a1.jpg&twidth=1200&theight=1200&qlt=80&res_format=jpg&op=r">';
        }
        ?>
        <div class="single_card_ttl">
          <dl class="single_card_ttl_list">
            <dt><?= the_date('Y,m,d'); ?></dt>
            <dd><?= the_title(); ?></dd>
          </dl>
        </div>
        <div class="single_card_content">
          <?= the_content(); ?>
        </div>


      </div>
    <?php
    endwhile; ?>
  <?php
  endif; ?>

  <div class="pagenation">
    <?php $prevpost = get_adjacent_post(true, '', true); //前の記事
    $nextpost = get_adjacent_post(true, '', false); //次の記事
    if ($prevpost && $nextpost) //前の記事、次の記事いずれか存在しているとき
    ?>

    <?php if ($prevpost) {
    echo '<div class="pagenation_contents">
            <a class="pagenation_icon" href="' . get_the_permalink($prevpost->ID) . '">
              < </a>
              <dl>
                <dt><a href="' . get_the_permalink($prevpost->ID) . '">' . get_the_date($prevpost->date) . ' </a></dt>
                <dd><a href="' . get_the_permalink($prevpost->ID) . '">' . get_the_title($prevpost->ID) . '</a></dd>
                </dl>
          </div>';
  } else {
    echo '<div><a href="' . network_site_url('/') . '"><i class="fas fa-home"></i></a></div>';
  }
  if ($nextpost) {
    echo '<div class="pagenation_contents">
            <a class="pagenation_icon" href="' . get_the_permalink($nextpost->ID) . '">
              > </a>
               <dl>
                <dt><a href="' . get_the_permalink($nextpost->ID) . '">' . get_the_date($nextpost->date) . ' </a></dt>
                <dd><a href="' . get_the_permalink($nextpost->ID) . '">' . get_the_title($nextpost->ID) . '</a></dd>
                </dl>
          </div>';
  } else {
    echo '<div><a href="' . network_site_url('/') . '"><i class="fas fa-home"></i></a></div>';
  }
    ?>


  </div>


</section>
</div>
<?php get_footer(); ?>