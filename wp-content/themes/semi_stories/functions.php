<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup() {
  load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'html5', array( 'search-form' ) );
  global $content_width;
  if ( ! isset( $content_width ) ) { $content_width = 1920; }
  register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'blankslate' ) ) );
  register_nav_menus( array( 'footer-menu' => esc_html__( 'Footer Menu Categories', 'blankslate' ) ) );
  register_nav_menus( array( 'footer-menu-right' => esc_html__( 'Footer Menu Right Column', 'blankslate' ) ) );
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );


function blankslate_load_scripts() {
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
  wp_enqueue_script( 'jquery' );
}

/**
 * Enqueue scripts and styles.
 */
function studio_see_scripts() {
  $t_dir = get_template_directory();
  $t_dir_uri = get_template_directory_uri();
  $ver = filemtime($t_dir . '/scss/style.scss');
  wp_enqueue_style('ssee_style', $t_dir_uri . '/style.php/style.scss', array(), $ver);

	wp_enqueue_style( 'ssee_swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.2/css/swiper.min.css' );

  // PAGINATION STEP 1
  global $wp_query;
	wp_enqueue_script( 'ssee_jquery', 'https://code.jquery.com/jquery-3.4.1.min.js' );

	// wp_enqueue_script( 'ssee_gsap_jquery', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/jquery.gsap.min.js', array(), '20200122', true );
	wp_enqueue_script( 'ssee_gsap', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js', array(), '20200123', true );
	wp_enqueue_script( 'ssee_tweenmax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js', array(), '20200122', true );
	wp_enqueue_script( 'ssee_scrollmagic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', array(), '20200122', true );
	wp_enqueue_script( 'ssee_sm-gsap', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.js', array(), '20200122', true );
	wp_enqueue_script( 'ssee_indicators', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js', array(), '20200122', true );
  wp_enqueue_script( 'ssee_splittext', get_template_directory_uri() . '/js/vendor/SplitText.min.js', array(), '20200123', true );
  wp_enqueue_script( 'ssee_marquee', get_template_directory_uri() . '/js/vendor/jquery-marquee.js', array(), '20200123', true );

	wp_enqueue_script( 'ssee_lazy', 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js', array(), '20200122', true );
	// wp_enqueue_script( 'ssee_modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array(), '20200122', true );
	wp_enqueue_script( 'ssee_swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.2/js/swiper.min.js', array(), '20200122', true );
	wp_enqueue_script( 'ssee_modernizer', get_template_directory_uri() . '/js/vendor/modernizr.min.js', array(), '20200122', true );

	wp_enqueue_script( 'ssee_theme', get_template_directory_uri() . '/js/theme.js', array(), $ver, true );

  // PAGINATION STEP 2
 // LOCALIZATION FOR AJAX
 wp_localize_script( 'ssee_theme', 'ajaxpagination', array(
 	'ajaxurl' => admin_url( 'admin-ajax.php' ),
 	'posts' => json_encode( $wp_query->query_vars ),
  'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
	'max_page' => $wp_query->max_num_pages
 ));


	wp_enqueue_script( 'ssee_skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20200122', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'studio_see_scripts' );



add_action( 'wp_footer', 'blankslate_footer_scripts' );
function blankslate_footer_scripts() {
  ?>
  <script>
  jQuery(document).ready(function ($) {
    var deviceAgent = navigator.userAgent.toLowerCase();
    if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
      $("html").addClass("ios");
      $("html").addClass("mobile");
    }
    if (navigator.userAgent.search("MSIE") >= 0) {
      $("html").addClass("ie");
    }
    else if (navigator.userAgent.search("Chrome") >= 0) {
      $("html").addClass("chrome");
    }
    else if (navigator.userAgent.search("Firefox") >= 0) {
      $("html").addClass("firefox");
    }
    else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
      $("html").addClass("safari");
    }
    else if (navigator.userAgent.search("Opera") >= 0) {
      $("html").addClass("opera");
    }
  });
</script>
<?php
}
add_filter( 'document_title_separator', 'blankslate_document_title_separator' );
function blankslate_document_title_separator( $sep ) {
  $sep = '|';
  return $sep;
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
  if ( $title == '' ) {
    return '...';
  } else {
    return $title;
  }
}
add_filter( 'the_content_more_link', 'blankslate_read_more_link' );
function blankslate_read_more_link() {
  if ( ! is_admin() ) {
    return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
  }
}
add_filter( 'excerpt_more', 'blankslate_excerpt_read_more_link' );
function blankslate_excerpt_read_more_link( $more ) {
  if ( ! is_admin() ) {
    global $post;
    return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
  }
}
add_filter( 'intermediate_image_sizes_advanced', 'blankslate_image_insert_override' );
function blankslate_image_insert_override( $sizes ) {
  unset( $sizes['medium_large'] );
  return $sizes;
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init() {
  register_sidebar( array(
    'name' => esc_html__( 'Sidebar Widget Area', 'blankslate' ),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}
add_action( 'wp_head', 'blankslate_pingback_header' );
function blankslate_pingback_header() {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
  }
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script() {
  if ( get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
function blankslate_custom_pings( $comment ) {
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
  <?php
}
add_filter( 'get_comments_number', 'blankslate_comment_count', 0 );
function blankslate_comment_count( $count ) {
  if ( ! is_admin() ) {
    global $id;
    $get_comments = get_comments( 'status=approve&post_id=' . $id );
    $comments_by_type = separate_comments( $get_comments );
    return count( $comments_by_type['comment'] );
  } else {
    return $count;
  }
}


/**
 * Options Pages
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Sitewide Shared Content',
		'menu_title'	=> 'Sitewide Shared Content',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

  acf_add_options_page(array(
		'page_title' 	=> 'Newsletter Content',
		'menu_title'	=> 'Newsletter Content',
		'menu_slug' 	=> 'theme-newsletter-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

  acf_add_options_page(array(
		'page_title' 	=> 'Ads',
		'menu_title'	=> 'Ads',
		'menu_slug' 	=> 'theme-ads-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

  acf_add_options_page(array(
		'page_title' 	=> 'Category Settings',
		'menu_title'	=> 'Category Settings',
		'menu_slug' 	=> 'theme-category-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));


}

// Add Options Page
function add_my_options_page() {
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
  }
}
add_action( 'plugins_loaded', 'add_my_options_page' );

add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
  if (!isset($_POST["post_ID"]) && !isset($_GET['post'])) {
    return;
  }
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
  if( !isset( $post_id ) || $post_id == '' ) return;
}

add_action( 'init', function() {
remove_post_type_support( 'post', 'editor' );
remove_post_type_support( 'page', 'editor' );
}, 99);



/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute
 */

function acf_responsive_image($image_id){

	// check the image ID is not blank
	if ($image_id != '') {

		// set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, 'large' );

		// set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, 'full_size' );

		// generate the markup for the responsive image
		echo 'src="'.$image_src.'" srcset="'.$image_srcset.'"';

	}
}


/* ADD CUSTOM IMAGE SIZES FOR POST FEATURED IMAGE
================================================== */

add_theme_support( 'post-thumbnails' );

add_action( 'after_setup_theme', 'aw_custom_add_image_sizes' );
function aw_custom_add_image_sizes() {
    add_image_size( 'xs', 500, 9999 ); // 500 wide unlimited height
    add_image_size( 'small', 768, 9999 ); // 768 wide unlimited height
    add_image_size( 'medium-small', 1050, 9999 ); // 1050px wide unlimited height
    add_image_size( 'xl', 1400, 9999 ); // 1400 wide unlimited height
    add_image_size( 'xxl', 2000, 9999 ); // 1400 wide unlimited height
    add_image_size( 'full_size', 2800, 9999 ); // 2800 wide unlimited height

}

add_filter( 'image_size_names_choose', 'aw_custom_add_image_size_names' );
function aw_custom_add_image_size_names( $sizes ) {
  return array_merge( $sizes, array(
    'xs' => __( 'Extra Small' ),
    'small' => __( 'Small' ),
    'medium-small' => __( 'Medium Small' ),
    'xl' => __( 'Extra Large' ),
    'xxl' => __( 'Extra Extra Large' ),
    'full_size' => __( 'Full Size' ),
  ) );
}

/* PAGINATION
================================================== */
if ( ! function_exists( 'my_pagination' ) ) :
    function my_pagination() {
        global $wp_query;

        $big = 999999999; // need an unlikely integer

        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
						'next_text' => (''),
    				'prev_text' => (''),
        ) );
    }
endif;


/* GET TEMPLATE PART WITH VARIABLES
================================================== */
/**
 * Like get_template_part() put lets you pass args to the template file
 * Args are available in the template as $template_args array
 * @param string filepart
 * @param mixed wp_args style argument list
 */
function hm_get_template_part( $file, $template_args = array(), $cache_args = array() ) {

	$template_args = wp_parse_args( $template_args );
	$cache_args = wp_parse_args( $cache_args );

	if ( $cache_args ) {

		foreach ( $template_args as $key => $value ) {
			if ( is_scalar( $value ) || is_array( $value ) ) {
				$cache_args[$key] = $value;
			} else if ( is_object( $value ) && method_exists( $value, 'get_id' ) ) {
				$cache_args[$key] = call_user_method( 'get_id', $value );
			}
		}

		if ( ( $cache = wp_cache_get( $file, serialize( $cache_args ) ) ) !== false ) {

			if ( ! empty( $template_args['return'] ) )
				return $cache;

			echo $cache;
			return;
		}

	}

	$file_handle = $file;

	do_action( 'start_operation', 'hm_template_part::' . $file_handle );

	if ( file_exists( get_stylesheet_directory() . '/' . $file . '.php' ) )
		$file = get_stylesheet_directory() . '/' . $file . '.php';

	elseif ( file_exists( get_template_directory() . '/' . $file . '.php' ) )
		$file = get_template_directory() . '/' . $file . '.php';

	ob_start();
	$return = require( $file );
	$data = ob_get_clean();

	do_action( 'end_operation', 'hm_template_part::' . $file_handle );

	if ( $cache_args ) {
		wp_cache_set( $file, $data, serialize( $cache_args ), 3600 );
	}

	if ( ! empty( $template_args['return'] ) )
		if ( $return === false )
			return false;
		else
			return $data;

	echo $data;
}


/* AJAX LOAD MORE POSTS
================================================== */
function more_post_ajax(){

  $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
  $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
  $postType = (isset($_POST['postType'])) ? $_POST['postType'] : 'post';
  $taxonomy = $postType == 'news' ? 'news_category' : 'category';
  // header("Content-Type: text/html");

  $args = array(
      'post_type' => $postType,
      'orderby' => 'date',
      'order'	=> $_POST['date'],
  );

  if( !isset( $_POST['query'] )) {
    $args['posts_per_page'] = $ppp;
    $args['paged'] = $page;
  }

  // for taxonomies / categories
  if( isset( $_POST['categoryFilter'] ) && $_POST['categoryFilter'] != '' ) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => $taxonomy,
        'field' => 'id',
        'terms' => $_POST['categoryFilter']
      )
    );
  }

  // SEARCH QUERY
  if( isset( $_POST['query'] )) {
    $args['s'] = urlencode($_POST['query']);
  }

    // if post thumbnail is set
  // if( isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
    $args['meta_query'][] = array(
      'key' => '_thumbnail_id',
      'compare' => 'EXISTS'
    );

  $loop = new WP_Query($args);

  $out = '';

  if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
    $className = $postType == 'post' ? 'blog-landing-article' : '';
    hm_get_template_part( 'template-parts/post-thumb',  ['className' => $className, 'catName' => $taxonomy, 'post' => get_the_id()] );
  endwhile;
  endif;
  wp_reset_postdata();
  die();
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');
