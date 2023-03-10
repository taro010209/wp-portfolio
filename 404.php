<?php
get_header();
?>

<div style="width: 100%;height: 72px;"></div>
<main id="main" class="main" style="margin: 0 0 100px;text-align: center;font-family: var(--font-family-en), var(--font-family-ja), sans-serif;">
  <style>
    body {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .footer {
      margin-top: 0;
    }
  </style>
  <h1 style="font-size: 160px;color: var(--color-blue);">404</h1>
  <p style="margin-top: -20px;">ページが見つかりませんでした</p>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="width: fit-content;margin: 20px auto 0;padding: 10px 30px;border-radius: var(--border-radius);background-color: var(--color-blue);color: var(--color-white);">トップへ戻る</a>
</main>

<?php
get_footer();
