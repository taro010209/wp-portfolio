<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="大越健太郎（オオゴエケンタロウ）のポートフォリオサイトです。">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&text=abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789/.,()©&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header id="header" class="header">
    <nav class="headeer__container">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>#works" class="header__link">works</a>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>#about" class="header__link">about</a>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>#skill" class="header__link">skill</a>
    </nav>
  </header>
