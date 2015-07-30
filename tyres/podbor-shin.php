<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords_inner", "шины, автомобильные шины");
$APPLICATION->SetPageProperty("title", "Подбор шин");
$APPLICATION->SetPageProperty("keywords", "Подбор шин, автомобильные шины");
$APPLICATION->SetPageProperty("description", "Подбор шин по характеристикам");
$APPLICATION->SetTitle("Подбор шин");
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
	"api:search.filter",
	"mega_gray-blue",
	Array(
		"COMPONENT_TEMPLATE" => "mega_gray-blue",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "5",
		"FILTER_NAME" => "arrFilter",
		"REDIRECT_FOLDER" => "tyres/podbor-shin.php",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"PROPERTY_CODE" => array(0=>"tyre_width",1=>"tyre_height",2=>"tyre_diameter",3=>"model_season",4=>"model_pin",5=>"tyre_brend",6=>"",),
		"CHECK_ACTIVE_SECTIONS" => "N",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => $_REQUEST["SECTION_CODE"],
		"LIST_HEIGHT" => "5",
		"TEXT_WIDTH" => "209",
		"NUMBER_WIDTH" => "85",
		"SELECT_WIDTH" => "220",
		"ELEMENT_IN_ROW" => "3",
		"NAME_WIDTH" => "130",
		"FILTER_TITLE" => "Фильтр",
		"BUTTON_ALIGN" => "left",
		"SELECT_IN_CHECKBOX" => array(0=>"",1=>"",),
		"CHECKBOX_NEW_STRING" => "N",
		"REPLACE_ALL_LABEL" => "N",
		"REMOVE_POINTS" => "N",
		"SECTIONS_DEPTH_LEVEL" => "",
		"SECTIONS_FIELD_TITLE" => "Разделы",
		"SECTIONS_FIELD_VALUE_TITLE" => "Все разделы",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"SAVE_IN_SESSION" => "Y",
		"PRICE_CODE" => array(0=>"Продажи через сайт",),
		"INCLUDE_JQUERY" => "N",
		"INCLUDE_PLACEHOLDER" => "Y",
		"INCLUDE_CHOSEN_PLUGIN" => "Y",
		"CHOSEN_PLUGIN_PARAM__disable_search_threshold" => "30",
		"INCLUDE_FORMSTYLER_PLUGIN" => "Y",
		"INCLUDE_AUTOCOMPLETE_PLUGIN" => "N",
		"INCLUDE_JQUERY_UI" => "N",
		"INCLUDE_JQUERY_UI_SLIDER" => "N",
		"JQUERY_UI_SLIDER_BORDER_RADIUS" => "N",
		"INCLUDE_JQUERY_UI_SLIDER_TOOLTIP" => "N",
		"JQUERY_UI_THEME" => "ts-red",
		"JQUERY_UI_FONT_SIZE" => "10px"
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => ""
	)
);?>  <br>
	</td>
	<td style="width:65%; vertical-align:top;">
<!--noindex-->
<table class="selectors" >
<tr>
 <td align="left">
      <a<?if($sort=="price_desc") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("sort=price_desc", Array("view", "sort") )?>" rel="nofollow">По цене вниз</a> / 
      <a<?if($sort=="price_asc") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("sort=price_asc", Array("view", "sort") )?>" rel="nofollow">по цене вверх</a> / 
      <a<?if($sort=="sort_asc") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("sort=sort_asc", Array("view", "sort") )?>" rel="nofollow">по порядку</a>
   </td>
   <td align="right">
      <a<?if($view=="mega_filter_result") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("view=mega_filter_result", Array("view", "sort") )?>" rel="nofollow">Детально</a> /
      <a<?if($view=="mega_list") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("view=mega_list", Array("view", "sort") )?>" rel="nofollow">Список</a> 
      
   </td>

</tr>
</table>
<!--/noindex-->

		 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	 $view,
	Array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "5",
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
		"PAGE_ELEMENT_COUNT" => "15",
		"LINE_ELEMENT_COUNT" => "1",
		"PROPERTY_CODE" => array(0=>"tyre_width",1=>"tyre_height",2=>"tyre_diameter",3=>"tyre_on_index",4=>"hit",5=>"model",6=>"TIP",7=>"SEZON",8=>"CML2_ARTICLE",9=>"CML2_BASE_UNIT",10=>"tyre_load",11=>"order",12=>"CML2_MANUFACTURER",13=>"CML2_TRAITS",14=>"CML2_TAXES",15=>"CML2_ATTRIBUTES",16=>"SHIP_NE_SHIP",17=>"CML2_BAR_CODE",18=>"BRENDDISKI",19=>"tyre_speed",20=>"DOPINFO",21=>"DIAMETRDISKI",22=>"title",23=>"keywords",24=>"description",25=>"TIPDISKI",26=>"SHIRINADISKI",27=>"INDEKS_NAGRUZKI_I_SKOROSTI",28=>"INDEKS_SKOROSTI",29=>"TIP_1",30=>"KOL_VO_OTVERSTIY",31=>"PCD",32=>"VYLET_ET",33=>"DIA",34=>"TSVET",35=>"DOP_SVEDENIE",36=>"ARTIKUL",37=>"BREND",38=>"MODELDISKI",39=>"SHIPOVANNYE",40=>"SEZON_1",41=>"PROFIL",42=>"DIAMETR",43=>"SHIRINA",44=>"",),
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
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
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
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "Y",
		"BASKET_URL" => "/personal/basket.php",
		"USE_PRODUCT_QUANTITY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(0=>"TIP",1=>"SEZON",2=>"CML2_MANUFACTURER",3=>"CML2_TRAITS",4=>"CML2_TAXES",5=>"CML2_ATTRIBUTES",6=>"SHIP_NE_SHIP",7=>"DOPINFO",8=>"TIPDISKI",9=>"DOP_SVEDENIE",10=>"ARTIKUL",),
		"ADD_TO_BASKET_ACTION" => "ADD",
		"DISPLAY_COMPARE" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"MESS_BTN_COMPARE" => "Сравнить",
		"AJAX_OPTION_ADDITIONAL" => "",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"CURRENCY_ID" => "RUB",
		"COMPONENT_TEMPLATE" => "mega_filter_result",
		"OFFERS_FIELD_CODE" => array(0=>"",1=>"",),
		"OFFERS_PROPERTY_CODE" => array(0=>"",1=>"",),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFERS_CART_PROPERTIES" => ""
	)
);?>
	</td>
</tr>
</tbody>
</table><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>