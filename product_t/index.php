<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Продукт");
?><?
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
	"product", 
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
			5 => "model",
			6 => "tyre_load",
			7 => "INDEKS_NAGRUZKI_I_SKOROSTI",
			8 => "",
			9 => "",
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
		"COMPONENT_TEMPLATE" => "product",
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
		"DISPLAY_COMPARE" => "N",
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
		"OFFERS_CART_PROPERTIES" => ""
	),
	false
);
    }
}
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>