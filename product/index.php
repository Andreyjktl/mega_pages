<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Продукт");
?>
<div class="col_left">
<br>
</div>
<div class="col_right">
<?
$SEF_URL_TEMPLATES = array("element" => "#ELEMENT_CODE#/");
$VARIABLE_ALIASES = array();

$arDefaultUrlTemplates404 = array("element" => "#ELEMENT_CODE#/");
$arDefaultVariableAliases404 = array();
$arDefaultVariableAliases = array();

$arComponentVariables = array("ELEMENT_CODE", "action");

$arVariables = array();

$arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates($arDefaultUrlTemplates404, $SEF_URL_TEMPLATES);
$arVariableAliases = CComponentEngine::MakeComponentVariableAliases($arDefaultVariableAliases404, $VARIABLE_ALIASES);
$componentPage = CComponentEngine::ParseComponentPath('/product/', $arUrlTemplates, $arVariables);

if(!$componentPage)
	$componentPage = "sections";

CComponentEngine::InitComponentVariables($componentPage, $arComponentVariables, $arVariableAliases, $arVariables);
$arResult = array("URL_TEMPLATES" => $arUrlTemplates, "VARIABLES" => $arVariables);

if(strlen($arResult['VARIABLES']['ELEMENT_CODE'])>0){
    $arSelect = Array("ID", "IBLOCK_ID", "CODE", "IBLOCK_CODE");
    $arFilter = Array("CODE"=>$arResult['VARIABLES']['ELEMENT_CODE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, array("nTopCount"=>1), $arSelect);

    if($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();

        $APPLICATION->IncludeComponent(
	"bitrix:catalog.element", 
	"product_w", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "5",
		"ELEMENT_ID" => "",
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"BASKET_URL" => "/personal/cart/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"PROPERTY_CODE" => array(
			0 => "tyre_width",
			1 => "tyre_height",
			2 => "tyre_diameter",
			3 => "model_season",
			4 => "model_pin",
			5 => "tyre_brend",
			6 => "tyre_load",
			7 => "",
		),
		"PRICE_CODE" => array(
			0 => "Продажи через сайт",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "N",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"USE_PRODUCT_QUANTITY" => "Y",
		"LINK_IBLOCK_TYPE" => "catalog",
		"LINK_IBLOCK_ID" => "4",
		"LINK_PROPERTY_SID" => "model",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y",
		"COMPONENT_TEMPLATE" => "product_w",
		"HIDE_NOT_AVAILABLE" => "N",
		"OFFERS_LIMIT" => "0",
		"CHECK_SECTION_ID_VARIABLE" => "Y",
		"SET_CANONICAL_URL" => "N",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"SHOW_DEACTIVATED" => "N",
		"DISPLAY_COMPARE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFERS_CART_PROPERTIES" => "",
		"COMPARE_PATH" => ""
	),
	false
);

 $APPLICATION->IncludeComponent(
	"bitrix:catalog.element", 
	"product_w", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "7",
		"ELEMENT_ID" => "",
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"BASKET_URL" => "/personal/cart/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"PROPERTY_CODE" => array(
			0 => "wheels_diameter",
			1 => "wheels_width",
			2 => "wheels_aperture",
			3 => "wheels_gab",
			4 => "wheels_center",
			5 => "tyre_width",
			6 => "tyre_height",
			7 => "tyre_diameter",
			8 => "model_season",
			9 => "model_pin",
			10 => "tyre_load",
			11 => "tyre_brend",
			12 => "",
		),
		"PRICE_CODE" => array(
			0 => "Продажи через сайт",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "N",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_PROPERTIES" => array(
			0 => "wheels_diameter",
			1 => "wheels_width",
			2 => "wheels_aperture",
			3 => "wheels_gab",
			4 => "wheels_center",
		),
		"USE_PRODUCT_QUANTITY" => "Y",
		"LINK_IBLOCK_TYPE" => "catalog",
		"LINK_IBLOCK_ID" => "4",
		"LINK_PROPERTY_SID" => "model",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y",
		"COMPONENT_TEMPLATE" => "product_w",
		"HIDE_NOT_AVAILABLE" => "Y",
		"OFFERS_LIMIT" => "0",
		"CHECK_SECTION_ID_VARIABLE" => "Y",
		"SET_CANONICAL_URL" => "N",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"SHOW_DEACTIVATED" => "N",
		"DISPLAY_COMPARE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFERS_CART_PROPERTIES" => "",
		"COMPARE_PATH" => "",
		"BACKGROUND_IMAGE" => "-",
		"SEF_MODE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);
    }
}
?>
</div>
<div style="clear:both"></div>

<br>
 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.bigdata.products", 
	"main_template", 
	array(
		"COMPONENT_TEMPLATE" => "main_template",
		"RCM_TYPE" => "bestsell",
		"ID" => $_REQUEST["PRODUCT_ID"],
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "",
		"SHOW_FROM_SECTION" => "N",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_ELEMENT_ID" => "",
		"SECTION_ELEMENT_CODE" => "",
		"DEPTH" => "",
		"HIDE_NOT_AVAILABLE" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_NAME" => "Y",
		"SHOW_IMAGE" => "Y",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"PAGE_ELEMENT_COUNT" => "5",
		"LINE_ELEMENT_COUNT" => "5",
		"TEMPLATE_THEME" => "blue",
		"DETAIL_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y",
		"SHOW_OLD_PRICE" => "Y",
		"PRICE_CODE" => array(
			0 => "Продажи через сайт",
		),
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"USE_PRODUCT_QUANTITY" => "Y",
		"SHOW_PRODUCTS_4" => "Y",
		"PROPERTY_CODE_4" => array(
			0 => "model_season",
			1 => "model_pin",
			2 => "",
		),
		"CART_PROPERTIES_4" => array(
			0 => "model_season",
			1 => "model_pin",
			2 => "",
		),
		"ADDITIONAL_PICT_PROP_4" => "model_more_photos",
		"LABEL_PROP_4" => "-",
		"SHOW_PRODUCTS_6" => "Y",
		"PROPERTY_CODE_6" => array(
			0 => "CML2_ATTRIBUTES",
			1 => "",
		),
		"CART_PROPERTIES_6" => array(
			0 => "KOL_VO_OTVERSTIY",
			1 => "",
		),
		"ADDITIONAL_PICT_PROP_6" => "wheels_more_photos",
		"LABEL_PROP_6" => "-",
		"PROPERTY_CODE_5" => array(
			0 => "tyre_width",
			1 => "tyre_height",
			2 => "tyre_diameter",
			3 => "model_season",
			4 => "model_pin",
			5 => "",
		),
		"CART_PROPERTIES_5" => array(
			0 => "tyre_width",
			1 => "tyre_height",
			2 => "tyre_diameter",
			3 => "model_season",
			4 => "model_pin",
			5 => "",
		),
		"ADDITIONAL_PICT_PROP_5" => "MORE_PHOTO",
		"OFFER_TREE_PROPS_5" => array(
			0 => "tyre_width",
			1 => "tyre_height",
			2 => "tyre_diameter",
			3 => "model_season",
			4 => "model_pin",
		),
		"PROPERTY_CODE_7" => array(
			0 => "wheels_diameter",
			1 => "wheels_width",
			2 => "wheels_aperture",
			3 => "wheels_gab",
			4 => "wheels_center",
			5 => "",
		),
		"CART_PROPERTIES_7" => array(
			0 => "wheels_diameter",
			1 => "wheels_width",
			2 => "wheels_aperture",
			3 => "wheels_gab",
			4 => "wheels_center",
			5 => "",
		),
		"ADDITIONAL_PICT_PROP_7" => "MORE_PHOTO",
		"OFFER_TREE_PROPS_7" => array(
			0 => "wheels_diameter",
			1 => "wheels_width",
			2 => "wheels_aperture",
			3 => "wheels_gab",
			4 => "wheels_center",
		)
	),
	false
);?><br>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>