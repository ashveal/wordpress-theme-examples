<?php
/**
 * Template Name: Corporate
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<?php

//quote block
$quote = get_field('quote');

if($quote != '') {
?>
<div id="quote-block">
	<div class="container">
		<h2>"<?php echo $quote; ?>"</h2>
	</div>
</div>
<?php	
}
?>

<div id="content">
	<div id="corporate">
		
		<?php

		$content_blocks = get_field('content_block');
		$html = '';
		$count = 1;
		$total = count($content_blocks);
		
		foreach($content_blocks as $block) {
			
			switch($block['acf_fc_layout']) {
				
				case 'standard_text':
					$html .= '<div class="corporate-container'.($count==$total ? ' corporate-container-last' : '').'"><div class="container"><div class="content-menu"><h2>'.$block['title'].'</h2></div><div class="content-main">'.$block['content'].'</div><div class="clear"></div></div></div>';	
				break;
				
				case 'staff':
					
					$staffcount = 1;
					$stafftotal = count($block['staff_member']);
					foreach($block['staff_member'] as $staff) {
						$html .= '<div class="corporate-container'.($staffcount==$stafftotal ? ' corporate-container-last' : '').'"><div class="container"><div class="content-menu">'.($staffcount==1 ? '<h2>'.$block['title'].'</h2>' : '&nbsp;').'</div><div class="content-main">';
						$img = wp_get_attachment_image_src($staff['image'], 'medium');
						$html .= '<div class="staff-member"><div class="staff-img"><img src="'.bfi_thumb($img[0], $params = array('width'=>145, 'height'=>175)).'" alt="'.$staff['name'].'" width="145" height="175" /></div><div class="staff-title"><h2>'.$staff['name'].'</h2><h4>'.$staff['title'].'</h4></div><div class="staff-content">'.$staff['text'].'</div><div class="clear"></div></div>';
						$html .= '</div><div class="clear"></div></div></div>';
						$staffcount++;	
					}
					
				break;
				
				default:
				
			}
			
			$count++;	
			
		}
		
		echo $html;
		
		?>
		
	</div>
</div>

<?php get_footer(); ?>