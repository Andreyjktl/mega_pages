<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Акции и скидки");
?>
<?
CModule::IncludeModule('catalog');

$IDs = array();
$db = CCatalogDiscount::GetDiscountProductsList();
while ($arProducts = $db->Fetch()){
    $arIDs[] = $arProducts['PRODUCT_ID'];
}

$arSorted = array();
if(count($arIDs)>0){
    $arFilter = Array("ID"=>$arIDs, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, array('ID', 'IBLOCK_ID'));
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        if($arFields['IBLOCK_ID']==5)
            $arSorted[$arFields['IBLOCK_ID']][] = $arFields['ID'];
        elseif($arFields['IBLOCK_ID']==7)
            $arSorted[$arFields['IBLOCK_ID']][] = $arFields['ID'];
    }
}

global $arrFilter;

if(isset($arSorted[5])&&count($arSorted[5])>0){
    echo '<h2>Шины</h2>';
    $arrFilter = array('ID'=>$arSorted[5]);
    $APPLICATION->IncludeComponent(
            "bitrix:catalog.section",
            "filter_result",
            Array(
                    "AJAX_MODE" => "N",
                    "IBLOCK_TYPE" => "catalog",
                    "IBLOCK_ID" => "5",
                    "SECTION_ID" => $_REQUEST["SECTION_ID"],
                    "SECTION_CODE" => "",
                    "SECTION_USER_FIELDS" => array(),
                    "ELEMENT_SORT_FIELD" => "sort",
                    "ELEMENT_SORT_ORDER" => "asc",
                    "FILTER_NAME" => "arrFilter",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "SHOW_ALL_WO_SECTION" => "N",
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
                    "ADD_SECTIONS_CHAIN" => "N",
                    "DISPLAY_COMPARE" => "N",
                    "SET_TITLE" => "N",
                    "SET_STATUS_404" => "N",
                    "PAGE_ELEMENT_COUNT" => "30",
                    "LINE_ELEMENT_COUNT" => strpos(SITE_TEMPLATE_ID, "one")!==false?5:4,
                    "PROPERTY_CODE" => array('model'),
                    "PRICE_CODE" => array("BASE"),
                    "USE_PRICE_COUNT" => "N",
                    "SHOW_PRICE_COUNT" => "1",
                    "PRICE_VAT_INCLUDE" => "Y",
                    "PRODUCT_PROPERTIES" => array(),
                    "USE_PRODUCT_QUANTITY" => "Y",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_NOTES" => "",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "PAGER_TITLE" => "Товары",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "AJAX_OPTION_SHADOW" => "Y",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_ADDITIONAL" => ""
            )
    );
}?>

<?
if(isset($arSorted[7])&&count($arSorted[7])>0){
    echo '<h2>Диски</h2>';
    $arrFilter = array('ID'=>$arSorted[7]);
    $APPLICATION->IncludeComponent(
            "bitrix:catalog.section",
            "filter_result",
            Array(
                    "AJAX_MODE" => "N",
                    "IBLOCK_TYPE" => "catalog",
                    "IBLOCK_ID" => "7",
                    "SECTION_ID" => $_REQUEST["SECTION_ID"],
                    "SECTION_CODE" => "",
                    "SECTION_USER_FIELDS" => array(),
                    "ELEMENT_SORT_FIELD" => "sort",
                    "ELEMENT_SORT_ORDER" => "asc",
                    "FILTER_NAME" => "arrFilter",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "SHOW_ALL_WO_SECTION" => "N",
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
                    "ADD_SECTIONS_CHAIN" => "N",
                    "DISPLAY_COMPARE" => "N",
                    "SET_TITLE" => "N",
                    "SET_STATUS_404" => "N",
                    "PAGE_ELEMENT_COUNT" => "30",
                    "LINE_ELEMENT_COUNT" => strpos(SITE_TEMPLATE_ID, "one")!==false?5:4,
                    "PROPERTY_CODE" => array('model'),
                    "PRICE_CODE" => array("BASE"),
                    "USE_PRICE_COUNT" => "N",
                    "SHOW_PRICE_COUNT" => "1",
                    "PRICE_VAT_INCLUDE" => "Y",
                    "PRODUCT_PROPERTIES" => array(),
                    "USE_PRODUCT_QUANTITY" => "Y",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_NOTES" => "",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "PAGER_TITLE" => "Товары",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "AJAX_OPTION_SHADOW" => "Y",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_ADDITIONAL" => ""
            )
    );
}

?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
