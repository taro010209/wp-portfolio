<?php
get_header();
?>

<main id="primary" class="main">
  <?php
  while ( have_posts() ) {
    the_post();
    get_template_part( 'template-parts/content', get_post_type() );

    // コメントが開いているか、少なくとも 1 つのコメントがある場合は、コメント テンプレートを読み込みます。
    if ( comments_open() || get_comments_number() ) {
      comments_template();
    }
  } // End of the loop.
  ?>
</main>

<?php
get_footer();
