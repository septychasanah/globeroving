<?php get_header(); ?>

<section class="w-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 post">
                <?php if (have_posts()) : while (have_posts()) :   the_post(); ?>
                    <div class="row item">
                        <div class="col-md-5 post-img">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail(array(1280, 800), array('class' => 'img-fluid')); ?>
                            </a>
                        </div>
                        <div class="col-md-7 post-info">
                            <div class="post-categories">
                                <a href="<?php get_category_link($category_id); ?>"><?php the_category(' &nbsp;|&nbsp; '); ?></a>
                            </div>
                            <div class="post-title">
                                <a href="<?php the_permalink(); ?>">
                                    <h4><?php the_title(); ?></h4>                                
                                </a>
                            </div>
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="post-date">
                                <?php the_time('M d, Y'); ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <div class="pagination w-space">
                        <div class="nav-next"><?php previous_posts_link('<i class="fa fa-angle-left"></i> &nbsp;Newer posts'); ?></div>
                        <div class="nav-previous"><?php next_posts_link('Older posts &nbsp;<i class="fa fa-angle-right"></i>'); ?></div>
                    </div>                    
                <?php else : ?>
                    <p>There are no posts to show</p>
                <?php endif; ?>
            </div>
            <div class="col-lg-3 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>