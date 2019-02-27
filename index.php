<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>mompopko</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="MomPopKo" />
	<link href="public/css/style.css" rel="stylesheet" />
	<link href="public/css/bootstrap.min.css" rel="stylesheet" />
	<link href="public/css/fontawesome-all.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"/>
	<link href='public/fonts/NanumSquare/nanumsquare.css' rel='stylesheet' type='text/css'/>

	<script type="text/javascript" src="public/js/jquery.min.js"></script>
	<script type="text/javascript">
        $(function() {
			var $ui = $('#top_search');

			$ui.find('.sb_input_keyword').bind('focus click',function(){
				$ui.find('.sb_keyword')
				   .show();
			});
			$ui.find('.sb_input_location').bind('focus click',function(){
				$ui.find('.sb_location')
				   .show();
			});

			$ui.bind('mouseleave',function(){
				$ui.find('.sb_dropdown')
				   .hide();
			});
        });
    </script>

	<script type="text/javascript">
		$(window).scroll(function() {
		    if ($(this).scrollTop() > 50){  
		        $('#top-logo').addClass("sticky");
		        $('#top-sns').addClass("sticky");
		        $('#top_search').addClass("shrink");
		    }
		    else{
		        $('#top-logo').removeClass("sticky");
		        $('#top-sns').removeClass("sticky");
		        $('#top_search').removeClass("shrink");
		    }
		});
	</script>

<script type="text/javascript">
	var ajax_biz = new XMLHttpRequest();
	ajax_biz.open("POST", "php/biz_db_recent.php", true);
	ajax_biz.send();
	ajax_biz.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var result = JSON.parse(this.responseText);
			console.log(result);
			var offset=0;
			for (var i = offset; i < result.length && i<offset+9; i++){
				var biz_name = result[i].biz_name;
				var biz_level = result[i].biz_level;
				var biz_id = result[i].biz_id;
				var main_div_recent = document.querySelector('#recent');
				main_div_recent.innerHTML += 
				`<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="thumb-box">
						<div class="thumb-img">
							<a href="php/mamalee_level_`+biz_level+`.php?biz_id=`+biz_id+`">
								<img src=${result[i]['file_path'].replace('/var/www/html/',"public/")} width="100%" alt="" />
							</a>
						</div>
						<div class="thumb-content">
							<h5 class="thumb-category">
								<span class="main" class="menu_zero_span"></span>
								<span class="sub" class="menu_sub_cat">Korean</span>
							</h5>
							<span class="img_two"><span/>
								<div class="row">
									<div class="col-xs-7 thumb-name">
										<span>`+biz_name+`</span>
										<div style="color: #999;">(level `+biz_level+`)</div>
									</div>
									<div class="col-xs-5 thumb-product">
											<span class="img_two"><span/>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>`;
			}
			offset = offset + 8;
			var recent_button = document.querySelector('#recent_button');
			recent_button.innerHTML = `<button class="btn btn-more" data-toggle="collapse" data-target="#moreThumb">See More</button>`;
		};
	}
	</script>
	<script type="text/javascript">
	ajax_pop = new XMLHttpRequest();
	ajax_pop.open("POST", "php/biz_db_popular.php", true);
	ajax_pop.send();
	ajax_pop.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var result = JSON.parse(this.responseText);
			var offset=0;
			for (var i = offset; i < result.length && i<offset+9; i++){
				var biz_name = result[i].biz_name;
				var biz_level = result[i].biz_level;
				var main_div_popular = document.querySelector('#popular');
				main_div_popular.innerHTML += 
				`<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="thumb-box">
						<div class="thumb-img">
							<a href="mamalee_level_`+biz_level+`.php?biz_name=`+biz_name+`">
							</a>
						</div>
						<div class="thumb-content">
							<h5 class="thumb-category">
								<span class="main" class="menu_zero_span"></span>
								<span class="sub" class="menu_sub_cat">Korean</span>
							</h5>
							<a href="mamalee_level_`+biz_level+`.php?biz_name=`+biz_name+`">
								<div class="row">
									<div class="col-xs-7 thumb-name">
										<span>`+biz_name+`</span>
										<div style="color: #999;">(level `+biz_level+`)</div>
									</div>
									<div class="col-xs-5 thumb-product">
										<img src="img/openings/MamaleeMarket_2.jpg" width="100%" class="img2 alt="" />
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>`;
			}
			offset = offset + 8;
			var recent_button = document.querySelector('#recent_button');
			recent_button.innerHTML = `<button class="btn btn-more" data-toggle="collapse" data-target="#moreThumb">See More</button>`;
		};
	}
	</script>

