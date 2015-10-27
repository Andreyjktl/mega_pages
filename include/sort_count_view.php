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
