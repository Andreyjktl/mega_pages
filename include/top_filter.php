<div style="width:47%; float:left; margin-top: 20px;">
	<h2 style="color: #2F404E; font-size: 28px; line-height: 28px; margin: 0; padding: 0; margin-bottom: 10px; text-align: center;"> Подбор шин</h2>
 <img width="83" src="/bitrix/templates/mega_template/images/filter_tyre.png" height="130" style="margin-top:20px; margin-left:10px;" align="left">
<div style="    background-color: #EAEAEA;
    border-radius: 15px;
    padding-top: 10px;
    padding-bottom: 10px;">
<?
				$APPLICATION->IncludeComponent(
	"dvs:dvs.filter", 
	"filter_tyres", 
	array(
		"IBLOCK_ID" => "5",
		"B_IBLOCK_ID" => "4",
		"W_IBLOCK_ID" => "7",
		"W_B_IBLOCK_ID" => "6",
		"A_IBLOCK_ID" => "8",
		"COMPONENT_TEMPLATE" => "filter_wheels",
		"USER_PROPERTY_NAME" => ""
	),
	false
);
				?>  </div>
</div>
<div style="width:47%; float:right; margin-top: 20px;">
	<h2 style="color: #2F404E; font-size: 28px; line-height: 28px; margin: 0; padding: 0; margin-bottom: 10px; text-align: center;"> Подбор дисков</h2>
<div style="    background-color: #EAEAEA;
    border-radius: 15px;
    padding-top: 10px;
    padding-bottom: 10px;"> <img width="126" src="/bitrix/templates/mega_template/images/filter_disk.png" height="117" style="margin-top:20px; margin-right:10px;" align="right">
	<?
				$APPLICATION->IncludeComponent(
	"dvs:dvs.filter", 
	"filter_wheels", 
	array(
		"IBLOCK_ID" => "5",
		"B_IBLOCK_ID" => "4",
		"W_IBLOCK_ID" => "7",
		"W_B_IBLOCK_ID" => "6",
		"A_IBLOCK_ID" => "8",
		"COMPONENT_TEMPLATE" => "filter_wheels",
		"USER_PROPERTY_NAME" => ""
	),
	false
);
	?> </div>
</div>
<div style="clear:both">
</div>
 &nbsp;<br>