<!-- <script type="text/javascript">
	file_grp_id, file_id, file_order, file_logic_name, file_physic_name, file_path, file_extension
		var ajax_biz = new XMLHttpRequest();
		ajax_biz.open("POST", "../php/db_file", true);
		ajax_biz.send();
		ajax_biz.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var result = JSON.parse(this.responseText);
				for (var i = 0; i< result.length; i++) {
					var file_grp_id = result[i].file_grp_id;
					var file_order = result[i].file_order;
					var file_path = result.[i].file_path;
					var file_physic_name = result[i].file_physic_name;
					var file_logic_name = result.[i].file_logic_name;
					var img1 = document.querySelectorAll(.img_one);
					var img2 = document.querySelectorAll(.img_two);
					if (file_grp_id == 1 && file_order == 1){
						imh1.innerHTML = "<img src='`+file_path+file_physical_name+file_logic_name+`' width='100%'/>"
					}
					if (file_grp_id == 2 && file_order == 2)''
						img2.innerHTML = "<img src='`/prototype/img/stock-vector-arouse-water-wave-representation-emblem-1221620014.jpg' width='100%'/>"
					}
					if (file_grp_id == 1 && file_order == 1){
						
					}
					if (file_grp_id == 2 && file_order == 2){
						
					}
					if (file_grp_id == 3 && file_order == 1){
						
					}
					if (file_grp_id == 3 && file_order == 2){
						
					}
					if (file_grp_id == 4 && file_order == 1){
						
					}
					if (file_grp_id == 4 && file_order == 2){
						
					}
					if (file_grp_id == 5 && file_order == 1){
						
					}
					if (file_grp_id == 5 && file_order == 2){
						
					}
					if (file_grp_id == 6 && file_order == 1){
						
					}
					if (file_grp_id == 6 && file_order == 2){
						
					}
					if (file_grp_id == 7 && file_order == 1){
						
					}
					if (file_grp_id == 7 && file_order == 2){
						
					}
				}}
	</script> -->
