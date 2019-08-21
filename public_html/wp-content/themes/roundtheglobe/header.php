<!DOCTYPE html>
<html>

    <head>       
        <title><?php wp_title();?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel='profile' href='http://gmpg.org/xfn/11'>
        <link rel='pingback' href='<?php bloginfo('pingback_url'); ?>'>
        <?php wp_head(); ?>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-light navbar-expand-lg">
                <div class="container-fluid">
                    <div class="navbar-brand">
                        <ul>
                            <li class="logo">
                                <a href="<?php echo site_url(); ?>"><img src="https://globeroving.com/wp-content/uploads/2018/09/logo-90.png" class="img-fluid"></a>
                            </li>
                            <li class="sitename d-none d-lg-block">
                                <a href="<?php echo site_url(); ?>">Globe Roving</a>
                            </li>
                            <li class="mobile-search d-block d-lg-none">
                                <?php $search_terms = htmlspecialchars($_GET["s"]); ?>
                                <form role="form" action="<?php bloginfo('siteurl'); ?>/" id="mobilesearch" method="get">
                                    <input type="text" class="form-control" id="s" name="s" placeholder="Search"
                                        <?php if ($search_terms !== '') {
    echo ' value="' . $search_terms . '"';
} ?> />
                                </form>
                            </li>
                        </ul>
                    </div>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#sitenavbar"
                        aria-controls="sitenavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                    <?php
                        wp_nav_menu([
                            'menu'            => 'top',
                            'theme_location'  => 'top',
                            'container'       => 'div',
                            'container_id'    => 'sitenavbar',
                            'container_class' => 'collapse navbar-collapse',
                            'menu_id'         => false,
                            'menu_class'      => 'navbar-nav ml-auto',
                            'depth'           => 5,
                            'fallback_cb'     => 'bs4navwalker::fallback',
                            'walker'          => new bs4navwalker()
                        ]);
                    ?>
                    <div class="search d-none d-lg-block">
                        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#searchcollapse">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </nav>
            <div class="collapse" id="searchcollapse">
                <div class="card card-body">
                    <?php $search_terms = htmlspecialchars($_GET["s"]); ?>
                    <form role="form" action="<?php bloginfo('siteurl'); ?>/" id="searchtop" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" id="s" name="s" placeholder="Search"<?php if ($search_terms !== '') {
                        echo ' value="' . $search_terms . '"';
                    } ?> />
                            <span class="input-group-btn">
                                <button class="submit btn btn-primary" type="submit">Search</i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </header>