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
<div class="page-caption">
		<h1><?$APPLICATION->ShowTitle(false)?></h1>
	</div>
<div class="row">
	<?foreach($arResult["ITEMS"] as $arItem):
		$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>255, 'height'=>205), BX_RESIZE_IMAGE_EXACT, true);
	?>
	<div class="col-lg-6">
		<div class="row">
			<div class="col-5">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="img_wrap mb-3">
					<img 
						class="lazy" 
						data-src="<?=$file["src"]?>" 
						src="<?=SITE_TEMPLATE_PATH?>/img/grey.jpg"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
					>
				</a>
			</div>
			<div class="col-7">
				<p>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<span>
							<? echo $arItem["PROPERTIES"]["SALE"]["VALUE"]?>
						</span>
					</a>
				</p>
				<p>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<?echo $arItem["NAME"]?>
					</a>
				</p>
			</div>
		</div>
	</div>
	<?endforeach?>
</div>
