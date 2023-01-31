<div class="skill_wrapper__eaach">
  <dt class="skill_wrapper__item">
    <p class="skill_wrapper__img">
      <?php the_post_thumbnail(); ?>
    </p>
    <p class="skill_wrapper__name">
      <?php the_title(); ?>
    </p>
  </dt>
  <dd class="skill_wrapper__experience">
    <?php
    $posttags = get_the_tags();
    if ( $posttags ) {
      foreach ( $posttags as $tag ) {
        echo $tag->name . ' ';
      }
    }
    ?>
  </dd>
  <dd class="skill_wrapper__lead">
    <?php the_content(); ?>
  </dd>
</div>