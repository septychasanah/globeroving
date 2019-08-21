<?php get_header(); ?>

<section class="page-404 w-space">
    <div class="container text-center">
        <p> The page you're trying to reach doesn't exist </p>
        <h1>404</h1>
        <p> It seems we can't find what you are looking for </p>
        <a href="javascript:javascript:history.go(-1)" class="btn btn-primary"> Go Back </a>
        <a href="<?php echo site_url(); ?>" class="go-home btn btn-primary"> Go To The Homepage </a>
    </div>
</section>

<?php get_footer(); ?>