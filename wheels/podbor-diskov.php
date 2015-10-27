<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords_inner", "диски, подбор, штампочки, легкосплавные, автомобильные диски");
$APPLICATION->SetPageProperty("title", "Подбор дисков");
$APPLICATION->SetPageProperty("keywords", "диски, подбор, штампочки, легкосплавные, автомобильные диски");
$APPLICATION->SetPageProperty("description", "Подбор дисков для вашего авто");
$APPLICATION->SetTitle("Подбор дисков");
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
<table cellpadding="10px" cellspacing="10px">
<tbody>
<tr>
	<td style="width:33%; vertical-align:top; padding-right:30px;">


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
	</td>
	<td style="width:65%; vertical-align:top;">
<?$APPLICATION->IncludeComponent(
"bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => 
SITE_DIR."include/sort_count_view.php"), false);?>

		 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
$view,
	Array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "7",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
      "ELEMENT_SORT_FIELD" => $element_sort_field,
      "ELEMENT_SORT_ORDER" => $element_sort_order,
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "arrFilter",
		"INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_ALL_WO_SECTION" => "N",
		"HIDE_NOT_AVAILABLE" => "Y",
		"PAGE_ELEMENT_COUNT" => $element_count,
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array(0=>"wheels_diameter",1=>"wheels_width",2=>"wheels_aperture",3=>"wheels_gab",4=>"wheels_center",5=>"model",6=>"BREND",7=>"BRENDDISKI",8=>"MODELDISKI",9=>"DIAMETRDISKI",10=>"",),
		"OFFERS_LIMIT" => "5",
		"TEMPLATE_THEME" => "blue",
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "N",
		"SET_TITLE" => "Y",
		"SET_BROWSER_TITLE" => "Y",
		"BROWSER_TITLE" => "-",
		"SET_META_KEYWORDS" => "Y",
		"META_KEYWORDS" => "-",
		"SET_META_DESCRIPTION" => "Y",
		"META_DESCRIPTION" => "-",
		"ADD_SECTIONS_CHAIN" => "N",
		"SET_STATUS_404" => "N",
		"CACHE_FILTER" => "N",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRICE_CODE" => array(0=>"Продажи через сайт",),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "N",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"USE_PRODUCT_QUANTITY" => "Y",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"PRODUCT_PROPERTIES" => array(0=>"wheels_diameter",1=>"wheels_width",2=>"wheels_aperture",3=>"wheels_gab",),
		"ADD_TO_BASKET_ACTION" => "ADD",
		"DISPLAY_COMPARE" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"MESS_BTN_COMPARE" => "Сравнить",
		"AJAX_OPTION_ADDITIONAL" => "",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"CURRENCY_ID" => "RUB",
		"COMPONENT_TEMPLATE" => "mega_filter_result",
		"COMPARE_PATH" => "compare/"
	)
);?>
	</td>
</tr>
</tbody>
</table><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>