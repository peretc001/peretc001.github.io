<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<div class="col-sm-6 col-lg-4">
<ul>

<?
$i = 1;
foreach($arResult as $arItem):
	if ($i != 5 && $i != 9) {
?>
	<?if($arItem["SELECTED"]):?>
		<li class="selected"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li><b class="r1"></b><b class="r0"></b><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a><b class="r0"></b><b class="r1"></b></li>
	<?endif?>
	
<? if ($i == 4) { 
	echo '</ul></div><div class="col-sm-6 col-lg-4"><ul>';
}

	}
$i++;
endforeach?>
</ul>
</div>		
<?endif?>