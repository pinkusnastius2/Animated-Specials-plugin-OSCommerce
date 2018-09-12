<?php
/********************************************************************************************************************/
/*									Fading Bestsellers Box, 														*/
/*									Using Javascript for effects													*/
/*									Written By R. Pink																*/
/*									Copyright 2008 Wannacee Media Ltd.												*/
/********************************************************************************************************************/

if (isset($current_category_id) && (current_category_id >0)){
	$best_sellers_query =tep_db_query("select distinct p.products_id, p.products_price, p.products_image, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' and p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and '" . (int)$current_category_id . "' in (c.categories_id, c.parent_id) order by p.products_ordered desc, pd.products_name limit " . MAX_DISPLAY_BESTSELLERS);
} else {
		$best_sellers_query = tep_db_query("select distinct p.products_id, p.products_image, p.products_price, p.products_tax_class_id, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_ordered desc, pd.products_name limit " . MAX_DISPLAY_BESTSELLERS);
}

if (tep_db_num_rows($best_sellers_query) >= MIN_DISPLAY_BESTSELLERS) {?>
	<tr>
       	<td>
	<?php
			$bestsellers_list = '<table width="100%" >
									<tr>
										<td align="center">'. 
											BOX_HEADING_BESTSELLERS . '
										</td>
									</tr>
									<tr>
										<td class="infoboxcontents" valign="middle" align="center">
											<div id="BSContainer" class="bscontainer">';
			
			while($best_sellers_info = tep_db_fetch_array($best_sellers_query)){
			
				if ($new_price = tep_get_products_special_price($best_sellers_info['products_id'])){
					$products_price = '<s>' . $currencies->display_price($best_sellers_info['products_price'], tep_get_tax_rate($best_sellers_info['products_tax_class_id'])) . '</s><br> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($best_sellers_info['products_tax_class_id'])) . '</span>';
				} else {
					$products_price = $currencies->display_price($best_sellers_info['products_price'], tep_get_tax_rate($best_sellers_info['products_tax_class_id']));
				}
				$bestsellers_list .='
				<div class="bestsellers">
					<table border="0">
						<tr>
							<td>
								<a href="'.tep_href_link(FILENAME_PRODUCT_INFO,'products_id='.$best_sellers_info['products_id']) . '">' . $best_sellers_info['products_name'] .'</a>
							</td>
						</tr>
						<tr>
							<td>
							<a href="'.tep_href_link(FILENAME_PRODUCT_INFO,'products_id='.$best_sellers_info['products_id']) . '">' .tep_image(DIR_WS_IMAGES . $best_sellers_info['products_image'], $best_sellers_info['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) .'</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="'.tep_href_link(FILENAME_PRODUCT_INFO,'products_id='.$best_sellers_info['products_id']) . '">' . $products_price .'</a>
							</td>
						</tr>
					</table>
				</div>';
			}
			
			$bestsellers_list .= '</div></td></tr></table>';
			echo $bestsellers_list;?>
        	
		<script type="text/javascript">
		$(function(){
			$('#BSContainer').cycle({
			fx: 'fade',
			pause: 1,
			delay: 2000			
			});
		});
		</script>
		</td>
	</tr>
   
<?php } ?>