<?php /**********************************************************************************************/
/*									Specials Box,													*/
/*									With Javascript animation										*/
/*									Written By R. Pink												*/
/*									Copyright Wannacee Media Ltd 2008								*/
/****************************************************************************************************/


$rand_prod_query = tep_db_query("select p.products_id, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image, s.specials_new_products_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_SPECIALS . " s where p.products_status = '1' and p.products_id = s.products_id and pd.products_id = s.products_id and pd.language_id = '" . (int)$languages_id . "' and s.status = '1' order by s.specials_date_added desc");?>

<tr>
	<td>
    <?php
	$specials_contents = '<table width="100%">
								<tr>
									<td align= "center">' . 
										BOX_HEADING_SPECIALS . '
									</td>
								</tr>
								<tr>
								<td>
									<div id="SPECContainer" class="speccontainer">';

/* cycle through array of products pulled from database*/
	while($specials = tep_db_fetch_array($rand_prod_query)){
	/* If the product is on special offer diplay the new price*/
		if($new_price = tep_get_products_special_price($specials['products_id'])){
			$products_price = '<s>'. $currencies->display_price($specials['products_price'], tep_get_tax_rate($specials['products_tax_clas_id'])) .'</s><br><span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($specials['products_tax_clas_id'])) .'</span>';
		} else {
			$products_price = $currencies->display_price($specials['products_price'], tep_get_tax_rate($specials['products_tax_clas_id']));
		}
		
		$specials_contents .='<div class="specials">
									<table>
										<tr>
											<td>			
											<a href="' . tep_href_link(FILENAME_PRODUCT_INFO,'products_id=' . $specials['products_id']) .'">' . $specials['products_name'] . '</a>
											</td>
										</tr>
										<tr>
											<td>			
											<a href="' . tep_href_link(FILENAME_PRODUCT_INFO,'products_id=' . $specials['products_id']) .'">' . tep_image(DIR_WS_IMAGES . $specials['products_image'], $specials['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>
											</td>
										</tr>
										<tr>
											<td>			
											<a href="' . tep_href_link(FILENAME_PRODUCT_INFO,'products_id=' . $specials['products_id']) .'">' . $products_price . '</a>
											</td>
										</tr>
									</table>
								</div>';
	}
	$specials_contents .='</div></td></tr></table>';
	echo $specials_contents;?>
	<script type="text/javascript">
	$(function() {
		$('#SPECContainer').cycle({
			fx: 'curtainX',
			delay: 4000,
			pause: 1,
			sync: true
		});
	});
	

	
	</script>
    </td>
</tr>