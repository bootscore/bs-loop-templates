<?php

/**
 * Author Template: Sidebar Left
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 * @version 6.0.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

<div id="content" class="site-content container pt-4 pb-5">
  <div id="primary" class="content-area">

    <div class="row">
      
      <?php get_sidebar(); ?>
      
      <div class="<?= apply_filters('bootscore/main/col_class', 'col') ?> order-first order-md-last">

        <main id="main" class="site-main">

          <div class="page-header mb-4 d-flex">
            <div class="flex-shrink-0 me-3">
              <?= get_avatar(get_the_author_meta('email'), '80', $default = '', $alt = '', array('class' => array('img-thumbnail rounded-circle'))); ?>
            </div>
            <div class="author-bio">
              <h1><?php the_author(); ?></h1>
              <?php the_author_meta('description'); ?>
            </div>
          </div>

          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              
              <div class="card horizontal mb-4">
                <div class="row g-0">

                  <?php if ( has_post_thumbnail() ) : ?>
                    <div class="col-lg-6 col-xl-5 col-xxl-4">
                      <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', array('class' => 'card-img-lg-start')); ?>
                      </a>
                    </div>
                  <?php endif; ?>
                  
                  <div class="col">
                    <div class="card-body">

                      <?php bootscore_category_badge(); ?>

                      <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
                        <?php the_title('<h2 class="blog-post-title h5">', '</h2>'); ?>
                      </a>

                      <?php if ('post' === get_post_type()) : ?>
                        <p class="meta small mb-2 text-body-secondary">
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
                          <?= strip_tags(get_the_excerpt()); ?>
                        </a>
                      </p>
                      
                      <p class="card-text">
                        <a class="read-more" href="<?php the_permalink(); ?>">
                          <?php _e('Read more »', 'bootscore'); ?>
                        </a>
                      </p>

                      <?php bootscore_tags(); ?>

                    </div>
                  </div>
                </div>
              </div>
          
            <?php endwhile; ?>
          <?php endif; ?>

          <div class="entry-footer">
            <?php bootscore_pagination(); ?>
          </div>

        </main>

      </div>
    </div>

  </div>
</div>
<?php
get_footer();
