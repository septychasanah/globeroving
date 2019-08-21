<?php get_header(); ?>

<section class="w-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 search-page">
                <?php
                    $results_count = $wp_query->found_posts;
                ?>

                <div class="search-info">
                    <p>Search Result For <span class="keyword">&ldquo;<?php the_search_query(); ?>&rdquo;</span></p>
                    <?php if ($results_count == '' || $results_count == 0) { // No Results?>
                        <span class="label label-danger"><?php _e('No Results'); ?>&nbsp; <?php _e('Try different search terms.'); ?></span>
                    <?php
                } else {
                    ?>
                        <span class="label label-success"><?php echo $results_count . __(' Results'); ?></span>
                    <?php
                } ?>                    
                </div>

                <?php $search_terms = htmlspecialchars($_GET["s"]); ?>
                <form role="form" action="<?php bloginfo('siteurl'); ?>/" id="searchform" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" id="s" name="s" placeholder="Search"<?php if ($search_terms !== '') {
                    echo ' value="' . $search_terms . '"';
                } ?> />
                        <span class="input-group-btn">
                            <button class="submit btn btn-primary" type="submit">Search</i></button>
                        </span>
                    </div>
                </form>

                <div class="post search-result w-space">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
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
                    <p class="message">
                        <?php _e('Sorry. We couldn&rsquo;t find anything for that search. View one of our site&rsquo;s pages or posts.'); ?>
                    </p>
                <?php endif; ?>
                </div>                
            </div>
            <div class="col-lg-3 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>