<article class="works_wrapper__each">
  <a href="<?php echo esc_url( get_permalink() ) ?>">
    <p class="works_wrapper__thumbnail">
      <?php the_post_thumbnail(); ?>
    </p>
    <div class="works_wrapper__body">
      <p class="works_wrapper__category">
        <?php
        $cat = get_the_category();
        $cat = $cat[0];
        echo get_cat_name($cat->term_id);
        ?>
      </p>
      <h3 class="works_wrapper__name">
        <?php the_title(); ?>
      </h3>
    </div>
  </a>
</article>
