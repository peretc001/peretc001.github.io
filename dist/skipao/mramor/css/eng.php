<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Stone products");
$APPLICATION->AddChainItem($APPLICATION->GetTitle());
?>
<section class="eng">
	<div class="container">
		<div class="page-caption">
			<h1>For our foreign guests</h1>
		</div>
		<div class="page-caption">
			<p>
				The company "Hozyaika Mednoy Gory" Ltd. was founded in February 1998.In the beginning of his career engaged in the supply of Sayan marble Kibik-Kordonsky deposits for the entire Krasnodar region.<br>
				The company has expanded gradually the product range, warehouse space, introduced the production facilities.
			</p>
		</div>

		<div class="page-caption">
			<h2>The company offers today services in five directions</h2>
		</div>

		<div class="row">
			<div class="col-md-6">
				<p><b>1. Realization of natural stone</b></p>
				<p>Onyx, marble, granite, quartzite, travertine, slate, semi-precious stones, in 
				tiles and slabs.</p>
				<p>Direct deliveries from Italy, Spain, Brazil, Greece, India, 
				Turkey, Norway, Finland, France, Madagascar, China, Kazakhstan and Russia.
				</p>

				<p class="mt-2">Varieties of treated surface:</p>
				<div class="row align-items-end">
					<ul class="col-lg-4">
						<li>- grinded;</li>
						<li>-polished;</li>
						<li>- bush hammered;</li>
						<li>- cut stones' texture</li>
					</ul>
					<ul class="col-lg-7">
						<li>- heat treated (baked);</li>
						<li>- aged (antique);</li>
						<li>- aqua (high pressure water treatment);</li>
					</ul>
				</div>

				<p class="mt-3">
					<b>2. Production of natural stone goods.</b>
				</p>
				<p>
					Table-tops, steps, window sills, fireplaces, columns, balusters, 
					panel pictures and decoration elements
				</p>

				<p class="mt-2">
					<b>3. Sale of the professional tool:</b>
				</p>
				<p>
					diamond, abrasive, hard-alloy, machines and the equipment 
					for processing of a stone; 
				</p>
			</div>
			<div class="col-md-6">
				<p>
					<b>4. Stone processing services:</b>
				</p>
				<ul>
					<li>-cutting stone slabs according to the demanded size;</li>
					<li>-edge processing (more than 20 types of processing);</li>
					<li>-restoration of products;</li>
					<li>-grinding, polishing of surfaces;</li>
					<li>-works by sandblasting - application of the text on the stone surface;</li>
					<li>-application of anti-slip elements;</li>
				</ul>
				<p class="mt-4">
					<b>5. Sale of glues and sealants for stone, chemical compositions for care, 
					cleaning and protection of products from natural stone:</b>
				</p>
				<p>
					hydrophobic and sealing impregnations, compositions on a wax and 
					silicone basis, soft soap for daily care, protection from stains, cleaners
					of a mold, fat stains, salt deposits, drawings of graffiti, chewing gum, 
					cement and other stains, preparations with effect of strengthening of color
					of a stone.
				</p>
				<p class="mt-2">
					Among our clients are owners of private houses and apartments, hotels
					and resorts in Krasnodar, on the coast of the Black and Azov seas, as well 
					as public and private organizations.
				</p>
			</div>
		</div>

		<div class="page-caption mt-170">
			<h2>
				Natural stone catalog
			</h2>
		</div>

		<div class="cards">
			<a href="/stones/granit/">Granite</a>
			<a href="/stones/mramor/">Marble</a>
			<a href="/stones/oniks/">Onyx</a>
			<a href="/stones/kvartsit/">Quartzite</a>
			<a href="/stones/kamen-kolotoy-faktury/">Sledged<br> stones</a>
			<a href="/stones/kvartsevyy-aglomerat/">Quartz<br> agglomerate</a>
			<a href="/stones/travertin-slanets-peschanik/">Travertine</a>
			<a href="/stones/slanets/">Slate</a>
			<a href="/stones/peschanik/">Sandstone</a>
			<a href="/stones/kamni-v-raskladke-babochka/"><small>The stones in BUTTERFLY schematic</small></a>
			<a href="/stones/mramor-mozaika/">Mosaic made of natural stone</a>
			<a href="/stones/samotsvety/">Semiprecious<br> stones</a>
		</div>

		<div class="page-caption mt-170">
			<h3>
				All for stone processing 
			</h3>
		</div>

		<div class="cards instruments">
			<a href="/obrabotka/almaznyy-instrument-dlya-kamneobrabotki/">Diamond tools</a>
			<a href="/obrabotka/abrazivnyy-instrument/">Abrasive tools</a>
			<a href="/obrabotka/tverdosplavnyy-instrument/">Carbide tools</a>
			<a href="/obrabotka/prochiy-instrument/">Others tools</a>
			<a href="/obrabotka/kamneobrabatyvayushchee-oborudovanie/">Stone processing<br> equipment</a>
			<a href="/obrabotka/elektro-i-pnevmoinstrument/">Electric and<br> pneumatic tools</a>
			<a href="/obrabotka/kley-dlya-kamnya/">Glue</a>
			<a href="/obrabotka/professionalnaya-khimiya-i-preparaty-dlya-kamnya/">Professional chemical products<br> for stone processing</a>
		</div>

	</div>
</section>
<?$APPLICATION->IncludeComponent(
  "bitrix:main.include",
  "",
  Array(
    "AREA_FILE_SHOW" => "file",
    "AREA_FILE_SUFFIX" => "",
    "EDIT_TEMPLATE" => "",
    "PATH" => "/include/eng_gallery.php"
  )
);?>

<section class="eng">
	<div class="container">
		<div class="page-caption mt-170">
			<h3>
				Corporate details
			</h3>
		</div>
		<div class="row pb-5">
			<div class="col-md-6 col-lg-5 offset-lg-1">
				<p>
					Individual entrepreneur Sapyan Galina Nikolaevna<br>
					Legal address: 350000 Krasnodar, Chapaeva str., 149-1<br>
					INN 231000254481 OGRN 304231008300061
				</p>
			</div>
			<div class="col-md-6">
				<p>
					E-mail: <a href="mailto:hmg@mramor23.ru">hmg@mramor23.ru</a><br>
					skype: mramor_menedger	
				</p>
			</div>
		</div>
	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>