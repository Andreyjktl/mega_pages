<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?>
<?
// получаем значения переменных из куки или ставим дефолтные
$view = $APPLICATION->get_cookie('view') ? $APPLICATION->get_cookie("view")  : "mega_filter_result"; 
$sort = $APPLICATION->get_cookie('sort') ? $APPLICATION->get_cookie("sort")  : "sort_asc";

// устанавливаем куки и присваиваем значение соответствующим переменным, если таковые есть в REQUEST
if(isset($_REQUEST["view"]) ) {
   $APPLICATION->set_cookie("view", strVal($_REQUEST["view"]) ); 
   $view = strVal($_REQUEST["view"]) ;
   }
if(isset($_REQUEST["element_count"]) ) {
   $APPLICATION->set_cookie("element_count", strVal($_REQUEST["element_count"] )); 
   $element_count = strVal($_REQUEST["element_count"]) ;
   }

   
if(isset($_REQUEST["sort"]) ) {
   $APPLICATION->set_cookie("sort", strVal($_REQUEST["sort"] )); 
   $sort = strVal($_REQUEST["sort"]) ;
   }


// разобьем переменную sort на две element_sort_field и element_sort_order, и заодно исправим (price -> catalog_PRICE_1)
$ar_sort=explode("_", $sort);
$element_sort_field = ($ar_sort[0] == "price" )  ? "catalog_PRICE_1" : $ar_sort[0];
$element_sort_order = $ar_sort[1];


?>

 <?
global $iIBLOCK_ID;
global $arrFilter;
/*print '<pre>';
print_r($arrFilter);
print_r($iIBLOCK_ID);
print '</pre>';*/
if(is_array($arrFilter)&&empty($arrFilter)){
    echo 'Не заданы параметры поиска';
}elseif($arrFilter===false){
    echo 'По заданным параметрам, товары не найдены';
}else{?>

	<div class="col_left">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => ""
	)
);?>  
	</div>
	<div class="col_right">



<!--noindex-->
<table  class="selectors" >
<tr>
 <td align="left">
	 По цене:

      <a<?if($sort=="price_desc") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("sort=price_desc", Array("view", "sort") )?>" rel="nofollow">&#9660;</a>  
 <a<?if($sort=="price_asc") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("sort=price_asc", Array("view", "sort") )?>" rel="nofollow">&#9650;</a>      |    
   <a<?if($sort=="sort_asc") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("sort=sort_asc", Array("view", "sort") )?>" rel="nofollow">По порядку</a>
 </td>
 <td align="center">
	 Показывать по:
<a<?if($element_count=="15") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("element_count=15", Array("element_count","view", "sort") )?>" rel="nofollow">15</a> |   
			<a<?if($element_count=="30") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("element_count=30", Array("element_count", "view", "sort") )?>" rel="nofollow">30</a>   |
			<a<?if($element_count=="50") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("element_count=50", Array("element_count", "view", "sort") )?>" rel="nofollow">50</a>  
 </td>

   <td align="right">

		<div class="selectors_switch" ><a<?if($view=="mega_filter_result") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("view=mega_filter_result", Array("view", "sort") )?>" rel="nofollow"> <img src="<?echo SITE_TEMPLATE_PATH?>/images/icons/price.png" width="15" height="15" alt="" /></a> |   
			<a<?if($view=="filter_result") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("view=filter_result", Array("view", "sort") )?>" rel="nofollow"><img src="<?echo SITE_TEMPLATE_PATH?>/images/icons/detail.png" width="15" height="15" alt="" /></a>   |
			<a<?if($view=="mega_list") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("view=mega_list", Array("view", "sort") )?>" rel="nofollow"><img src="<?echo SITE_TEMPLATE_PATH?>/images/icons/list.png" width="15" height="15" alt="" /></a>  

	   </div>

   </td>

</tr>
</table>
<!--/noindex-->


		 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"$view",
	Array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => $iIBLOCK_ID,
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"ELEMENT_SORT_FIELD" => $sort,
		"ELEMENT_SORT_ORDER" => $sort,
		"FILTER_NAME" => "arrFilter",
		"INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_ALL_WO_SECTION" => "N",
		"PAGE_ELEMENT_COUNT" => $element_count,
		"LINE_ELEMENT_COUNT" => "4",
		"PROPERTY_CODE" => array(0=>"",1=>"model",2=>"",),
		"OFFERS_LIMIT" => "4",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"ADD_SECTIONS_CHAIN" => "N",
		"DISPLAY_COMPARE" => "Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"CACHE_FILTER" => "N",
		"PRICE_CODE" => array(0=>"Продажи через сайт",),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_PROPERTIES" => array(),
		"USE_PRODUCT_QUANTITY" => "Y",
		"CONVERT_CURRENCY" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?>
</div>
<div style="clear:both;"></div>
<?}?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>