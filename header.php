<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title><?php echo wp_get_document_title();?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="apple-touch-icon" href="icon.png" />
  <!-- favicon.icoはルートディレクトリに配置 -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="wrap">
    <header class="header">
      <nav class="header_container">

        <?php
        wp_nav_menu(array(
          'theme_location'  => 'gNav',
          'container'       => 'ul',
          'menu_class'      => 'header_items',
        ));
        ?>
        <a class="drawer_trigger">
          <span class="drawer_trigger_span"></span>
          <span class="drawer_trigger_span"></span>
          <span class="drawer_trigger_span"></span>
        </a>
        <div class="modal_nav">
          <?php
          wp_nav_menu(array(
            'theme_location'  => 'drawer',
            'container'       => 'ul',
            'menu_class'      => 'modal_nav_items',
          ));
          ?>
        </div>
      </nav>

      <?php if (is_front_page()) {
        return;
      } else if (is_page_template('story.php')) {
        $story_child = ' <div class="header_child_story">
          <div class="container">
            <div class="header_child_contents">
              <img class="header_child_img"
                src="' . get_template_directory_uri() . '/img/heroTtl@2x.png">
              <img class="header_child_img"
                src="' . get_template_directory_uri() . '/img/holeText@2x.png">
            </div>
            <div class="header_child_btn">
              <a class="btn"
                href="' . the_field('reserve_btn', 7) . '">チケット予約サイトへ</a>
            </div>
          </div>
        </div>';
        echo ($story_child);
      } else {
        $header_child = '<div class="header_child">
          <div class="container">
            <div class="header_child_contents">
              <img class="header_child_img"
                src="' . get_template_directory_uri() . '/img/heroTtl@2x.png">
              <img class="header_child_img"
                src="' . get_template_directory_uri() . '/img/holeText@2x.png">
            </div>
            <div class="header_child_btn">
              <a class="btn"
                href="' . esc_url(home_url('/')) . '">チケット予約サイトへ</a>
            </div>
          </div>
        </div>';
        echo ($header_child);
      }
      ?>
    </header>

    <?php if (is_front_page()) {
      return;
    } else if (is_page_template('story.php')) {
      echo '<section class="story_mv">';
      if (function_exists('bcn_display')) {
        echo '<div class="container">';
        echo '<div class="brandcrumb">';
        bcn_display();
        echo '</div>';
      }
      echo '<h1 class="section_ttl">STORY</h1>';
      echo '<div class="story_mv_text">';
      $ttl = get_field('ttl');
      echo '<h2>' . "$ttl" . '</h2>';
      $Introduction_01 = get_field('Introduction_01');
      echo '<p>' . "$Introduction_01" . '</p>';
      echo '</div>';
      echo '</section>';
    } else {
      if (function_exists('bcn_display')) {
        echo '<div class="container">';
        echo '<div class="brandcrumb">';
        bcn_display();
        echo '</div>';
      }
    }
    ?>