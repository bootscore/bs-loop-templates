<?php

/**
 * Author Template: Masonry
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>
<div id="content" class="site-content container py-5 mt-5">
  <div id="primary" class="content-area">

    <?php bs_after_primary(); ?>

    <main id="main" class="site-main">

      <header class="page-header mb-4 d-flex">
        <div class="flex-shrink-0 me-3">
          <?php echo get_avatar(get_the_author_meta('email'), '80', $default = '', $alt = '', array('class' => array('img-thumbnail rounded-circle'))); ?>
        </div>
        <div class="author-bio">
          <h1><?php the_author(); ?></h1>
          <?php the_author_meta('description'); ?>
        </div>
      </header>

      <div class="row" data-masonry='{"percentPosition": true }'>
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>

            <div class="col-md-6 col-lg-4 col-xxl-3 mb-4">

              <div class="card">

                <?php if ( has_post_thumbnail() ) : ?>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                  </a>
                <?php endif; ?>

                <div class="card-body d-flex flex-column">

                  <?php bootscore_category_badge(); ?>

                  <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
                    <?php the_title('<h2 class="blog-post-title h5">', '</h2>'); ?>
                  </a>

                  <?php if ('post' === get_post_type()) : ?>
                    <p class="meta small mb-2 text-muted">
                      <?php
                        bootscore_date();
                        bootscore_author();
                        bootscore_comments();
                        bootscore_edit();
                      ?>
                    </p>
                  <?php endif; ?>

                  <p class="card-text">
                    <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
                      <?php echo strip_tags(get_the_excerpt()); ?>
                    </a>
                  </p>

                  <p class="card-text mt-auto">
                    <a class="read-more" href="<?php the_permalink(); ?>">
                      <?php _e('Read more »', 'bootscore'); ?>
                    </a>
                  </p>

                  <?php bootscore_tags(); ?>

                </div>

              </div>

            </div>

          <?php endwhile; ?>
        <?php endif; ?>

      </div>

      <div>
        <?php bootscore_pagination(); ?>
      </div>

    </main>

  </div>
</div>
<?php
get_footer();
