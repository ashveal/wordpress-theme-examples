<?php

$page_id = get_the_ID();
$post_type = get_post_type();
if ( is_archive() ){ // for custom post types
    $post_type_data = get_post_type_object( $post_type );
    $post_type_slug = $post_type_data->rewrite['slug'];
    
    $page = get_page_by_path( $post_type_slug );
    $page_id = $page->ID;
}

$content_blocks = get_field('content', $page_id  );
$html = '';

if($content_blocks != '') {

	foreach($content_blocks as $block) {
		
		switch($block['acf_fc_layout']) {
			
			case 'heading':
				$html .= '<h1>'.$block['heading'].'</h1>';	
			break;
			
			case 'intro_text':
				$html .= '<h2>'.$block['intro_text'].'</h2>';
			break;
			
			case 'horizontal_rule':
				$html .= '<hr />';
			break;
			
			case 'feature_image':
				
				$img = wp_get_attachment_image_src($block['feature_image'], ($block['size'] && $block['size'] == '6 x 4' ? 'feature_tall' : 'feature'));
				$html .= '<div class="feature-image"><img src="'.$img[0].'" alt="" class="img-responsive" /></div>';
			break;
			
			case 'featured_images':
				$img1 = wp_get_attachment_image_src($block['image_1'], 'features');
				$img2 = wp_get_attachment_image_src($block['image_2'], 'features');
				$img3 = wp_get_attachment_image_src($block['image_3'], 'features');
				$html .= '<div class="row features"><div class="col-xs-4 col-sm-4"><img src="'.$img1[0].'" alt="" class="img-responsive" /></div><div class="col-xs-4 col-sm-4"><img src="'.$img2[0].'" alt="" class="img-responsive" /></div><div class="col-xs-4 col-sm-4"><img src="'.$img3[0].'" alt="" class="img-responsive" /></div></div>';
			break;
			
			case 'one_column_content':
				$html .= $block['one_column'];
			break;
			
			case 'two_column_content':
				$html .= '<div class="row"><div class="col-xs-12 col-sm-6">'.$block['left_column'].'</div><div class="col-xs-12 col-sm-6">'.$block['right_column'].'</div></div>';
			break;
			
			case 'four_column_content':
				$html .= '<div class="row"><div class="col-xs-6 col-sm-3">'.$block['first_column'].'</div><div class="col-xs-6 col-sm-3">'.$block['second_column'].'</div><div class="col-xs-6 col-sm-3">'.$block['third_column'].'</div><div class="col-xs-6 col-sm-3">'.$block['fourth_column'].'</div></div>';
			break;
						
			default:
			
		}
		
	}
	
}

echo $html;