<?php get_header(); ?>

<section class="background">
    <?php
        $homebg = get_theme_mod('home_bg_setting');
    if ($homebg == '0') {
        echo "";
    } else {
        $secone = new WP_Query('page_id='.$homebg.'');
        while ($secone->have_posts()) : $secone->the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile;
        wp_reset_postdata(); ?>
    <?php
    } ?>
</section>

<section class="post-cat w-space">
    <div class="container">
        <div class="row">
            <?php
                $postcat = get_theme_mod('home_postcat_setting');
                if ($postcat == '0') {
                    echo "";
                } else {
                    $secone = new WP_Query('page_id='.$postcat.'');
                    while ($secone->have_posts()) : $secone->the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile;
                    wp_reset_postdata(); ?>
            <?php
                } ?>
        </div>
    </div>
</section>

<section class="post post-latest w-space">
    <div class="container">
        <h2 class="title">Latest Post</h2>
        <div class="row">
            <?php
                query_posts('posts_per_page=3');
                while (have_posts()) : the_post();
            ?>
            <div class="col-md-4 item">
                <div class="post-img">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(array(1280, 800), array('class' => 'img-fluid')); ?>
                    </a>
                </div>
                <div class="post-info">
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
            <?php endwhile; wp_reset_query(); ?>        
        </div>
    </div>
</section>

<section class="post post-popular w-space">
    <div class="container">
        <h2 class="title">Popular Post</h2>
        <div class="row">
            <?php
                $popular = new WP_Query(array(
                    'posts_per_page'=>3,
                    'meta_key'=>'popular_posts',
                    'orderby'=>'meta_value_num',
                    'order'=>'DESC'
                ));
                while ($popular->have_posts()) : $popular->the_post();
            ?>
            <div class="col-md-4 item">
                <div class="post-img">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(array(1280, 800), array('class' => 'img-fluid')); ?>
                    </a>
                </div>
                <div class="post-info">
                    <div class="post-categories">
                        <a href="<?php get_category_link($category_id); ?>"><?php the_category(' &nbsp;|&nbsp; '); ?></a>
                    </div>
                    <div class="post-title">
                        <a href="<?php the_permalink(); ?>">
                            <h4><?php the_title(); ?></h4>                                
                        </a>
                    </div>
                    <div class="post-date">
                        <?php the_time('M d, Y'); ?>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
</section>

<div class="w-space text-center">
    <a href="https://globeroving.com/blog/" role="button" class="btn btn-primary btn-lg">More In The Blog</a>
</div>

<?php get_footer(); ?>