<?php get_header(); ?>

<section class="post w-space">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <div class="post-img">
                <?php the_post_thumbnail(array(1280, 800), array('class' => 'img-fluid')); ?>
            </div>
            <div class="post-info text-center">                
                <div class="post-title">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="w-space">
                <?php the_content(''); ?>
            </div>
        <?php endwhile; wp_reset_query(); ?>
    </div>
</section>

<?php get_footer(); ?>