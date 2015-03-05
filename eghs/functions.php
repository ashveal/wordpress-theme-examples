<?php

function remove_menus(){
  
  //remove_menu_page( 'index.php' );                  //Dashboard
  remove_menu_page( 'edit.php' );                   //Posts
  //remove_menu_page( 'upload.php' );                 //Media
  //remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  //remove_menu_page( 'themes.php' );                 //Appearance
  //remove_menu_page( 'plugins.php' );                //Plugins
  //remove_menu_page( 'users.php' );                  //Users
  //remove_menu_page( 'tools.php' );                  //Tools
  //remove_menu_page( 'options-general.php' );        //Settings
  
}
add_action( 'admin_menu', 'remove_menus' );


add_editor_style( 'editor-style.css' );


function getRewriteRules() {
    global $wp_rewrite; // Global WP_Rewrite class object
    return $wp_rewrite->rewrite_rules();
}


/*add_filter('post_type_link', 'eghs_news_permalink_filter_function', 1, 3);
function eghs_news_permalink_filter_function( $post_link, $id = 0, $leavename = FALSE ) {
	if ( strpos('%news_year%', $post_link) === 'FALSE' ) {
	  return $post_link;
	}
	$post = get_post($id);
	if ( !is_object($post) || $post->post_type != 'eghs_news' ) {
	  return $post_link;
	}
	// this calls the term to be added to the URL
	$terms = wp_get_object_terms($post->ID, 'year');
	if ( !$terms ) {
	  return str_replace('news-events/%news_year%/', '', $post_link);
	}
	
	var_dump($terms);
	
	return str_replace('%news_year%', $terms[0]->slug, $post_link);
}*/

  
add_action('init', function() {

	add_theme_support('menus');
	//add_theme_support( 'automatic-feed-links' );
	add_theme_support('post-thumbnails');
	
	//primary menu
	register_nav_menu('primary', __('Primary Menu','eghs'));
	//footer menus
	register_nav_menu('footer-one', __('Footer Menu 1','eghs'));
	register_nav_menu('footer-two', __('Footer Menu 2','eghs'));
	register_nav_menu('footer-three', __('Footer Menu 3','eghs'));
	register_nav_menu('footer-four', __('Footer Menu 4','eghs'));
	
	
	/*register_sidebar(array(
		'name'=>'Sidebar',
		'before_title'=>'<h4>',
		'after_title'=>'</h4>'
	));*/
	
	/*register_sidebar(array(
		'name' => __( 'Shop Sidebar', 'alcocks' ),
		'id' => 'shop',
		'description' => __( 'Shop sidebar area', 'alcocks' ),
		'before_widget' => '<div class="categories">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));*/
	
	register_post_type( 'eghs_news',
		array(
			'labels' => array(
			'name' => __( 'News' ),
			'singular_name' => __( 'News Article' ),
			'add_new_item'=> __( 'Add News Article' ),
			'edit_item' => __( 'Edit News Article' ),
			'view_item' => __( 'View News Article' ),
			'search_items' => __( 'Search News Articles' ),
			'not_found' => __( 'No News Articles Found' ),
			'not_found_in_trash' => __( 'No News Articles Found in Trash' )
		),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug'=>'news','with_front'=>false)
		)
	);
	
	global $wp; 
    $wp->add_query_var('news_year'); 
    $wp->add_query_var('news_month'); 

		add_rewrite_rule( 'news/([0-9]{4})$', 'index.php?post_type=eghs_news&news_year=$matches[1]', 'top' );
	

	add_rewrite_rule( 'news/([0-9]{4})\/page\/([0-9]{1,})$', 'index.php?post_type=eghs_news&news_year=$matches[1]&paged=$matches[2]', 'top' );
	
	
	//add_rewrite_rule( 'news-events/([0-9]{4})?$', 'index.php?post_type=eghs_news&news_year=$matches[1]', 'top' );
	
	add_rewrite_rule( 'news/([0-9]{4})/([0-9]{1,2})?$', 'index.php?post_type=eghs_news&news_year=$matches[1]&news_month=$matches[2]', 'top' );
	
	add_rewrite_rule( 'news/([0-9]{4})/([0-9]{1,2})\/page\/([0-9]{1,})$', 'index.php?post_type=eghs_news&news_year=$matches[1]&news_month=$matches[2]&paged=$matches[3]', 'top' );
	
	
	
	
	
	
	register_post_type( 'eghs_events',
		array(
			'labels' => array(
			'name' => __( 'Events' ),
			'singular_name' => __( 'Event' ),
			'add_new_item'=> __( 'Add Event' ),
			'edit_item' => __( 'Edit Event' ),
			'view_item' => __( 'View Event' ),
			'search_items' => __( 'Search Events' ),
			'not_found' => __( 'No Events Found' ),
			'not_found_in_trash' => __( 'No Event Found in Trash' )
		),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug'=>'events','with_front'=>false)
		)
	);
	






/*
	
	register_post_type( 'eghs_reports',
		array(
			'labels' => array(
				'name' => __( 'Reports' ),
				'singular_name' => __( 'Report' ),
				'add_new_item'=> __( 'Add Report' ),
				'edit_item' => __( 'Edit Report' ),
				'view_item' => __( 'View Report' ),
				'search_items' => __( 'Search Reports' ),
				'not_found' => __( 'No Reports Found' ),
				'not_found_in_trash' => __( 'No Reports Found in Trash' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug'=>'publications/reports','with_front'=>false),
			'supports' => array( 'title', 'thumbnail' )
		)
	);
	
	
	*/
	
	
	
	register_post_type( 'eghs_publications',
		array(
			'labels' => array(
				'name' => __( 'Publications' ),
				'singular_name' => __( 'Publication' ),
				'add_new_item'=> __( 'Add Publication' ),
				'edit_item' => __( 'Edit Publication' ),
				'view_item' => __( 'View Publication' ),
				'search_items' => __( 'Search Publications' ),
				'not_found' => __( 'No Publications Found' ),
				'not_found_in_trash' => __( 'No Publications Found in Trash' )
			),
			'taxonomies'=>array('articles'),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug'=>'publications/%publication%','with_front'=>false),
			'supports' => array( 'title', 'thumbnail' )
		)
	);
	
	
	$labels = array();
	/*	'name'              => _x( 'Brand', 'taxonomy general name' ),
		'singular_name'     => _x( 'Brand', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Product Categories' ),
		'all_items'         => __( 'All Product Categories' ),
		'parent_item'       => __( 'Parent Product Category' ),
		'parent_item_colon' => __( 'Parent Product Category:' ),
		'edit_item'         => __( 'Edit Product Category' ),
		'update_item'       => __( 'Update Product Category' ),
		'add_new_item'      => __( 'Add New Product Category' ),
		'new_item_name'     => __( 'New Product Category' ),
		'menu_name'         => __( 'Brand' ),
	);*/
	$args = array(
		'labels' => $labels,
		'hierarchical' 	=> true,
		'public'		=> true,
		'query_var'		=> 'publication',
		'rewrite'		=>  array('slug' => 'publications' ),
		'_builtin'		=> false,
	);
	register_taxonomy( 'publication', 'eghs_publications', $args );
	
	
	
	
	
	
	register_post_type( 'eghs_employment',
		array(
			'labels' => array(
				'name' => __( 'Employment' ),
				'singular_name' => __( 'Position' ),
				'add_new_item'=> __( 'Add Position' ),
				'edit_item' => __( 'Edit Position' ),
				'view_item' => __( 'View Position' ),
				'search_items' => __( 'Search Positions' ),
				'not_found' => __( 'No Positions Found' ),
				'not_found_in_trash' => __( 'No Positions Found in Trash' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug'=>'employment/positions-vacant','with_front'=>false)
		)
	);
	
	register_post_type( 'eghs_board',
		array(
			'labels' => array(
			'name' => __( 'Board Members' ),
			'singular_name' => __( 'Board Member' ),
			'add_new_item'=> __( 'Add Board Member' ),
			'edit_item' => __( 'Edit Board Member' ),
			'view_item' => __( 'View Board Member' ),
			'search_items' => __( 'Search Board Members' ),
			'not_found' => __( 'No Board Members Found' ),
			'not_found_in_trash' => __( 'No Board Members Found in Trash' )
		),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug'=>'about/board','with_front'=>false)
		)
	);
	
	register_post_type( 'eghs_management',
		array(
			'labels' => array(
			'name' => __( 'Management' ),
			'singular_name' => __( 'Management Member' ),
			'add_new_item'=> __( 'Add Management Member' ),
			'edit_item' => __( 'Edit Management Member' ),
			'view_item' => __( 'View Management Member' ),
			'search_items' => __( 'Search Management Members' ),
			'not_found' => __( 'No Management Members Found' ),
			'not_found_in_trash' => __( 'No Management Members Found in Trash' )
		),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug'=>'about/management','with_front'=>false)
		)
	);
	
	//Custom Image Sizes
	//add_image_size( 'background', 1920, 1080, true );
	//add_image_size('slider',1140,350,true);
	//add_image_size('content',1140,230,true); 
	
	add_image_size( 'button', 680, 400, false );
	add_image_size( 'splash', 1920, 1080, true );
	add_image_size( 'feature', 850, 300, true );
	add_image_size( 'feature_tall', 850, 560, true );
	add_image_size( 'features', 320, 250, true );
	add_image_size( 'report', 200, 300, true );
	update_option("medium_crop", "1");
	
});

add_action( 'wp_enqueue_scripts', 'wps_enqueue_jquery' );

add_action('wp_enqueue_scripts', function() {
	if(!is_admin()) {
		wp_deregister_script('jquery-migrate');
		wp_register_script('jquery-migrate', 'http://code.jquery.com/jquery-migrate-1.2.1.min.js', false, '1.2.1');
		wp_enqueue_script('jquery-migrate');
		
		wp_register_script('bootstrap', get_template_directory_uri().'/js/vendor/bootstrap.min.js', false, '1.0.0');
		wp_enqueue_script('bootstrap');
		
		wp_register_script('cookie', get_template_directory_uri().'/js/vendor/jquery.cookie.min.js', false, '1.4.0');
		wp_enqueue_script('cookie');

		wp_register_script('script', get_template_directory_uri().'/js/script.min.js', false, '1.0.0');
		wp_enqueue_script('script');
		
		wp_register_style('google-pt-sans', 'http://fonts.googleapis.com/css?family=PT+Sans', false, '1.0.0');
		wp_enqueue_style('google-pt-sans');
		
		wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', false, '1.0.0');
		wp_enqueue_style('bootstrap');
		
		wp_register_style('styles', get_template_directory_uri().'/css/style.min.css', false, '1.0.0');
		wp_enqueue_style('styles');
	}
});

function wps_enqueue_jquery() {
	if (!is_admin()) {
		global $is_IE;
		
		wp_deregister_script('jquery');
		
		if($is_IE) {
			// Include the file, if needed
			if ( ! function_exists( 'wp_check_browser_version' ) ) 
				include_once( ABSPATH . 'wp-admin/includes/dashboard.php' );
				
			// IF < IE9
			$response = wp_check_browser_version();
			if ( 0 > version_compare( intval( $response['version'] ) , 9 ) ) {
				wp_enqueue_script( 'html5shiv', get_template_directory_uri().'/js/html5.js', array(), '3.7.0', false );
				wp_register_script('jquery', '//code.jquery.com/jquery-1.11.0.min.js', false, '1.11.0');
			} else {
				wp_register_script('jquery', '//code.jquery.com/jquery-2.1.0.min.js', false, '2.1.0');
			}
		} else {
			wp_register_script('jquery', '//code.jquery.com/jquery-2.1.0.min.js', false, '2.1.0');
		}
		
		wp_enqueue_script('jquery');
	}
}

/*function get_top_parent_page_id($post_id) {
 
    $post = get_post($post_id);
 
    $ancestors = $post->ancestors;
 
    //Check if page is a child page (any level)
    if($ancestors) {
 
        //Grab the ID of top-level page from the tree
        return end($ancestors);
 
    } else {
 
        //Page is the top level, so use  it's own id
        return $post->ID;
 
    }
 
}*/


function excerpt_read_more_link($output) {
 global $post;
 return $output . '<a href="'. get_permalink($post->ID) . '">Read More</a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


function limit_posts( $query ) {
	if ( !is_admin() ) {
		switch($query->query['post_type']) {
			case 'eghs_news':
			case 'eghs_events':
				$query->set( 'posts_per_page', 5 );
			break;
			case 'eghs_board':
				$query->set( 'posts_per_page', 0 ); // no limit
			break;
			default:
				$query->set( 'posts_per_page', 10 );
		}
	}
}
add_action( 'pre_get_posts', 'limit_posts' );


function wp_pagination() {
	global $wp_query;

	$big = 999999999;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array',
	    'prev_next' => false
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<ul class="archive_pagination"><li class="page">Page</li>';
	            foreach ( $page_format as $page ) {
	                    echo "<li>$page</li>";
	            }
	           echo '</ul>';
	}
}


// redirect to homepage on logout when no redirection specified
add_action('wp_logout', function (){
  if( !isset($_GET['redirect_to']) ) {
	wp_redirect( home_url() );
	exit();
  }
});
//redirect to current page on logout
add_filter('logout_url', function( $logout_url ){
	if ( !is_admin() ) {
		$logout_url = add_query_arg('redirect_to', urlencode(( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), $logout_url);
	} 	 
	return $logout_url;
});





/* This adds the current_page_item class to custom post types for wp_list_pages() */
add_filter('page_css_class', function($classes, $page) {

	$post_type = get_post_type();
	if ( $post_type != 'page' ){ // for custom post types
	    $post_type_data = get_post_type_object( $post_type );
	    $post_type_slug = $post_type_data->rewrite['slug'];
	    
	    $current_post = get_page_by_path( $post_type_slug );
	} else {
		global $post;
		$current_post = $post;
	}
	
  if( get_post_type($post) != 'page' && $current_post->ID == $page->ID)
    $classes[] = 'current_page_item';
  return $classes;
}, 10, 2);




add_filter( 'nav_menu_css_class', 'check_for_submenu', 10, 2);
function check_for_submenu($classes, $item) {
  global $wpdb;

  
  /* This add a is_parent to menu items that are parents */
  $has_children = $wpdb->get_var("SELECT COUNT(meta_id) FROM wp_postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='".$item->ID."'");
  if ($has_children > 0) array_push($classes,'is-parent');

    
	/* This fixes the menu so that custom post types get the current item class */
	$current_url = current_url();
	$homepage_url = rtrim( get_bloginfo( 'url' ), '/' );
	if( is_404() or $item->url == $homepage_url ) return $classes; // Exclude 404 and homepage
	if ( strstr( $current_url, $item->url) ) {
		$classes[] = 'current-menu-item';
	}
	
	if($item->url=='/news' && get_post_type() == 'eghs_events') {
		$classes[] = 'current-menu-item';
	}
	
	
	return $classes;

}

function current_url() {
	// Protocol
	$url = ( 'on' == $_SERVER['HTTPS'] ) ? 'https://' : 'http://';

	$url .= $_SERVER['SERVER_NAME'];

	// Port
	$url .= ( '80' == $_SERVER['SERVER_PORT'] ) ? '' : ':' . $_SERVER['SERVER_PORT'];

	$url .= $_SERVER['REQUEST_URI'];

	return rtrim( $url, '/' );
}



add_action('admin_bar_menu', 'add_toolbar_items', 71);
function add_toolbar_items($admin_bar){
	
	if(is_archive()) {
	
		$page = get_page_by_path($_SERVER['REQUEST_URI']);

		if($page != NULL) {
	    $admin_bar->add_menu( array(
	        'id'    => 'edit',
	        'title' => 'Edit Page',
	        'href'  => get_edit_post_link($page->ID),
	        'meta'  => array(
	            'title' => __('Edit Page'),            
	        ),
	    ));
    }
    
  }
  
  if(is_admin() && $cpt = is_custom_post_type()) {

  	$post_type = get_post_type( $post );
  
  	$pt = get_post_type_object($post_type);

		$admin_bar->add_menu( array(
        'id'    => 'view',
        'title' => 'View '.$pt->labels->menu_name,
        'href'  => get_post_type_archive_link($post_type),
        'meta'  => array(
            'title' => __('View '.$pt->labels->menu_name)         
        )
    ));
    
  }
  
  if(!is_admin() && $cpt = is_custom_post_type()) {

  	$post_type = get_post_type( $post );
  
  	$pt = get_post_type_object($post_type);

		$admin_bar->add_menu( array(
        'id'    => 'view',
        'title' => 'View '.$pt->labels->menu_name,
        'href'  => admin_url('edit.php?post_type='.$post_type),
        'meta'  => array(
            'title' => __('View '.$pt->labels->menu_name)         
        )
    ));
    
  }
}


function is_custom_post_type( $post = NULL )
{
    $all_custom_post_types = get_post_types( array ( '_builtin' => FALSE ) );

    // there are no custom post types
    if ( empty ( $all_custom_post_types ) )
        return FALSE;

    $custom_types      = array_keys( $all_custom_post_types );
    $current_post_type = get_post_type( $post );

    // could not detect current type
    if ( ! $current_post_type )
        return FALSE;

    return in_array( $current_post_type, $custom_types );
}







					

add_action('wp', function() {

	if ( ! wp_next_scheduled( 'eghs_check_expired' ) ) {
		wp_schedule_event( time(), 'daily', 'eghs_check_expired');
	}

					
});


add_action( 'eghs_check_expired', function(){
	
	//mark all employment positions after end_date as draft
	$args = array (
	    'post_type' => 'eghs_employment',
	    'meta_query' => array(
			array(
		        'key'		=> 'end_date',
		        'compare'	=> '<',
		        'value'		=> date('Ymd')
		    )
	    ),
	    'meta_key'=>'end_date',
	    'orderby'=>'meta_value_num',
	    'post_status'=>'published'
	);
	query_posts($args);

	while ( have_posts() ) : the_post();
	    $post->post_status = 'archive';
			wp_update_post($post);
	endwhile;
	
	
	
	//mark all events after event_date as draft
	$args = array (
	    'post_type' => 'eghs_events',
	    'meta_query' => array(
			array(
		        'key'		=> 'event_date',
		        'compare'	=> '<',
		        'value'		=> date('Ymd')
		    )
	    ),
	    'meta_key'=>'event_date',
	    'orderby'=>'meta_value_num',
	    'post_status'=>'published'
	);

	query_posts($args);

	while ( have_posts() ) : the_post();
	    $post->post_status = 'archive';
			wp_update_post($post);
	endwhile;

	wp_reset_query();
	
});





function customiseFormLabels($addressTypes, $formID)
{
	$addressTypes['international']['zip_label'] = 'Post Code';
	$addressTypes['international']['state_label'] = 'State';
	 
	return $addressTypes;
}
add_filter('gform_address_types', 'customiseFormLabels', 10, 2);
 
 
 
 
 
 //Add ARCHIVE post status type: 
 function eghs_custom_post_status(){
     register_post_status( 'archive', array(
          'label'                     => _x( 'Archive', 'post' ),
          'public'                    => false,
          'show_in_admin_all_list'    => false,
          'show_in_admin_status_list' => true,
          'label_count'               => _n_noop( 'Archive <span class="count">(%s)</span>', 'Archive <span class="count">(%s)</span>' )
     ) );
}
add_action( 'init', 'eghs_custom_post_status' );

add_action('admin_footer-post.php', 'eghs_append_post_status_list');
function eghs_append_post_status_list(){
     global $post;
     $complete = '';
     $label = '';
     if($post->post_type == 'eghs_events' || $post->post_type == 'eghs_employment'){
          if($post->post_status == 'archive'){
               $complete = ' selected=\"selected\"';
               $label = '<span id=\"post-status-display\"> Archived</span>';
          }
          echo '
          <script>
          jQuery(document).ready(function($){
               $("select#post_status").append("<option value=\"archive\" '.$complete.'>Archive</option>");
               $(".misc-pub-section label").append("'.$label.'");
          });
          </script>
          ';
     }
}

function eghs_display_archive_state( $states ) {
     global $post;
     $arg = get_query_var( 'post_status' );
     if($arg != 'archive'){
          if($post->post_status == 'archive'){
               return array('Archive');
          }
     }
    return $states;
}
add_filter( 'display_post_states', 'eghs_display_archive_state' );

function eghs_append_post_status_bulk_edit() {

global $post;
if($post->post_type == 'eghs_events' || $post->post_type == 'eghs_employment'){
	echo '
	
	<script>
	
	jQuery(document).ready(function($){
	
	$(".inline-edit-status select").append("<option value=\"archive\">Archive</option>");
	
	});
	
	</script>
	
	';
}

}

add_action( 'admin_footer-edit.php', 'eghs_append_post_status_bulk_edit' );




























add_filter('post_link', 'publication_permalink', 1, 3);
add_filter('post_type_link', 'publication_permalink', 1, 3);

function publication_permalink($permalink, $post_id, $leavename) {

    if (strpos($permalink, '%publication%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        $terms = wp_get_object_terms($post->ID, 'publication');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
        	$taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'reports';

    return str_replace('%publication%', $taxonomy_slug, $permalink);
}









//load page when publication term doesn't exist
function eghs_publications_load_page($query) {

    global $wp_query;
 
    if ( !$query->is_main_query() )
        return; 
        
		if(is_tax() && isset($wp_query->query['publication']) && !term_exists($wp_query->query['publication'])) {
		
			$page = get_page_by_path( $_SERVER['REQUEST_URI'] );
		
			if($page != NULL) {
			  $wp_query = new WP_Query(array(
			      'post_type' => 'page',
			      'page_id' => $page->ID
			  ));
			}
		
		}

}
add_action('pre_get_posts','eghs_publications_load_page');