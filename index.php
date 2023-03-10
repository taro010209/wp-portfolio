<?php get_header(); ?>

  <main id="main" class="main">
    <section class="works">
      <div class="works__container">
        <h2 id="works" class="works__heading section_heading">
          <span class="section_heading__en">works</span>
          <span class="section_heading__ja">制作物</span>
        </h2>
        <div class="works_wrapper">
          <?php
          if ( have_posts() ) {
            while ( have_posts() ) {
              the_post();
              get_template_part( 'template-parts/content', 'works' );
            }
            the_posts_navigation();
          } else {
            get_template_part( 'template-parts/content', 'none' );
          }
          ?>
        </div>
      </div>
    </section>

    <section class="about">
      <div class="about__container">
        <h2 id="about" class="about__heading section_heading">
          <span class="section_heading__en">about</span>
          <span class="section_heading__ja">私について</span>
        </h2>
        <div class="profile_wrapper">
          <div class="profile_wrapper__visual">
            <p class="profile_wrapper__img">
              <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/top/about.webp' ); ?>" alt="オオゴエ ケンタロウ" width="400" height="400" loading="lazy" decoding="async">
            </p>
            <ruby class="profile_wrapper__name">
              <rb>大越</rb>
              <rt class="profile_wrapper__name--rudy">オオゴエ</rt>
              <rb>健太郎</rb>
              <rt class="profile_wrapper__name--rudy">ケンタロウ</rt>
            </ruby>
          </div>
          <p class="profile_wrapper__lead">
            埼玉県出身、2001年生まれ。<br>
            専門学校でウェブ制作を学んだのち、ECサイトの制作や運用代行を行う会社にコーダーとして就職しました。<br><br>
            黙々とパソコンに向かって作業することが好きです。<br>
            スニペットや環境を改善したり、新しいJavaScriptのフレームワークやCSSのプロパティを試すのがコーディングの楽しみの一つで、日々工数削減を心がけています。
          </p>
        </div>
      </div>
    </section>

    <section class="skill">
      <div class="skill__container">
        <h2 id="skill" class="skill__heading section_heading">
          <span class="section_heading__en">skill</span>
          <span class="section_heading__ja">できること</span>
        </h2>
        <p class="skill__lead">
          前職では1年半程度、サイトの制作や改修のほか、進行管理などに携わりました。<br>
          HTML,CSS,JavaScriptを用いたサイト制作、スケジュールや品質の管理が可能です。
        </p>
        <dl class="skill_wrapper">
          <?php
          global $post;
          $args = array(
            'post_type'      => 'skill',
            'order'          => 'DESC',
            'posts_per_page' => 10,
          );
          $myposts = get_posts( $args );
          foreach ( $myposts as $post ) {
            setup_postdata( $post );
          ?>
          <div class="skill_wrapper__eaach">
            <dt class="skill_wrapper__item">
              <p class="skill_wrapper__img"><?php echo the_post_thumbnail(); ?></p>
              <p class="skill_wrapper__name"><?php the_title(); ?></p>
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
            <dd class="skill_wrapper__lead"><?php the_content(); ?></dd>
          </div>
          <?php
          }
          wp_reset_postdata();
          ?>
        </dl>
      </div>
    </section>
  </main>

  <script>
    (() => {
      const headerNavAnker = document.querySelectorAll('#header a[href^="<?php echo esc_url( home_url( '/' ) ); ?>#"]');
      headerNavAnker.forEach((element) => {
        element.addEventListener('click', (e) => {
          e.preventDefault();
          let destinationTargetHref = element.getAttribute('href');
          let destinationTargetName = destinationTargetHref.indexOf('#') + 1;
          let destinationTarget = document.getElementById(destinationTargetHref.substring(destinationTargetName));
          const rect = destinationTarget.getBoundingClientRect().top;
          const offset = window.pageYOffset;
          const destinationPoint = rect + offset - 80;
          window.scrollTo({
            top: destinationPoint,
            behavior: 'smooth',
          });
        });
      });
    })();
  </script>

<?php get_footer(); ?>