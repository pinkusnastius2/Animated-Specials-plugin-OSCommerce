<?php /**********************************************************************************************/
/*									Whats New Box,													*/
/*									With Javascript animation										*/
/*									Written By R. Pink												*/
/*									Copyright Wannacee Media Ltd 2008								*/
/****************************************************************************************************/


$newly_added_query = tep_db_query("select p.products_id, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by products_date_added desc limit " . 10);?>

<tr>
	<td>
    <?php
	$newly_added_contents = '<table width="100%">
								<tr>
									<td align= "center">' . 
										BOX_HEADING_WHATS_NEW . '
									</td>
								</tr>
								<tr>
								<td>
									<div id="WNContainer" class="wncontainer">';

/* cycle through array of products pulled from database*/
	while($newly_added = tep_db_fetch_array($newly_added_query)){
	/* If the product is on special offer diplay the new price*/
		if($new_price = tep_get_products_special_price($newly_added['products_id'])){
			$products_price = '<s>'. $currencies->display_price($newly_added['products_price'], tep_get_tax_rate($newly_added['products_tax_clas_id'])) .'</s><br> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($newly_added['products_tax_clas_id'])) . '</span>';
		} else {
			$products_price = $currencies->display_price($newly_added['products_price'], tep_get_tax_rate($newly_added['products_tax_clas_id']));
		}
		
		$newly_added_contents .='<div class="whatsnew">
									<table>
										<tr>
											<td>			
											<a href="' . tep_href_link(FILENAME_PRODUCT_INFO,'products_id=' . $newly_added['products_id']) .'">' . $newly_added['products_name'] . '</a>
											</td>
										</tr>
										<tr>
											<td>			
											<a href="' . tep_href_link(FILENAME_PRODUCT_INFO,'products_id=' . $newly_added['products_id']) .'">' . tep_image(DIR_WS_IMAGES . $newly_added['products_image'], $newly_added['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>
											</td>
										</tr>
										<tr>
											<td>			
											<a href="' . tep_href_link(FILENAME_PRODUCT_INFO,'products_id=' . $newly_added['products_id']) .'">' . $products_price . '</a>
											</td>
										</tr>
									</table>
								</div>';
	}
	$newly_added_contents .='</div></td></tr></table>';
	echo $newly_added_contents;?>
    
	<script type="text/javascript">
	$(function(){	
		$('#WNContainer').cycle({
			fx:   'toss',
			animOut: { top: 100 },
			pause: 1,
			delay: 5000
		});
	});
	</script>
    </td>
</tr>