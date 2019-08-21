<?php

// Register Scripts
function register_scripts()
{
	// stylesheet
	wp_enqueue_style('bootstrap-min-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/bootstrap/css/all.css');
	wp_enqueue_style('fonts', "//fonts.googleapis.com/css?family=Didact+Gothic|Niramit|PT+Serif|Rancho", '', '1.0.0', 'screen' );
    wp_enqueue_style('style', get_stylesheet_uri());
	
	// javascript
    wp_enqueue_script('bootstrap-min-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script('fontawesome-js', get_template_directory_uri() . '/bootstrap/js/all.js', array('jquery'));
    wp_enqueue_script('scripts', get_template_directory_uri() . '/bootstrap/js/script.js', array('jquery'));

    /* comments */
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'register_scripts');



// Register Bootstrap 4 Navigation Walker
require_once('bs4navwalker.php');



// Register Menu to Theme
register_nav_menu('top', 'Top menu');



// Add Class to Menu in Filter
function wpgood_nav_search($items, $args)
{
    // If this isn't the primary menu, do nothing
    if (!($args->theme_location == 'top')) {
        return $items;
    }
    // Otherwise, add search form
    return $items . '<li>' . get_search_form(false) . '</li>';
}
add_filter('wp_nav_menu_items', 'wpgood_nav_search', 10, 2);

function wpdocs_my_search_form($form)
{
    $form = '<form role="search" method="get" id="searchform" class="searchform nav-search" action="' . home_url('/') . '" >
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
        aria-describedby="searchicon" value="' . get_search_query() . '" name="s" id="s">
            <div class="input-group-append">
                <span class="input-group-text" id="searchicon"><i class="fa fa-search"></i></span>
            </div>
        </div>
    </form>';
 
    return $form;
}
add_filter('get_search_form', 'wpdocs_my_search_form');



// Add Feature Image
add_theme_support('post-thumbnails');


// Add Image Size
add_image_size( 'square', 90, 90, true ); 



// Excerpt More Content & Length
function new_excerpt_more($more)
{
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

function excerpt_length($length)
{
    return 40;
}
add_filter('excerpt_length', 'excerpt_length', 999);


// Popular Post
function popular_posts($post_id)
{
    $count_key = 'popular_posts';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}
function track_posts($post_id)
{
    if (!is_single()) {
        return;
    }
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    popular_posts($post_id);
}
add_action('wp_head', 'track_posts');


// Comments Form Default Field
function theme_comment_list($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment; ?>

	<li <?php comment_class('media'); ?> id="comment-<?php comment_ID(); ?>">
		<div class="row item">
			<div class="comment-avatar">
				<?php echo get_avatar($comment, 60); ?>
			</div>
			<div class="comment-info">
				<div class="comment-name">
                    <?php comment_author_link(); ?>
                </div>
                <div class="comment-date">
                    <?php comment_date('M d, Y  |  g:i A') ?>
                </div>
            </div>
			<?php if ($comment->comment_approved == '0') { // Awaiting Moderation?>
			    <em><?php _e('Your comment is awaiting moderation.') ?></em>
			<?php
    } ?>
			<?php comment_text(); ?>
			<div class="comment-reply">
                <?php comment_reply_link(array_merge($args, array(
                    'reply_text' => __('Reply'),
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'] ))); ?>
			</div>
		</div>
<?php
}


// Front Page Shortcode

// Background Shortcode
function background($atts)
{
    extract(shortcode_atts(array(
        'image' => 'image',
        'h2' => 'h2',
        'text' => 'text'
    ), $atts));
    
    
    return '     
        <div class="bg-image">
            <img src="'.$image.'">
        </div>
        <div class="bg-content">
            <div class="container">				
                <div class="col-12 col-md-6 float-right">
                    <h2>'.$h2.'</h2>
                    <p>'.$text.'</p>
                </div>
            </div>
        </div>      
    ';
}
add_shortcode('background', 'background');

// Post Categories Shortcode
function postcat($atts)
{
    extract(shortcode_atts(array(
        'image' => 'image',
        'url' => 'url',
        'btntext' => 'btntext'
    ), $atts));
    
    
    return '
        <div class="col-sm-4 item">
            <img src="'.$image.'" class="img-fluid">
            <div class="mask">                    
                <a href="'.$url.'" class="btn btn-primary">'.$btntext.'</a>
            </div>
        </div>

        
    ';
}
add_shortcode('postcat', 'postcat');

// Footer Social Media Shortcode
function socialmedia ($atts){
	extract (shortcode_atts(array(
		'url' => 'url',
		'text' => 'text'
	), $atts));
	
	return '
		<li><a href="'.$url.'">'.$text.'</a></li>
	';
}
add_shortcode('socialmedia', 'socialmedia');


// Cutomizer
function theme_customizer_register($wp_customize)
{
    // Panel
    $wp_customize->add_panel('front_panel', array(
        'priority' => 1,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Front Page', 'complete'),
    ));
	
	// Panel
    $wp_customize->add_panel('footer_panel', array(
        'priority' => 1,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Footer', 'complete'),
    ));

    // Front page panel
    if ($wp_customize->get_section('static_front_page')) {
        $wp_customize->get_section('static_front_page')->panel	= 'front_panel';
    }
    
    // Sections - Background
    $wp_customize->add_section('home_background', array(
        'title'       => __('Home - Background', 'complete'),
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'front_panel',
    ));

    $wp_customize->add_setting('home_bg_setting', array(
        'default'    => '',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'home-bg-control',
        array(
            'type'	=> 'dropdown-pages',
            'label'	=> __('Select page for this section:', 'complete'),
            'settings'   => 'home_bg_setting',
            'priority'   => 10,
            'section'	=> 'home_background'
        )
    ));

    // Sections - Post Categories
    $wp_customize->add_section('home_postcat', array(
        'title'       => __('Home - Categories Link', 'complete'),
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'front_panel',
    ));

    $wp_customize->add_setting('home_postcat_setting', array(
        'default'    => '',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'home-postcat-control',
        array(
            'type'	=> 'dropdown-pages',
            'label'	=> __('Select page for this section:', 'complete'),
            'settings'   => 'home_postcat_setting',
            'priority'   => 10,
            'section'	=> 'home_postcat'
        )
    ));
	
	// Footer - Instagram
	$wp_customize->add_section('footer_insta', array(
        'title'       => __('Instagram', 'complete'),
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'footer_panel',
    ));

    $wp_customize->add_setting('footer_insta_setting', array(
        'default'    => '',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'footer_insta-control',
        array(
            'type'	=> 'text',
            'label'	=> __('Shortcode for Instagram feed', 'complete'),
            'settings'   => 'footer_insta_setting',
            'priority'   => 10,
            'section'	=> 'footer_insta'
        )
    ));
	
	// Footer - Social Media
	$wp_customize->add_section('footer_soc', array(
        'title'       => __('Social Media', 'complete'),
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'footer_panel',
    ));

    $wp_customize->add_setting('footer_soc_setting', array(
        'default'    => '',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'footer_soc-control',
        array(
            'type'	=> 'dropdown-pages',
            'label'	=> __('Select page for this section:', 'complete'),
            'settings'   => 'footer_soc_setting',
            'priority'   => 10,
            'section'	=> 'footer_soc'
        )
    ));
}
add_action('customize_register', 'theme_customizer_register');
