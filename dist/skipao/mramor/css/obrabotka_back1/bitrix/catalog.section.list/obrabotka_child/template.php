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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
	'TILE' => array(
		'TITLE' => 'catalog-section-list-item-title',
		'LIST' =>  'catalog-section-list-tile-list row mb-4',
		'EMPTY_IMG' => $this->GetFolder().'/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));


?>
		<? 
		

		// if (0 < $arResult["SECTIONS_COUNT"] && $arResult['SECTION']['DEPTH_LEVEL'] < 1 )
		// {
		?><?

			// switch ($arParams['VIEW_MODE'])
			// {
				

			// 	case 'TILE':
			// 		foreach ($arResult['SECTIONS'] as &$arSection)
			// 		{
			// 			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			// 			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

						
							?>
							<!-- <div class="col-md-6 col-lg-3" data-aos="fade-up">						
								<a
									href="<? #echo $arSection['SECTION_PAGE_URL']; ?>"
									title="<? #echo $arSection['PICTURE']['TITLE']; ?>"
									>
									<span class="img_wrap bordered">
										<img src="<? #echo $arSection['PICTURE']['SRC'] ? $arSection['PICTURE']['SRC'] : $arCurView['EMPTY_IMG']; ?>" alt="<? #echo $arSection['NAME']; ?>">
									</span>
									<? #echo $arSection['NAME']; ?>
								</a>
							</div> -->
						<?
			// 		}
			// 		unset($arSection);
			// 		break;

				
			// }
			?><?
		// }
		?>