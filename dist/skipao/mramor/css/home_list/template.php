<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';
?>
<div class="caption text-center">
	<h1><?$APPLICATION->ShowTitle(false)?></h1>
</div>
<div class="row">
	<?foreach($arResult["ITEMS"] as $arItem):
		$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>255, 'height'=>205), BX_RESIZE_IMAGE_EXACT, true);
	?>
	<div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="50">
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="img_wrap mb-3">
			<img 
				class="lazy" 
				data-src="<?=$file["src"]?>"
				src="<?=SITE_TEMPLATE_PATH?>/img/grey.jpg"
				alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
				title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
			>
		</a>
		<p><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></p>
		<p><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></a></p>
	</div>
	<?endforeach?>
</div>
