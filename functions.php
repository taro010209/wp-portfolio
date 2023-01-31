<?php
if ( ! defined( '_S_VERSION' ) ) {
  // リリースごとにテーマのバージョン番号を置き換えます。
  define( '_S_VERSION', '1.0.0' );
}

/**
  * テーマのデフォルトを設定し、さまざまな WordPress 機能のサポートを登録します。
  *
  * この関数は after_setup_theme フックにフックされていることに注意してください。
  * init フックの前に実行されます。 init フックは、一部の機能には遅すぎます。
  * 投稿のサムネイルのサポートを示すように。
*/
function portfolio_setup() {

  /*
    * WordPress にドキュメントのタイトルを管理させます。
    * テーマのサポートを追加することにより、このテーマは使用しないことを宣言します
    * ドキュメント ヘッドに <title> タグをハードコードし、WordPress が
    * 提供してください。
  */
  add_theme_support( 'title-tag' );

  /*
    * 投稿とページでの投稿サムネイルのサポートを有効にします。
    *
    * @リンク https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
  */
  add_theme_support( 'post-thumbnails' );

  // このテーマは 1 つの場所で wp_nav_menu() を使用します。
  register_nav_menus(
    array(
      'menu-1' => esc_html__( 'Primary', 'portfolio' ),
    )
  );

  /*
    * 検索フォーム、コメント フォーム、およびコメントのデフォルトのコア マークアップを切り替えます
    * 有効な HTML5 を出力します。
  */
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
    )
  );

  // WordPress コアのカスタム背景機能をセットアップします。
  add_theme_support(
    'custom-background',
    apply_filters(
      'portfolio_custom_background_args',
      array(
        'default-color' => 'ffffff',
        'default-image' => '',
      )
    )
  );

  // ウィジェットの選択的更新のテーマ サポートを追加します。
  add_theme_support( 'customize-selective-refresh-widgets' );

  /**
    * コア カスタム ロゴのサポートを追加します。
    *
    * @リンク https://codex.wordpress.org/Theme_Logo
  */
  add_theme_support(
    'custom-logo',
    array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    )
  );
}
add_action( 'after_setup_theme', 'portfolio_setup' );

/**
  * テーマのデザインとスタイルシートに基づいて、コンテンツの幅をピクセル単位で設定します。
  *
  * 優先度 0 は、優先度の低いコールバックで使用できるようにします。
  *
  * @global int $content_width
*/
function portfolio_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'portfolio_content_width', 0 );

/**
  *ウィジェットエリアを登録します。
  *
  * @リンク https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function portfolio_widgets_init() {
  register_sidebar(
    array(
      'name'          => esc_html__( 'Sidebar', 'portfolio' ),
      'id'            => 'sidebar-1',
      'description'   => esc_html__( 'Add widgets here.', 'portfolio' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}
add_action( 'widgets_init', 'portfolio_widgets_init' );

// ---------------------------------------- 独自追加 ----------------------------------------
/* ---------- 不要な標準搭載CSSを排除 ---------- */
function mytheme_enqueue() {
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'classic-theme-styles' );
  wp_dequeue_style( 'global-styles' );
  wp_deregister_script( 'wp-emoji-release' );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue' );

function disable_emojis() {
  /* ---------- 不要な標準搭載JSを排除 ---------- */
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  /* ---------- 不要な謎のSVGを排除（ https://webtech.fukushimaku.jp/kiji/delete-wordpress-svg-tag.html ） ---------- */
  remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

  /* ---------- 不要な謎の記述を排除（ https://www.terakoya.work/wordpress-head-information-delete/ ） ---------- */
  remove_action( 'wp_head', 'wp_generator' );
  remove_action( 'wp_head', 'rsd_link' );
  remove_action( 'wp_head', 'wlwmanifest_link' );

  /* ---------- 詳細ページの不要な謎の記述を排除（ https://cocorograph.co/knowledge/how-to-delete-wordpress-unnecessary-tags/ ） ---------- */
  remove_action('wp_head', 'feed_links', 2 );
  remove_action('wp_head', 'feed_links_extra', 3 );
  remove_action('wp_head','wp_oembed_add_discovery_links' );
  remove_action('wp_head', 'wp_shortlink_wp_head' );
  remove_action('wp_head', 'rel_canonical' );
}
add_action( 'init', 'disable_emojis' );

/* ---------- 各ページのCSS ---------- */
function my_styles()  {
  if ( is_front_page() || is_home() ) {
    wp_enqueue_style( 'portfolio', get_template_directory_uri() . '/assets/css/style.css' );
  } else {
    wp_enqueue_style( 'portfolio', get_template_directory_uri() . '/assets/css/work.css' );
  }
}
add_action( 'wp_enqueue_scripts', 'my_styles' );

/* ---------- コメント非表示 ---------- */
add_filter( 'comments_open', '__return_false' );

/* ---------- メディア画像サイズ解放 ---------- */
add_filter( 'big_image_size_threshold', '__return_false' );

/* ---------- SVGアップロード許可 ---------- */
function SVG_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'SVG_mime_types');

/* ---------- アイキャッチ欄SVGサムネイル表示 ---------- */
function fix_svg_thumb_display() {
  echo '<style>
  td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail, #set-post-thumbnail img[src$=".svg"]{
  width: 100% !important;
  height: auto !important;
  }</style>';
}
add_action('admin_head', 'fix_svg_thumb_display');

/* ---------- カスタム投稿（スキル） ---------- */
function create_post_type() {
  register_post_type( // カスタム投稿タイプの追加関数
    'skill', //カスタム投稿タイプ名（半角英数字の小文字）
    array( //オプション（以下）
      'label'         => 'スキル', // 管理画面上の表示（日本語でもOK）
      'public'        => true,    // 管理画面に表示するかどうかの指定
      'has_archive'   => true,    // 投稿した記事の一覧ページを作成する
      'menu_position' => 5,       // 管理画面メニューの表示位置（投稿の下に追加）
      'show_in_rest'  => true,    // Gutenbergの有効化
      'supports'      => array(   // サポートする機能（以下）
        'title',     // タイトル
        'title',     // タイトル
        'editor',    // エディター
        'thumbnail', // アイキャッチ画像
        'revisions'  // リビジョンの保存
      ),
    )
  );
  register_taxonomy_for_object_type('post_tag', 'skill');
}
add_action( 'init', 'create_post_type' );
// ---------------------------------------- 独自追加 ----------------------------------------

// /**
//   * スクリプトとスタイルをキューに入れます。
// */
// function portfolio_scripts() {
//   wp_enqueue_style( 'portfolio-style', get_stylesheet_uri(), array(), _S_VERSION );
//   wp_style_add_data( 'portfolio-style', 'rtl', 'replace' );

//   wp_enqueue_script( 'portfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

//   if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
//     wp_enqueue_script( 'comment-reply' );
//   }
// }
// add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );

/**
* カスタム ヘッダー機能を実装します。
*/
require get_template_directory() . '/inc/custom-header.php';

/**
* このテーマのカスタム テンプレート タグ。
*/
require get_template_directory() . '/inc/template-tags.php';

/**
* WordPress にフックしてテーマを強化する関数。
*/
require get_template_directory() . '/inc/template-functions.php';

/**
* カスタマイザーの追加。
*/
require get_template_directory() . '/inc/customizer.php';

/**
* Jetpack 互換ファイルを読み込みます。
*/
if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/inc/jetpack.php';
}
