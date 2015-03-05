<div id="mobile_menu">
	
<a href="/" class="logo">Improving the health of <strong>our community</strong></a>
	
	<?php 
	
class mobile_menu_walker extends Walker_Nav_Menu {
  
  var $parentName = '';
  var $parentURL = '';
  var $parentClassNames = '';
  
  function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";

		if($this->parentName != '' && $this->parentURL != '' && $this->parentURL != '/news') {
			$output .= '<li'.$this->parentClassNames .'><a href="'.$this->parentURL.'">'.$this->parentName.'</a></li>';
		}
	}
  
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		/**
		 * Filter the CSS class(es) applied to a menu item's <li>.
		 *
		 * @since 3.0.0
		 *
		 * @see wp_nav_menu()
		 *
		 * @param array  $classes The CSS classes that are applied to the menu item's <li>.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of wp_nav_menu() arguments.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filter the ID applied to a menu item's <li>.
		 *
		 * @since 3.0.1
		 *
		 * @see wp_nav_menu()
		 *
		 * @param string $menu_id The ID that is applied to the menu item's <li>.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of wp_nav_menu() arguments.
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		/**
		 * Filter the HTML attributes applied to a menu item's <a>.
		 *
		 * @since 3.6.0
		 *
		 * @see wp_nav_menu()
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's <a>, empty strings are ignored.
		 *
		 *     @type string $title  Title attribute.
		 *     @type string $target Target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param object $item The current menu item.
		 * @param array  $args An array of wp_nav_menu() arguments.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		/** This filter is documented in wp-includes/post-template.php */
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$this->parentName = apply_filters( 'the_title', $item->title, $item->ID );
		$this->parentURL = $atts['href'];
		$this->parentClassNames = $class_names;
		/**
		 * Filter a menu item's starting output.
		 *
		 * The menu item's starting output only includes $args->before, the opening <a>,
		 * the menu item's title, the closing </a>, and $args->after. Currently, there is
		 * no filter for modifying the opening and closing <li> for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @see wp_nav_menu()
		 *
		 * @param string $item_output The menu item's starting HTML output.
		 * @param object $item        Menu item data object.
		 * @param int    $depth       Depth of menu item. Used for padding.
		 * @param array  $args        An array of wp_nav_menu() arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
	
	
	wp_nav_menu(array('theme_location'=>'primary','menu_id'=>'mobile_menu_ul','container'=>'','walker'=>new mobile_menu_walker() ));
	
	
	
	?>	
	
	
	<div class="location"><img src="<?php echo get_template_directory_uri(); ?>/img/campus.jpg" >ARART CAMPUS
<address>Girdlestone St, Ararat</address>
Ph: 03 5352 9300</div>
	
	
	
	<div class="location"><img src="<?php echo get_template_directory_uri(); ?>/img/campus.jpg" >WILLAURA CAMPUS
<address>Delacombe Way, Willaura</address>
Ph: 03 5354 1600</div>


<div class="social">
<div class="connect">Connect with us</div><a target="_blank" href="#" class="facebook"><span aria-hidden="true" class="icon-facebook"></span></a><a target="_blank" href="#" class="twitter"><span aria-hidden="true" class="icon-twitter"></span></a><div class="clear"></div>	            			</div>


<ul class="icons">
	<li>
		<a href="#" class="green"></a>
	</li>
	<li>
		<a href="#" class="orange"></a>
	</li>
	<li>
		<a href="#" class="red"></a>
	</li>
	<li>
		<a href="#" class="blue"></a>
	</li>
	<li>
		<a href="#" class="grey"></a>
	</li>
</ul>

</div>