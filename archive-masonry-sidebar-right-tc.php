<?php

/**
 * Archive Template: Masonry with sidebar right using the_content()
 * 
 * (C) Karsten Reincke, 2023: as the originals licensed under MIT
 * SPDX-License-Identifier: MIT
 * 
 * There is a sidebar on the right size and up to three columns with post
 * in accordance with bs sizes Posts are presented in form of overlapping tiles
 * 
 * The template uses the_content() (instead of the_excerpt(), as the other 
 * bs-templates do ). the_content() expects a more-Tag explicitly set in
 * the post. Thus, the more-links (as they are used used in archive-masonry or 
 * archive-masonry-sidebar-right) are erased from this template.
 * 
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>
<div id="content" class="site-content container py-5 mt-5">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>

    <main id="main" class="site-main">

      <header class="page-header mb-4">
        <h1><?php the_archive_title(); ?></h1>
        <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
      </header>
      <div class="row">
        <?php get_sidebar(); ?>
        
        <div class="col order-first">
          <div class="row" data-masonry='{"percentPosition": true }'>
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>

                <!--
                  <= xs < sm: 1 column + sidebar offcanvas
                  sm <= x < md: 2 columns + sidebar offcanvas
                  md <= x < lg: 2 columns + sidebar right 
                  lg <= x < xl: 2 columns + sidebar right 
                  xl <= x ... : 3 columns + sidebar right
                  tested with chromium Boostrap resize tool and web developer tools
                 -->
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-4">

                  <div class="card">

                    <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>

                    <div class="card-body">

                      <?php bootscore_category_badge(); ?>

                      <h2 class="blog-post-title">
                        <a href="<?php the_permalink(); ?>">
                          <?php the_title(); ?>
                        </a>
                      </h2>

                      <?php if ('post' === get_post_type()) : ?>

                        <small class="text-muted mb-2">
                          <?php
                          bootscore_date();
                          bootscore_author();
                          bootscore_comments();
                          bootscore_edit();
                          ?>
                        </small>

                      <?php endif; ?>

                      <div class="card-text">
                        <?php the_content(); ?>
                      </div>

                      <?php bootscore_tags(); ?>

                    </div><!-- card-body -->

                  </div><!-- card -->

                </div><!-- col -->

              <?php endwhile; ?>
            <?php endif; ?>

          </div><!-- row -->
        </div><!-- col -->
      </div><!-- roq -->
      <!-- Pagination -->
      <div>
        <?php bootscore_pagination(); ?>
      </div>

    </main><!-- #main -->

  </div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
