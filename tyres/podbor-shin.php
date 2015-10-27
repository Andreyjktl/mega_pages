<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords_inner", "����, ������������� ����");
$APPLICATION->SetPageProperty("title", "������ ���");
$APPLICATION->SetPageProperty("keywords", "������ ���, ������������� ����");
$APPLICATION->SetPageProperty("description", "������ ��� �� ���������������");
$APPLICATION->SetTitle("������ ���");
?>
<?
// �������� �������� ���������� �� ���� ��� ������ ���������
$view = $APPLICATION->get_cookie('view') ? $APPLICATION->get_cookie("view")  : "mega_filter_result"; 
$sort = $APPLICATION->get_cookie('sort') ? $APPLICATION->get_cookie("sort")  : "sort_asc";
$element_count = $APPLICATION->get_cookie('element_count') ? $APPLICATION->get_cookie("element_count")  : "25";

// ������������� ���� � ����������� �������� ��������������� ����������, ���� ������� ���� � REQUEST
if(isset($_REQUEST["view"]) ) {
   $APPLICATION->set_cookie("view", strVal($_REQUEST["view"]) ); 
   $view = strVal($_REQUEST["view"]) ;
   }
   
if(isset($_REQUEST["sort"]) ) {
   $APPLICATION->set_cookie("sort", strVal($_REQUEST["sort"] )); 
   $sort = strVal($_REQUEST["sort"]) ;
   }
if(isset($_REQUEST["element_count"]) ) {
   $APPLICATION->set_cookie("element_count", strVal($_REQUEST["element_count"] )); 
   $element_count = strVal($_REQUEST["element_count"]) ;
   }



// �������� ���������� sort �� ��� element_sort_field � element_sort_order, � ������ �������� (price -> catalog_PRICE_1)
$ar_sort=explode("_", $sort);
$element_sort_field = ($ar_sort[0] == "price" )  ? "catalog_PRICE_1" : $ar_sort[0];
$element_sort_order = $ar_sort[1];


?>

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
);?>��<br>
	</div>

<div class="col_right">

<!--/noindex-->

<table  class="selectors" >
<tr>
 <td align="left">
	 �� ����:

      <a<?if($sort=="price_desc") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("sort=price_desc", Array("view", "sort") )?>" rel="nofollow">&#9660;</a>  
 <a<?if($sort=="price_asc") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("sort=price_asc", Array("view", "sort") )?>" rel="nofollow">&#9650;</a>   �� |��  
   <a<?if($sort=="sort_asc") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("sort=sort_asc", Array("view", "sort") )?>" rel="nofollow">�� �������</a>
 </td>

 <td align="center">
	 ���������� ��:
<a<?if($element_count=="25") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("element_count=25", Array("element_count","view", "sort") )?>" rel="nofollow">25</a>�| � 
			<a<?if($element_count=="50") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("element_count=50", Array("element_count", "view", "sort") )?>" rel="nofollow">50</a>  �|
			<a<?if($element_count=="100") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("element_count=100", Array("element_count", "view", "sort") )?>" rel="nofollow">100</a>  
 </td>

   <td align="right">

		<div class="selectors_switch" ><a<?if($view=="mega_filter_result") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("view=mega_filter_result", Array("view", "sort") )?>" rel="nofollow"> <img src="<?echo SITE_TEMPLATE_PATH?>/images/icons/price.png" width="15" height="15" alt="" /></a>�| � 
			<a<?if($view=="filter_result") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("view=filter_result", Array("view", "sort") )?>" rel="nofollow"><img src="<?echo SITE_TEMPLATE_PATH?>/images/icons/detail.png" width="15" height="15" alt="" /></a>  �|
			<a<?if($view=="mega_list") :?> style="font-weight:bold"<?endif?> href="<?=$APPLICATION->GetCurPageParam("view=mega_list", Array("view", "sort") )?>" rel="nofollow"><img src="<?echo SITE_TEMPLATE_PATH?>/images/icons/list.png" width="15" height="15" alt="" /></a>  

	   </div>

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
		"PAGE_ELEMENT_COUNT" => $element_count,
		"LINE_ELEMENT_COUNT" => "4",
		"PROPERTY_CODE" => array(0=>"tyre_width",1=>"tyre_height",2=>"tyre_diameter",3=>"tyre_on_index",4=>"hit",5=>"model",6=>"TIP",7=>"SEZON",8=>"CML2_ARTICLE",9=>"CML2_BASE_UNIT",10=>"tyre_load",11=>"order",12=>"CML2_MANUFACTURER",13=>"CML2_TRAITS",14=>"CML2_TAXES",15=>"CML2_ATTRIBUTES",16=>"SHIP_NE_SHIP",17=>"CML2_BAR_CODE",18=>"BRENDDISKI",19=>"tyre_speed",20=>"DOPINFO",21=>"DIAMETRDISKI",22=>"title",23=>"keywords",24=>"description",25=>"TIPDISKI",26=>"SHIRINADISKI",27=>"INDEKS_NAGRUZKI_I_SKOROSTI",28=>"INDEKS_SKOROSTI",29=>"TIP_1",30=>"KOL_VO_OTVERSTIY",31=>"PCD",32=>"VYLET_ET",33=>"DIA",34=>"TSVET",35=>"DOP_SVEDENIE",36=>"ARTIKUL",37=>"BREND",38=>"MODELDISKI",39=>"SHIPOVANNYE",40=>"SEZON_1",41=>"PROFIL",42=>"DIAMETR",43=>"SHIRINA",44=>"",),
		"OFFERS_LIMIT" => "4",
		"TEMPLATE_THEME" => "blue",
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"MESS_BTN_BUY" => "������",
		"MESS_BTN_ADD_TO_BASKET" => "� �������",
		"MESS_BTN_SUBSCRIBE" => "�����������",
		"MESS_BTN_DETAIL" => "���������",
		"MESS_NOT_AVAILABLE" => "��� � �������",
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
		"PRICE_CODE" => array(0=>"������� ����� ����",),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "Y",
		"BASKET_URL" => "/personal/basket.php",
		"USE_PRODUCT_QUANTITY" => "Y",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(),
		"ADD_TO_BASKET_ACTION" => "ADD",
		"DISPLAY_COMPARE" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "������",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"MESS_BTN_COMPARE" => "��������",
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
	
	</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>