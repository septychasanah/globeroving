<div class="post-latest">
    <h5 class="title-sm">latest post</h5>
    <ul>
        <?php
            query_posts('posts_per_page=4');
            while (have_posts()) : the_post();
        ?>
        <li class="item">
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
        </li>
        <?php endwhile; wp_reset_query(); ?>
    </ul>
</div>

<div class="post-popular w-space">
    <h5 class="title-sm">popular post</h5>
    <ul>
    <?php
        $popular = new WP_Query(array(
            'posts_per_page'=>4,
            'meta_key'=>'popular_posts',
            'orderby'=>'meta_value_num',
            'order'=>'DESC'
        ));
        while ($popular->have_posts()) : $popular->the_post();
    ?>
        <li class="item">
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
        </li>
    <?php endwhile; wp_reset_postdata(); ?>   
    </ul> 
</div>