<!-- 
	<script type="text/javascript">
	var ajax_img = new XMLHttpRequest();
	ajax_img.open("POST", "../php/db.php", true);
	ajax_img.send();
	ajax_img.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var result = JSON.parse(this.responseText);
			// var menu_level = result.menu_level;
			// var menu_name_span = result.menu_name;
			// var menu_name_level = result.menu_page_yn;
			// console.log(menu_name_span);
			// for (var i = 0; i < result.length && menu_name_level == 1; i++){
			// 		var menu_zero_span = document.querySelectorAll('.menu_zero_span');
			// 		menu_zero_span.innerHTML = menu_name;
			// 		console.log(menu_zero_span);
			// 	}
			// 	console.log(menu_name);
			for (var i = 0; i < result.length; i++){
				var upper_menu_id = result[i].upper_menu_id;
				var menu_name = result[i].menu_name;
				if (upper_menu_id == 2){
					var restaurants_dropdown = document.querySelector("#restaurants_dropdown");
					var restaurants_hamburger = document.querySelector("#restaurants_hamburger");

					restaurants_dropdown.innerHTML += "<li><a>"+menu_name+"</a></li>";
					restaurants_hamburger.innerHTML += "<li><a>"+menu_name+"</a></li>";
				}}


				<script> -->

	<script type="text/javascript">
	var ajax = new XMLHttpRequest();
	ajax.open("POST", "php/db.php", true);
	ajax.send();
	ajax.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var result = JSON.parse(this.responseText);
			// var menu_level = result.menu_level;
			// var menu_name_span = result.menu_name;
			// var menu_name_level = result.menu_page_yn;
			// console.log(menu_name_span);
			// for (var i = 0; i < result.length && menu_name_level == 1; i++){
			// 		var menu_zero_span = document.querySelectorAll('.menu_zero_span');
			// 		menu_zero_span.innerHTML = menu_name;
			// 		console.log(menu_zero_span);
			// 	}
			// 	console.log(menu_name);
			for (var i = 0; i < result.length; i++){
				var upper_menu_id = result[i].upper_menu_id;
				var menu_name = result[i].menu_name;
				if (upper_menu_id == 2){
					var restaurants_dropdown = document.querySelector("#restaurants_dropdown");
					var restaurants_hamburger = document.querySelector("#restaurants_hamburger");

					restaurants_dropdown.innerHTML += "<li><a>"+menu_name+"</a></li>";
					restaurants_hamburger.innerHTML += "<li><a>"+menu_name+"</a></li>";
				}}
				
			for (var i = 0; i < result.length; i++){
				var upper_menu_id = result[i].upper_menu_id;
				var menu_name = result[i].menu_name;
				if (upper_menu_id == 1){
					var main_bars = document.querySelector("#main_bars");
					var main_bars_hamburger = document.querySelector("#main_bars_hamburger");

					main_bars.innerHTML += "<ul class='multi-column-dropdown' id='"+menu_name+"_dropdown'><h5><a>"+menu_name+"</a></h5></ul>";
					main_bars_hamburger.innerHTML += "<ul class='multi-column-dropdown' id='"+menu_name+"_hamburger'><h5><a>"+menu_name+"</a></h5></ul>";
				}}
			
			for (var i = 0; i < result.length; i++){
				var upper_menu_id = result[i].upper_menu_id;
				var menu_name = result[i].menu_name;
				if (upper_menu_id == 15){
					var bars_dropdown = document.querySelector("#Bars_dropdown");
					var bars_hamburger = document.querySelector("#Bars_hamburger");
					
					bars_dropdown.innerHTML += "<li><a>"+menu_name+"</a></li>";
					bars_hamburger.innerHTML += "<li><a>"+menu_name+"</a></li>";
				}}
				
			for (var i = 0; i < result.length; i++){
				var upper_menu_id = result[i].upper_menu_id;
				var menu_name = result[i].menu_name;
				if (upper_menu_id == 24){
					var main_beauty = document.querySelector("#main_beauty");
					var main_beauty_hamburger = document.querySelector("#main_beauty_hamburger");

					main_beauty.innerHTML += "<ul class='multi-column-dropdown' id='"+menu_name+"_dropdown'><h5><a>"+menu_name+"</a></h5></ul>";
					main_beauty_hamburger.innerHTML += "<ul class='multi-column-dropdown' id='"+menu_name+"_hamburger'><h5><a>"+menu_name+"</a></h5></ul>";
				}}

			for (var i = 0; i < result.length; i++){
				var upper_menu_id = result[i].upper_menu_id;
				var menu_name = result[i].menu_name;
				if (upper_menu_id == 48){
					var beauty_dropdown = document.querySelector("#Beauty_dropdown");
					var beauty_hamburger = document.querySelector("#Beauty_hamburger");

					beauty_dropdown.innerHTML += "<li><a>"+menu_name+"</a></li>";
					beauty_hamburger.innerHTML += "<li><a>"+menu_name+"</a></li>";
				}}
	
			for (var i = 0; i < result.length; i++){
				var upper_menu_id = result[i].upper_menu_id;
				var menu_name = result[i].menu_name;
				if (upper_menu_id == 33){
					var fashion_dropdown = document.querySelector("#fashion_dropdown");
					var fashion_hamburger = document.querySelector("#fashion_hamburger");
					
					fashion_dropdown.innerHTML += "<h5><a>"+menu_name+"</a></h5>";
					fashion_hamburger.innerHTML += "<h5><a>"+menu_name+"</a></h5>";
				}}

			for (var i = 0; i < result.length; i++){
				var upper_menu_id = result[i].upper_menu_id;
				var menu_name = result[i].menu_name;
				if (upper_menu_id == 38){
					var entertainment_dropdown = document.querySelector("#entertainment_dropdown");
					var entertainment_hamburger = document.querySelector("#entertainment_hamburger");
					
					entertainment_dropdown.innerHTML += "<h5><a>"+menu_name+"</a></h5>";
					entertainment_hamburger.innerHTML += "<h5><a>"+menu_name+"</a></h5>";
				}}

			for (var i = 0; i < result.length; i++){
				var upper_menu_id = result[i].upper_menu_id;
				var menu_name = result[i].menu_name;
				if (upper_menu_id == 43){
					var services_dropdown = document.querySelector("#services_dropdown");
					var services_hamburger = document.querySelector("#services_hamburger");

					services_dropdown.innerHTML += "<h5><a>"+menu_name+"</a></h5>";
					services_hamburger.innerHTML += "<h5><a>"+menu_name+"</a></h5>";
				}}
			};
		}
