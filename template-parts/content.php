<article id="post-<?php the_ID(); ?>" class="work">
  <div class="work__container">
    <?php
    if ( is_singular() ) {
      the_title( '<h1 class="work__heading">', '</h1>' );
    } else {
      the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    }

    the_content(
      sprintf(
        wp_kses(
          /* 翻訳者: %s: 現在の投稿の名前。 スクリーン リーダーのみに表示されます */
          __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'portfolio' ),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        wp_kses_post( get_the_title() )
      )
    );

    wp_link_pages(
      array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'portfolio' ),
        'after'  => '</div>',
      )
    );
    ?>
  </div>
</article>
