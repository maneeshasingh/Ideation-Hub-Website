<?php
/**
 * ideation hub functions and definitions
 *
 * @package ideation hub
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'ideation_hub_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ideation_hub_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ideation hub, use a find and replace
	 * to change 'ideation-hub' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ideation-hub', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_image_size('thumbnail_img', 250, 150, true);
	add_image_size('small_thumbnail_img', 50, 50, true);
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ideation-hub' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ideation_hub_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // ideation_hub_setup
add_action( 'after_setup_theme', 'ideation_hub_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function ideation_hub_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ideation-hub' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
}
add_action( 'widgets_init', 'ideation_hub_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ideation_hub_scripts() {
	wp_enqueue_style( 'ideation-hub-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ideation-hub-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'ideation-hub-skip-link-focus-fix', get_template_directory_uri() . '/stylesheets/jquery.min.js', array('jquery'), '20130115', true );
	/**wp_enqueue_script( 'ideation-hub-skip-link-focus-fix1', get_template_directory_uri() . '/stylesheets/jquery.cycle.all.min.js', array('jquery'), '20130115', true );*/
	wp_enqueue_script( 'ideation-hub-skip-link-focus-fix2', get_template_directory_uri() . '/stylesheets/superfish.js', array('jquery'), '20130115', true );
	wp_enqueue_script( 'ideation-hub-skip-link-focus-fix3', get_template_directory_uri() . '/stylesheets/jquery.uniform.min.js', array('jquery'), '20130115', true );
	wp_enqueue_script( 'ideation-hub-skip-link-focus-fix4', get_template_directory_uri() . '/stylesheets/jquery.colorbox.js', array('jquery'), '20130115', true );
	wp_enqueue_script( 'ideation-hub-skip-link-focus-fix5', get_template_directory_uri() . '/stylesheets/application.js', array('jquery'), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script( 'ajax-script', get_template_directory_uri().'/js/custom.js', array('jquery') );

	// in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
	wp_localize_script( 'ajax-script', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'siteurl' => site_url() ) );
	
}
add_action( 'wp_enqueue_scripts', 'ideation_hub_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() .'/recaptchalib.php';


remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

function set_html_content_type() {
	return 'text/html';
}


function codex_custom_init() {
    $args = array(
	'label'  => 'Ideas',
	'public'             => true,
	'publicly_queryable' => true,
	'show_ui'            => true,
	'show_in_menu'       => true,
	'query_var'          => true,
	'rewrite'            => array( 'slug' => 'idea' ),
	'capability_type'    => 'post',
	'has_archive'        => true,
	'hierarchical'       => false,
	'menu_position'      => null,
	'supports'  => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );
    register_post_type( 'idea', $args );
}
add_action( 'init', 'codex_custom_init' );
add_action( 'wp_ajax_save_first_page', 'save_first_page' );
add_action( 'wp_ajax_nopriv_save_first_page', 'save_first_page' );
function save_first_page(){
	$error = '';
	$response = array();
	
	if( isset($_POST['content']) ) {
		
		$innovation = esc_attr($_POST['content']);
		
		/*
		$innovation = esc_attr($_POST['innovation']);
		$name = esc_attr($_POST['name']);
        $preferredname = esc_attr($_POST['preferredname']);     
		$email = esc_attr($_POST['email']);
		$company = esc_attr($_POST['company_name']);
		$sector = esc_attr($_POST['sector']);
		$phone = esc_attr($_POST['phone_number']);
		
		$discuss = esc_attr($_POST['discuss']);
		*/
		
		$post_title = wp_trim_words($innovation, 5);
		$idea = array(
			'post_status'           => 'draft', 
			'post_type'             => 'idea',
			'post_title'		=> '',
			'post_content'		=> $innovation,
			'post_date'		=> date('Y-m-d H:i:s')
			);
		$post_id = wp_insert_post( $idea );
		
		$response = array('stt' => 'success', 'msg' => 'Thank you!');
	}
	wp_send_json($response);
	wp_die();	
}


add_action( 'wp_ajax_save_second_page', 'save_second_page' );
add_action( 'wp_ajax_nopriv_save_second_page', 'save_second_page' );
function save_second_page(){
	
	$error = '';
	$response = array();
	
	if( isset($_POST['f_submit']) && $_POST['f_submit'] == 'submit') {
      

      
		//$idea = esc_attr($_POST['idea']);
		$innovation = esc_attr($_POST['innovation']);
		$name = esc_attr($_POST['name']);
        $preferredname = esc_attr($_POST['preferredname']);     
		$email = esc_attr($_POST['email']);
		$company = esc_attr($_POST['company_name']);
		$sector = esc_attr($_POST['sector']);
		$phone = esc_attr($_POST['phone_number']);
		
		$discuss = esc_attr($_POST['discuss']);
		
		
		$type = $_POST['type'];
		
		
		$resp = recaptcha_check_answer ('6LdUvAUTAAAAAO_bVD2izK-b6kZ9cJYbtPUT9xfF',
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);
	
		if ($resp->is_valid) {
			
			//$post_id = wp_insert_post( $idea );
			$latest_cpt = get_posts("post_type=idea&numberposts=1&post_status=any");
			$post_id = $latest_cpt[0]->ID;
			
			update_post_meta($post_id, 'i_name', $name);
            update_post_meta($post_id, 'i_preferredname', $preferredname);
			update_post_meta($post_id, 'i_email', $email);
			update_post_meta($post_id, 'i_type', $type);
			update_post_meta($post_id, 'i_company', $company);
			update_post_meta($post_id, 'i_sector', $sector);
			update_post_meta($post_id, 'i_phone', $phone);
			update_post_meta($post_id, 'i_discuss', $discuss);
			
			
			$response = array('stt' => 'success', 'msg' => 'Thank you!', 'post id' => $post_id , 'redirecturl' => site_url());
		} else {
			# set the error code so that we can display it
			//$error = $resp->error;
			$response = array('stt' => 'error', 'msg' => 'Please enter correct captcha', 'redirecturl' => '');
			
		}
		

	}
	wp_send_json($response);
	wp_die();
}