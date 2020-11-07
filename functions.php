<?php
function my_enqueue_scripts()
{

  wp_enqueue_style('font_awasome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css', array());
  wp_enqueue_style('my_styles', get_template_directory_uri() . '/css/style.css', array());
  wp_enqueue_script('jquery');
  wp_enqueue_script('script_js', get_template_directory_uri() . '/js/script.js', array());
}

add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

//head内にRSSフィードリンクを出力
add_theme_support('automatic_feed_links');

//タイトルを動的に出力
add_theme_support('title-tag');

//ブロックエディター用のCSSを有効化
add_theme_support('wp-block-styles');

//埋め込みコンテンツをレスポンシブ対応にする
add_theme_support('responsive-embeds');

//アクション画像を有効化
add_theme_support('post-thumbnails');
// set_post_thumbnail_size(231, 127, false);
add_theme_support('menu');

//カスタムメニューの有効化、メニューの位置を設定
register_nav_menus(
  array(
    'gNav' => 'グローバルナビゲーション',
    'drawer' => 'ドロワーナビゲーション',
    'fNav' => 'フッターナビゲーション'
  )
);

// メイン画像上にテンプレートごとの文字列を表示
function get_main_title()
{
  if (is_singular('post')) :
    $category_obj = get_the_category();
    return $category_obj[0]->name;
  elseif (is_page() || is_front_page()) :
    return get_the_title();
  elseif (is_category()) :
    return single_cat_title();
  else :
    return '投稿記事一覧';
  endif;
}

//各テンプレートごとに表示する画像を変更
function get_main_image()
{
  //フロントページの場合、記事情報と'detail'サイズを返す。
  if (is_front_page()) :
    if (has_post_thumbnail()) :
      return get_thumb_img('large');
    else :
      return '<img class="main_img" src=' . get_template_directory_uri() . '/img/header_404.jpg>';
    endif;
  // return get_the_post_thumbnail($post->ID, 'full');
  //ニュースカテゴリーの場合、bg-page-news.jpgを返す。
  elseif (is_category('news') || is_singular('post')) :
    if (has_post_thumbnail()) :
      return get_thumb_img('large');
    else :
      return '<img class="main_img" src=' . get_template_directory_uri() . '/img/header_404.jpg>';
    endif;
  elseif (is_page_template('contact.php')) :
    if (has_post_thumbnail()) :
      return get_thumb_img('large');
    else :
      return '<img class="main_img" src=' . get_template_directory_uri() . '/img/header_404.jpg>';
    endif;
  else :
    //該当ページがない場合、bg-page-dummy.jpgを返す。
    return '<img src=' . get_template_directory_uri() . '/img/header_image.jpg>';
  endif;
}

//抜粋文の文字数を指定する
function custom_excerpt_length($length)
{
  return 80;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

//抜粋文の末尾に'...'を追加する
function new_excerpt_more($more)
{
  return ' ... ';
}
add_filter('excerpt_more', 'new_excerpt_more');

// 子ページを取得する関数
function get_child_pages($number = -1,  $specified_id = null)
{
  if (isset($specified_id)) :
    $parent_id = $specified_id;
  else :
    $parent_id = get_the_ID();
  endif;
  $args = array(
    'post_per_page' => -1,
    'post_type' => 'page',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_parent' => $parent_id,
  );
  $child_pages = new WP_Query($args);
  return $child_pages;
}

//pre_get_posts関数
function my_posts_control($query)
{
  if (is_admin() || !$query->is_main_query()) {
    return;
  }
  if ($query->is_post_type_archive('movies')) {
    $query->set('posts_per_page', '-1');
    return;
  }
}
add_action('pre_get_posts', 'my_posts_control');


//img属性の不要なタグを削除
function get_thumb_img($size = 'full')
{
  $thumb_id = get_post_thumbnail_id(); // アイキャッチ画像のIDを取得
  $thumb_img = wp_get_attachment_image_src($thumb_id, $size);
  // $sizeサイズの画像内容を取得
  $thumb_src = $thumb_img[0]; // 画像のurlだけ取得
  $thumb_alt = get_the_title(); //alt属性に入れるもの（記事のタイトルにしています）

  return '<img src="' . $thumb_src . '" alt="' . $thumb_alt . '">';
}

//サブタイトル付与
function description_add_nav_menu($item_output, $item)
{
  return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<br><span>{$item->description}</span><", $item_output);
}
add_filter('walker_nav_menu_start_el', 'description_add_nav_menu', 10, 4);

//サイドバーを付与
function my_widget_init()
{
  register_sidebar(
    array(
      'name' => 'サイドバー', //表示するエリア名
      'id' => 'sidebar', //id
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<div class="widget-title">',
      'after_title' => '</div>',
    )
  );
}
add_action('widgets_init', 'my_widget_init');

//メニューの<li>からID除去
function removeMenuId($id)
{
  return $id = array();
}
add_filter('nav_menu_item_id', 'removeMenuId', 10);

//メニューの<li>からクラス除去
function removeMenuClass($classes)
{
  return $classes = array();
}
add_filter('nav_menu_css_class', 'removeMenuClass', 10, 2);


//breadcrumbの特定のカテゴリーを非表示

add_action('bcn_after_fill', function ($breadcrumb) {
  if (count($breadcrumb->trail) > 0) {
    for ($i = 0; $i < count($breadcrumb->trail); $i++) {
      if ('Uncategorized' == $breadcrumb->trail[$i]->get_title()) {
        $breadcrumb->trail[$i]->set_template('');
      }
    }
  }
  return $breadcrumb;
});
remove_filter('the_excerpt', 'wpautop');

//固定ページで"抜粋文"を操作できるようにする
add_post_type_support('page', 'excerpt');

function mycustom_wp_footer()
{
?>
  <script>
    document.addEventListener('wpcf7mailsent', function(event) {
      location.replace('<?php echo home_url() . '/confirm'; ?>');
    }, false);
  </script>
<?php
}
add_action('wp_footer', 'mycustom_wp_footer');
