<div id="sidebar">
	    		
	<?php
	//display submenu
	
	
	$post_type = get_query_var ('post_type'); //get_post_type();
	
	if($post_type == 'eghs_news' || $post_type == 'eghs_events') {
		
		
		$years = $wpdb->get_results( "SELECT YEAR(post_date) AS year FROM ".$wpdb->prefix."posts WHERE post_type = 'eghs_news' AND post_status = 'publish' GROUP BY year DESC" );
		
    foreach ( $years as $year ) {
			
			$lis .= '<li class="page_item_has_children'.(get_query_var( 'news_year' ) == $year->year ? ' current_page_parent' : '').'"><a href="#">'.$year->year.'</a><ul class="sub-menu">';
			
			$months = $wpdb->get_results( "SELECT MONTH(post_date) AS month FROM ".$wpdb->prefix."posts WHERE year(post_date) = ".$year->year." AND post_type = 'eghs_news' AND post_status = 'publish' GROUP BY month DESC" );
			
			foreach ($months as $month) {
				//
				$lis .=  '<li'.(get_query_var( 'news_year' ) == $year->year && get_query_var( 'news_month' ) == $month->month ? ' class="current_page_item"' : '').'><a href="/news/'.$year->year.'/'.$month->month.'">'.date("F", mktime(0, 0, 0, $month->month, 10)).'</a></li>';
				
			}
			
			$lis .= '</ul>';
			
			
			$lis .= '</li>';
		
		}
		
		if($lis != '') {
			echo '<div class="submenu"><ul>';

			echo '<li'.($post_type == 'eghs_news' && get_query_var( 'news_year' )=='' ? ' class="current_page_item"' : '') .'><a href="/news">News</a></li>';
			
			echo $lis;
			
			echo '<li'.($post_type == 'eghs_events' ? ' class="current_page_item"' : '') .'><a href="/events">Events</a></li>';
			
			echo '</ul></div>';
		}
	} else {

		/*if ( $post_type != '' && $post_type != 'page' ){ // for custom post types
		    $post_type_data = get_post_type_object( $post_type );
		    $post_type_slug = $post_type_data->rewrite['slug'];
		    
		    $page = get_page_by_path( $post_type_slug );
		    $parent_page = get_top_parent_page_id($page->ID);
		} else {
			$parent_page = get_top_parent_page_id($postid);
		}
		
		$lis = wp_list_pages("child_of=$parent_page&title_li=&echo=0");
		
		
	
		if($lis != '') {
			echo '<div class="submenu"><ul>'.$lis.'</ul></div>';
		}*/
	
	
	
//echo $post_type = 'eghs_publications';
	
	
	
	

/**
 * Returns the submenu items of the parent menu item.
 * @param $sorted_menu_items
 * @param $args
 * @return mixed
 */
 


 
function theme_wp_nav_menu_sub_menu_objects( $sorted_menu_items, $args ) {

	global $post_type;
	
		

    if ( isset( $args->sub_menu ) ) {
    	
    	$root_id = 0;
    
			/*$post_type_slugs = array();
    
	    if ( $post_type != '' && $post_type != 'page' ){ // for custom post types
			  	//$post_type_data = get_post_type_object( $post_type );
			    //$post_type_slug = $post_type_data->rewrite['slug'];
			    
			    //array_push($post_type_slugs, '/'.$post_type_data->rewrite['slug']);
			} else */
			
			if(is_tax()) {

			
			$post_type = 'eghs_publications';



			}

        // find the current menu item
        foreach ( $sorted_menu_items as $menu_item ) {
	 
            if ( $menu_item->current || $post_type != '' && $post_type != 'page' && $menu_item->url == $_SERVER["REQUEST_URI"]) {

                // set the root id based on whether the current menu item has a parent or not
								$root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
                break;
            }
        }
        
         // find the top level parent
				if ( ! isset( $args->direct_parent ) ) {
					$prev_root_id = $root_id;
					while ( $prev_root_id != 0 ) {
						foreach ( $sorted_menu_items as $menu_item ) {
							if ( $menu_item->ID == $prev_root_id ) {
								$prev_root_id = $menu_item->menu_item_parent;
								// don't set the root_id to 0 if we've reached the top of the menu
								if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
								
								break;
							}
						}
					}
				}

        $menu_item_parents = array();
        foreach ( $sorted_menu_items as $key => $item ) {
            // init menu_item_parents
            if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;

            if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
                // part of sub-tree: keep!
                $menu_item_parents[] = $item->ID;
            } else {
                // not part of sub-tree: away with it!
                unset( $sorted_menu_items[$key] );
            }
        }

        return $sorted_menu_items;

    } else {
        return $sorted_menu_items;
    }
}

add_filter( 'wp_nav_menu_objects', 'theme_wp_nav_menu_sub_menu_objects', 10, 2 );


$subnav = wp_nav_menu( array(
    'theme_location'  => 'primary',
    'container'       => '',
    'container_class' => '',
    'fallback_cb'     => '',
    'items_wrap'      => '<ul id="%1$s" class="%2$s sub-menu">%3$s</ul>',
    'echo'            => false,
    'sub_menu'        => true
) );

$menu_items = substr_count( $subnav, 'class="menu-item ' );

if ( $menu_items != 0 ) {
    echo '<div class="submenu">'.$subnav.'</div>';
}


	
	
	
	
	
	
	
	}
	
	
	
	
	?>
	
	<ul class="mainbuttons">
		<li><a href="/services" class="services">Our Services</a></li>
		<li><a href="/employment" class="employment">Employment</a></li>
		<li><a href="/services/ararat/pyrenees-house" class="pyrenees">Pyrenees House</a></li>
		<li><a href="/donations" class="donations">Donations & Bequests</a></li>
		<li><a href="/foundation" class="foundation">EGHS Foundation</a></li>
	</ul>
	
</div>