<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("fileman");
CMedialib::Init();
$arItems = CMedialibItem::GetList(array('arCollections' => array("0" => 26)));

if(count($arItems)):?>
	<section class="products-gallary">
        <div class="container">
            <div class="products-gallary__wrap">
			<?
			$i = 1;
			foreach($arItems as $PHOTO):
				if ($i == 4 || $i == 7) 
				{
					$file = CFile::ResizeImageGet($PHOTO, array('width'=>360, 'height'=>300), BX_RESIZE_IMAGE_EXACT, true);
				}
				else if ($i == 5 || $i == 6) 
				{
					$file = CFile::ResizeImageGet($PHOTO, array('width'=>735, 'height'=>300), BX_RESIZE_IMAGE_EXACT, true);
				}  
				else 
				{
					$file = CFile::ResizeImageGet($PHOTO, array('width'=>360, 'height'=>240), BX_RESIZE_IMAGE_EXACT, true);
				} ?>
				<div class="products-gallary__wrap__item" data-aos="fade-up">		
                    <a href="<?=$PHOTO["PATH"]?>" class="img_wrap" data-fancybox="gallary" data-caption="<p><?php echo $PHOTO['DESCRIPTION']; ?></p>">
                        <img src="<?=$file["src"]?>" alt="<?php echo $PHOTO['DESCRIPTION']; ?>" title="<?=$PHOTO["DESCRIPTION"]?>">
                    </a>
                </div>
			<? $i++; endforeach?>
            </div>
		</div>
	</section>
<?endif?>