<article class="works_wrapper__each">
  <a href="<?php echo esc_url( get_permalink() ) ?>">
    <p class="works_wrapper__thumbnail">
      <?php the_post_thumbnail(); ?>
    </p>
    <div class="works_wrapper__body">
      <h3 class="works_wrapper__name">
        <?php the_title(); ?>
      </h3>
      <ul class="works_wrapper__category">
        <li class="works_wrapper__category_each">
          <?php
          $cat = get_the_category();
          $cat = $cat[0];
          echo get_cat_name($cat->term_id);
          ?>
        </li>
      </ul>
    </div>
  </a>
</article>
