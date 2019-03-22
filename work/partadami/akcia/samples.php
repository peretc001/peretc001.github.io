<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
		<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
   			<div class="slides"></div>
    		<h3 class="title"></h3>
   			<a class="prev">‹</a>
    		<a class="next">›</a>
    		<a class="close">×</a>
    		<ol class="indicator"></ol>
		</div>
		
<div id="akcia">
	<div class="introHolder">
		<h1>Образцы со скидкой</h1>
	</div>		
	<div class="row">
		
		<div class="one-half column box">
			<p class="skidka">40%</p>
			<p class="name">
				<a>Тумба выкатная 2 ящика + пенал<br>(собранный образец)</a>
			</p>
			<p class="model">Модель:ТУВ.01Р</p>
			<div id="links2">
				<p class="img">
					<a href="/akcia/img/turgeneva/9.jpg"><img src="/akcia/img/turgeneva/9.jpg"></a>
					<a href="/akcia/img/turgeneva/12.jpg" data-gallery><img class="data_img" src="/akcia/img/turgeneva/12.jpg"></a>
				</p>
			</div>
			<p class="price">Цена: <span class="old">&nbsp;9950&nbsp;</span> <span class="new">6000</span> руб.</p>
			<p class="kredit">* В магазине на Тургенева<br>* Подробности по телефону: 8-918-098-28-59</p>
		</div>
		<div class="one-half column box">
			<p class="skidka">35%</p>
			<p class="name">
				<a>Стеллаж для книг<br>(собранный образец)</a>
			</p>
			<p class="model">Модель: СМД.04-01Р</p>
			<div id="links3">
				<p class="img">
					<a href="/akcia/img/turgeneva/13.jpg"><img src="/akcia/img/turgeneva/13.jpg"></a>
					<a href="/akcia/img/turgeneva/14.jpg" data-gallery><img class="data_img" src="/akcia/img/turgeneva/14.jpg"></a>
				</p>
			</div><p class="price">Цена: <span class="old">&nbsp;14850&nbsp;</span> <span class="new">9650</span> руб.</p>
			<p class="kredit">* Подробности по телефону: 8-918-098-28-59</p>
		</div>
		
	</div>
</div>
<script>
	document.getElementById('links').onclick = function (event) {
		event = event || window.event;
		var target = event.target || event.srcElement,
		link = target.src ? target.parentNode : target,
		options = {index: link, event: event, toggleControlsOnSlideClick: false},
		links = this.getElementsByTagName('a');
		blueimp.Gallery(links, options);
	};
</script>
<script>
	document.getElementById('links2').onclick = function (event) {
		event = event || window.event;
		var target = event.target || event.srcElement,
		link = target.src ? target.parentNode : target,
		options = {index: link, event: event, toggleControlsOnSlideClick: false},
		links = this.getElementsByTagName('a');
		blueimp.Gallery(links, options);
	};
</script>
<script>
	document.getElementById('links3').onclick = function (event) {
		event = event || window.event;
		var target = event.target || event.srcElement,
		link = target.src ? target.parentNode : target,
		options = {index: link, event: event, toggleControlsOnSlideClick: false},
		links = this.getElementsByTagName('a');
		blueimp.Gallery(links, options);
	};
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>