<?php get_header(); ?>

<section class="w-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 post post-detail">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="post-img">
                        <?php the_post_thumbnail(array(1280, 800), array('class' => 'img-fluid')); ?>
                    </div>
                    <div class="post-info text-center">
                        <div class="post-categories">
                            <a href="<?php get_category_link($category_id); ?>"><?php the_category(' &nbsp;|&nbsp; '); ?></a>
                        </div>
                        <div class="post-title">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <div class="post-date">
                            <?php the_time('M d, Y'); ?>
                        </div>
                    </div>
                    <div class="w-space">
                        <?php the_content(''); ?>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
                <!--<div class="ads text-center w-space">
                    <img src="https://globeroving.com/wp-content/uploads/2018/09/g-ads-01.jpg" class="img-fluid">
                </div>-->
                <div class="author">
                    <h4 class="text-center">thank you for reading</h4>
                    <div class="author-info">
                        <div class="author-img">
                            <?php echo get_avatar(get_the_author_meta('ID'), 125); ?>
                        </div>
                        <div class="author-bio">
                            <div class="author-name">
                                <?php the_author_link(); ?>
                            </div>
                            <?php if (get_the_author_meta('description') != null): ?> 
                                <p><?php the_author_meta('description'); ?> </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="post-related w-space">
                    <h5 class="title-sm">you may also like</h5>
                    <div class="row">
                        <?php
                            $args = array(
                                'posts_per_page' => 5,
                                'post__not_in'   => array( get_the_ID() ),
                                'no_found_rows'  => true,
                            );
                            
                            $cats = wp_get_post_terms(get_the_ID(), 'category');
                            $cats_ids = array();
                            foreach ($cats as $wpex_related_cat) {
                                $cats_ids[] = $wpex_related_cat->term_id;
                            }
                            if (! empty($cats_ids)) {
                                $args['category__in'] = $cats_ids;
                            }
                            
                            $wpex_query = new wp_query($args);
                            foreach ($wpex_query->posts as $post) : setup_postdata($post);
                        ?>
                            <div class="col-md-6 item">
                                <div class="post-img">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('square'); ?>
                                    </a>
                                </div>
                                <div class="post-info">
                                    <div class="post-categories">
                                        <a href="<?php get_category_link($category_id); ?>"><?php the_category(' &nbsp;|&nbsp; '); ?></a>
                                    </div>
                                    <div class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </div>
                                    <div class="post-date">
                                        <?php the_time('M d, Y'); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="comment w-space">
                    <?php comments_template(); ?>
                </div>
            </div>
            <div class="col-lg-3 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>