</script>

</head>

<body>
	<div id="wrapper">
	<header>
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-4">
						<a href="index.php">
							<img src="public/img/logo.png" id="top-logo" class="top-logo" alt="logo">
						</a>
					</div>
					<div class="col-xs-4"></div>
					<div class="col-xs-4">
						<ul id="top-sns" class="sns-list">
							<li><a><i class="fab fa-facebook-square"></i></a></li>
							<li><a><i class="fab fa-instagram"></i></a></li>
							<li><a><i class="fab fa-youtube"></i></a></li>
						</ul>
						<div class="menu">
							<a data-toggle="collapse" data-target=".navbar-collapse">
								<i class="fas fa-bars"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
	                	<form id="top_search" class="search_wrapper" autocomplete="off">
	                    <div class="sb sb_input_keyword">
							<input type="text" id="sb_keyword_label" value="Find" disabled/>
							<input type="text" placeholder="wine bar, spa, cafe..." id="sb_keyword"/>
						</div>
						<div class="sb sb_input_location">
							<input type="text" id="sb_location_label" value="Near" disabled/>
							<input type="text" placeholder="Seoul, Korea" id="sb_location"/>
						</div>
						<div class="sb">
							<input class="sb_search" type="submit" value=""/>
						</div>
						<ol class="sb_dropdown sb_keyword" style="display:none;">
							<li class="rank_title">
								<a href="">Most Popular</a>
							</li>
							<li class="rank_1">
								<div class="rank">
									<div class="rank_num">1.</div>
								</div>
								<a href="">Taco</a>
							</li>
							<li class="rank_2">
								<div class="rank">
									<div class="rank_num">2.</div>
								</div>
								<a href="">Wine by the Glass</a>
							</li>
							<li class="rank_3">
								<div class="rank">
									<div class="rank_num">3.</div>
								</div>
								<a href="">Nail Art</a>
							</li>
							<li class="rank_4">
								<div class="rank">
									<div class="rank_num">4.</div>
								</div>
								<a href="">Message</a>
							</li>
							<li class="rank_5">
								<div class="rank">
									<div class="rank_num">5.</div>
								</div>
								<a href="">Sauna</a>
							</li>
							<li class="rank_6">
								<div class="rank">
									<div class="rank_num">6.</div>
								</div>
								<a href="">Glasses</a>
							</li>
							<li class="rank_7">
								<div class="rank">
									<div class="rank_num">7.</div>
								</div>
								<a href="">Groceries</a>
							</li>
							<li class="rank_8">
								<div class="rank">
									<div class="rank_num">8.</div>
								</div>
								<a href="">Photography Studio</a>
							</li>
							<li class="rank_9">
								<div class="rank">
									<div class="rank_num">9.</div>
								</div>
								<a href="">Shared Housing</a>
							</li>
							<li class="rank_10">
								<div class="rank">
									<div class="rank_num">10.</div>
								</div>
								<a href="">Golf Range</a>
							</li>
						</ol>
						<ol class="sb_dropdown sb_location" style="display:none;">
							<li class="rank_title">
								<a href="">Most Popular</a>
							</li>
							<li class="rank_1">
								<div class="rank">
									<div class="near"></div>
								</div>
								<a href="">Near Me</a>
							</li>
							<li class="rank_9">
								<div class="rank">
									<div class="rank_num">1.</div>
								</div>
								<a href="">Gangnam</a>
							</li>
							<li class="rank_9">
								<div class="rank">
									<div class="rank_num">2.</div>
								</div>
								<a href="">Itaewon</a>
							</li>
							<li class="rank_9">
								<div class="rank">
									<div class="rank_num">3.</div>
								</div>
								<a href="">Garosugil</a>
							</li>
							<li class="rank_9">
								<div class="rank">
									<div class="rank_num">4.</div>
								</div>
								<a href="">Sinsa Station</a>
							</li>
							<li class="rank_9">
								<div class="rank">
									<div class="rank_num">5.</div>
								</div>
								<a href="">Haebangchon</a>
							</li>
							<li class="rank_9">
								<div class="rank">
									<div class="rank_num">6.</div>
								</div>
								<a href="">Seoul Forest</a>
							</li>
							<li class="rank_9">
								<div class="rank">
									<div class="rank_num">7.</div>
								</div>
								<a href="">Euljiro 3-ga Station</a>
							</li>
							<li class="rank_9">
								<div class="rank">
									<div class="rank_num">8.</div>
								</div>
								<a href="">Hongdae</a>
							</li>
							<li class="rank_9">
								<div class="rank">
									<div class="rank_num">9.</div>
								</div>
								<a href="">Lotte Tower</a>
							</li>
						</ol>
	                	</form>
	            	</div>
				</div>
			</div>
		</div>

		<div class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li id="all-category" class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-bars"></i></a>
							<ul class="dropdown-menu multi-column columns-6">
								<div class="row">
									<div class="col-sm-2">
										<ul class="multi-column-dropdown" id="restaurants_hamburger">
											<h5>Restaurants</h5>
					                    </ul>
					                </div>
					                <div class="col-sm-2" id="main_bars_hamburger">
					                </div>
					                <div class="col-sm-2">
										<ul class="multi-column-dropdown" id="main_beauty_hamburger">
											<h5>Beauty & Health</h5>
					                    </ul>
					                </div>
					                <div class="col-sm-2">
										<ul class="multi-column-dropdown" id="fashion_hamburger">
											<h5>Fashion</h5>
					                    </ul>
					                </div>
					                <div class="col-sm-2">
										<ul class="multi-column-dropdown" id="entertainment_hamburger">
											<h5>Entertainment</h5>
					                    </ul>
					                </div>
					                <div class="col-sm-2">
										<ul class="multi-column-dropdown" id="services_hamburger">
											<h5>Services</h5>
					                    </ul>
					                </div>
					            </div>
					        </ul>
						</li>
						<li class="dropdown">
							<a href="" class="dropdown-toggle" class="main_menu" data-toggle="dropdown">Food & Drink</a>
							<ul class="dropdown-menu multi-column columns-2" id="main_food" >
								<div class="row">
									<div class="col-sm-6">
										<ul class="multi-column-dropdown" id="restaurants_dropdown">
											<h5><a>Restaurants</a></h5>
					                    </ul>
					                </div>
					                <div class="col-sm-6" id="main_bars">
					                </div>
					            </div>
					        </ul>
						</li>
						<li class="dropdown">
							<a href="" class="dropdown-toggle" class="main_menu" data-toggle="dropdown">Beauty & Health</a>
							<ul class="dropdown-menu" id="main_beauty">
		                    </ul>
						</li>
						<li class="dropdown">
							<a href="" class="dropdown-toggle" class="main_menu" data-toggle="dropdown">Fashion</a>
							<ul class="dropdown-menu" id="fashion_dropdown">
		                    </ul>
						</li>
						<li class="dropdown">
							<a href="" class="dropdown-toggle" class="main_menu" data-toggle="dropdown">Entertainment</a>
							<ul class="dropdown-menu" id="entertainment_dropdown">
		                    </ul>
						</li>
						<li class="dropdown">
							<a href="" class="dropdown-toggle" class="main_menu" data-toggle="dropdown">Services</a>
							<ul class="dropdown-menu" id="services_dropdown">
		                    </ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>

	<section id="content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs">
					  	<li><h3 class="title">New Openings</h3></li>
					  	<li class="active"><a data-toggle="tab" href="#recent">[RECENT]</a></li>
					  	<li><a data-toggle="tab" href="#popular">[POPULAR]</a></li>
					  	<li><a data-toggle="tab" href="#trends">[TRENDS]</a></li>
					</ul>
				</div>
				<div class="tab-content">
					<div id="recent" class="tab-pane fade in active">
						<!-- <div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="mamalee_level_2_3.php?biz_name=Mamalee%20Market" id='mamalee' >
										<img src="img/openings/MamaleeMarket_1.jpg" width="100%" alt="" />
									</a>
									</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-utensils"></i>
										<span class="main">Food & Drink</span>
										<span class="sub">Korean</span>
									</h5>
									<a href="mamalee_level_2_3.html">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>Mamalee Market</span>
												<div style="color: #999;">(level 2/3)</div>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="img/openings/MamaleeMarket_2.jpg" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="mamalee_level_1.html">
										<img src="img/openings/MamaleeMarket_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-utensils"></i>
										<span class="main">Food & Drink</span>
										<span class="sub">Korean</span>
									</h5>
									<a href="mamalee_level_1.html">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>Mamalee Market</span>
												<div style="color: #999;">(level 1)</div>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="img/openings/MamaleeMarket_2.jpg" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="mamalee_level_closed.html">
										<img src="img/openings/MamaleeMarket_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-utensils"></i>
										<span class="main">Food & Drink</span>
										<span class="sub">Korean</span>
									</h5>
									<a href="mamalee_level_closed.html">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>Mamalee Market</span>
												<div style="color: #999;">(closed)</div>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="img/openings/MamaleeMarket_2.jpg" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="img/openings/RouseArouse_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-utensils"></i>
										<span class="main">Food & Drink</span>
										<span class="sub">French Bar & Bistro</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>Rouse Arouse</span>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="img/openings/RouseArouse_2.jpg" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="img/openings/AnnBeauty_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-gift"></i>
										<span class="main">Beauty & Health</span>
										<span class="sub">Nail Art Salon</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>Ann Beauty</span>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="img/openings/AnnBeauty_2.png" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="img/openings/PortaRomana_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-gem"></i>
										<span class="main">Fashion</span>
										<span class="sub">Accessories / Handbags</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>Porta Romana</span>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="img/openings/PortaRomana_2.png" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="thumb-box">
									<div class="thumb-img">
										<a href="">
											<img src="img/openings/AllGoodClinic_1.jpg" width="100%" alt="" />
										</a>
									</div>
									<div class="thumb-content">
										<h5 class="thumb-category">
											<i class="fas fa-gift"></i>
											<span class="main">Beauty & Health</span>
											<span class="sub">Acupuncture</span>
										</h5>
										<a href="">
											<div class="row">
												<div class="col-xs-7 thumb-name">
													<span>All Good Clinic</span>
												</div>
												<div class="col-xs-5 thumb-product">
													<img src="img/openings/AllGoodClinic_2.jpg" width="100%" alt="" />
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="img/openings/Woozoo_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-comment"></i>
										<span class="main">Service</span>
										<span class="sub">Accommodations / Shared Housing</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>Woozoo</span>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="img/openings/Woozoo_2.png" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="img/openings/Elliots_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-utensils"></i>
										<span class="main">Food & Drink</span>
										<span class="sub">Cocktail Bar</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>Elliot’s</span>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="img/openings/Elliots_2.jpg" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div id="moreThumb" class="collapse">
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="thumb-box">
									<div class="thumb-img">
										<a href="">
											<img src="img/openings/AyaCoffee_1.jpg" width="100%" alt="" />
										</a>
									</div>
									<div class="thumb-content">
										<h5 class="thumb-category">
											<i class="fas fa-utensils"></i>
											<span class="main">Food & Drink</span>
											<span class="sub">Cafe</span>
										</h5>
										<a href="">
											<div class="row">
												<div class="col-xs-7 thumb-name">
													<span>Aya Coffee</span>
												</div>
												<div class="col-xs-5 thumb-product">
													<img src="img/openings/AyaCoffee_2.png" width="100%" alt="" />
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="thumb-box">
									<div class="thumb-img">
										<a href="">
											<img src="img/openings/AllGoodPilates_1.jpg" width="100%" alt="" />
										</a>
									</div>
									<div class="thumb-content">
										<h5 class="thumb-category">
											<i class="fas fa-gift"></i>
											<span class="main">Beauty & Health</span>
											<span class="sub">Fitness Centers | Pilates</span>
										</h5>
										<a href="">
											<div class="row">
												<div class="col-xs-7 thumb-name">
													<span>All Good Pilates</span>
												</div>
												<div class="col-xs-5 thumb-product">
													<img src="img/openings/AllGoodPilates_2.png" width="100%" alt="" />
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="thumb-box">
									<div class="thumb-img">
										<a href="">
											<img src="img/openings/AllGoodClinic_1.jpg" width="100%" alt="" />
										</a>
									</div>
									<div class="thumb-content">
										<h5 class="thumb-category">
											<i class="fas fa-gift"></i>
											<span class="main">Beauty & Health</span>
											<span class="sub">Acupuncture</span>
										</h5>
										<a href="">
											<div class="row">
												<div class="col-xs-7 thumb-name">
													<span>All Good Clinic</span>
												</div>
												<div class="col-xs-5 thumb-product">
													<img src="img/openings/AllGoodClinic_2.jpg" width="100%" alt="" />
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="thumb-box">
									<div class="thumb-img">
										<a href="">
											<img src="img/openings/ThatGuyThatGirl_1.jpg" width="100%" alt="" />
										</a>
									</div>
									<div class="thumb-content">
										<h5 class="thumb-category">
											<i class="fas fa-comment"></i>
											<span class="main">Service</span>
											<span class="sub">Event Staffing Agency</span>
										</h5>
										<a href="">
											<div class="row">
												<div class="col-xs-7 thumb-name">
													<span>That Guy, That Girl</span>
												</div>
												<div class="col-xs-5 thumb-product"></div>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div> -->
					</div>
						<div class="col-xs-12 alignright mgbottom30" id="recent_button">
							<!-- <button class="btn btn-more" data-toggle="collapse" data-target="#moreThumb">See More</button> -->
						</div>
					</div>
					<div id="popular" class="tab-pane fade">
						<!-- <div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="img/openings/PortaRomana_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-gem"></i>
										<span class="main">Fashion</span>
										<span class="sub">Accessories / Handbags</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>Porta Romana</span>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="img/openings/PortaRomana_2.png" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="img/openings/AyaCoffee_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-utensils"></i>
										<span class="main">Food & Drink</span>
										<span class="sub">Cafe</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>Aya Coffee</span>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="img/openings/AyaCoffee_2.png" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="img/openings/RouseArouse_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-utensils"></i>
										<span class="main">Food & Drink</span>
										<span class="sub">French Bar & Bistro</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>Rouse Arouse</span>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="img/openings/RouseArouse_2.jpg" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="img/openings/AllGoodPilates_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-gift"></i>
										<span class="main">Beauty & Health</span>
										<span class="sub">Fitness Centers | Pilates</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>All Good Pilates</span>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="img/openings/AllGoodPilates_2.png" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="img/openings/MamaleeMarket_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-utensils"></i>
										<span class="main">Food & Drink</span>
										<span class="sub">Korean</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>Mamalee Market</span>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="img/openings/MamaleeMarket_2.jpg" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="img/openings/AnnBeauty_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-gift"></i>
										<span class="main">Beauty & Health</span>
										<span class="sub">Nail Art Salon</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>Ann Beauty</span>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="img/openings/AnnBeauty_2.png" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 alignright mgbottom30">
							<button class="btn btn-more">See More</button>
						</div> -->
					</div>
					<div id="trends" class="tab-pane fade">
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="public/img/openings/AnnBeauty_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-gift"></i>
										<span class="main">Beauty & Health</span>
										<span class="sub">Nail Art Salon</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>Ann Beauty</span>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="public/img/openings/AnnBeauty_2.png" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="public/img/openings/RouseArouse_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-utensils"></i>
										<span class="main">Food & Drink</span>
										<span class="sub">French Bar & Bistro</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>Rouse Arouse</span>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="public/img/openings/RouseArouse_2.jpg" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="public/img/openings/AllGoodPilates_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-gift"></i>
										<span class="main">Beauty & Health</span>
										<span class="sub">Fitness Centers | Pilates</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>All Good Pilates</span>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="public/img/openings/AllGoodPilates_2.png" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="public/img/openings/AllGoodClinic_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-gift"></i>
										<span class="main">Beauty & Health</span>
										<span class="sub">Acupuncture</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>All Good Clinic</span>
											</div>
											<div class="col-xs-5 thumb-product">
												<img src="public/img/openings/AllGoodClinic_2.jpg" width="100%" alt="" />
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="thumb-box">
								<div class="thumb-img">
									<a href="">
										<img src="public/img/openings/ThatGuyThatGirl_1.jpg" width="100%" alt="" />
									</a>
								</div>
								<div class="thumb-content">
									<h5 class="thumb-category">
										<i class="fas fa-comment"></i>
										<span class="main">Service</span>
										<span class="sub">Event Staffing Agency</span>
									</h5>
									<a href="">
										<div class="row">
											<div class="col-xs-7 thumb-name">
												<span>That Guy, That Girl</span>
											</div>
											<div class="col-xs-5 thumb-product"></div>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xs-12 alignright mgbottom30">
							<button class="btn btn-more">See More</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<div class="container">
			<div class="row aligncenter">
				<div class="col-sm-12">
					<div class="subscribe">
						<h3 class="title">Subscribe</h3>
						<span class="email"><i class="far fa-envelope-open"></i><input type="text" placeholder="Please enter your email." id="email" autocomplete="off" /></span>
					</div>
					<ul class="sns-list">
						<li><a><i class="fab fa-facebook-square"></i></a></li>
						<li><a><i class="fab fa-instagram"></i></a></li>
						<li><a><i class="fab fa-youtube"></i></a></li>
					</ul>
				</div>
				<div class="col-sm-12">
					<ul class="link-list">
						<li>
							<a href="">ABOUT</a>
						</li>
						<li>MOMPOPKO @ 2018</li>
						<li>
							<a href="">CONTACT</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	</div>

	<a href="#" class="scrollup">
		<i class="fa fa-angle-up active"></i>
	</a>
	<script src="public/js/jquery.min.js"></script>
	<script src="public/js/jquery.easing.1.3.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
</body>
</html>
