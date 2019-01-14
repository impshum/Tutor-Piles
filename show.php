<?php include "assets/php/functions.php"; ?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Tutor Piles - Remote Control</title>
	<meta name="author" content="impshum">
	<meta name="description" content="Slideshow software for programming tutors">
	<link rel="stylesheet" href="assets/css/bulma.min.css">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/ani.css">
	<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<style>
		html,
		body {
			overflow: hidden;
		}

		.button {
			padding: 40px;
			border-radius: 0 !important;
		}

		.menou {
			margin-top: 2em;
			height: 200px;
			overflow-y: scroll;
		}
		html,
		body {
		  height: 100%;
		  display: block;
		}

		body {
		  font-family: "Raleway", sans-serif;
		}

		h1 {
		  text-align: center;
		  letter-spacing: 2px;
		  font-weight: 300;
		  font-size: 70px;
		}

		.button {
		  font-size: 20px;
		  text-align: center;
		  display: block;
		  width: 300px;
		  margin: auto;
		  padding: 15px 0px;
		  text-decoration: none;
		  letter-spacing: 2px;
		  font-weight: 300;
		  margin-bottom: 40px;
		  overflow: hidden;
		  position: relative;
		  border-radius: 3px;
		  transition: box-shadow 0.3s;
		  -webkit-box-shadow: 0px 5px 8px rgba(0, 0, 0, 0.2);
		}
		.button span {
		  display: block;
		  border-radius: 50%;
		  width: 50px;
		  height: 50px;
		  margin-left: -25px;
		  margin-top: -25px;
		  position: absolute;
		  -webkit-animation: effect-animation 2s;
		}
		.button:hover {
		  -webkit-box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.6);
		}

		.button-black {
		  background: #000;
		  color: #fff;
		}
		.button-black span {
		  background: #fff;
		  left: 50%;
		  top: 50%;
		}

		.button-white {
		  background: #fff;
		  color: #000;
		  border: 2px solid #000;
		}
		.button-white span {
		  background: #000;
		}

		@-webkit-keyframes effect-animation {
		  from {
		    -webkit-transform: scale(1);
		    opacity: 0.4;
		  }
		  to {
		    -webkit-transform: scale(100);
		    opacity: 0;
		  }
		}

		.menu-list a:hover {
			color: #363636 !important;
		}

		.menou::-webkit-scrollbar-track
 {
     background-color: #0a0a0a;
 }

 .menou::-webkit-scrollbar
 {
     width: 6px;
     background-color: #0a0a0a;
 }

 .menou::-webkit-scrollbar-thumb
 {
     background-color: #fff;
 }
	</style>
</head>

<body>

	<section class="hero is-black is-fullheight">
		<div class="hero-body">
			<div class="container has-text-centered">
				<div class="content">
					<h2 id='page-title'></h2>
				</div>

				<div class="columns is-mobile">
					<div class="column is-half">
						<a class="button button-white js-touch-effect ani is-large is-fullwidth" onClick="up();">BACK</a>
					</div>
					<div class="column is-half">
						<a class="button button-white js-touch-effect ani is-large is-fullwidth" onClick="down();">NEXT</a>
					</div>
				</div>

				<div class="menou">
					<aside class="menu">
						<p class="menu-label">Slides</p>
						<ul class="menu-list">
							<?php get_dirs(); ?>
						</ul>
					</aside>
				</div>

			</div>
		</div>
	</section>

	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script>
		$(document).ready(function() {
			var page = window.opener.location.search;
			var thing = page.substring(page.indexOf('-') + 1);
			var that = thing.replace('-', ' ');
			$('#page-title').text(that);
		});

		$('html').keydown(function(event) {
			if (event.keyCode == 40) {
				window.opener.$.fn.pagepiling.moveSectionDown();
			} else if (event.keyCode == 38) {
				window.opener.$.fn.pagepiling.moveSectionUp();
			}
		});

		function down() {
			window.opener.$.fn.pagepiling.moveSectionDown();
		};

		function up() {
			window.opener.$.fn.pagepiling.moveSectionUp();
		};

		//変数定義
		var $window = window;

		//black
		function buttonEffect(){
		  var $buttonEffect = $('.js-effect');

		//button押した時の挙動
		  $buttonEffect.on('click',function(e){
		    e.preventDefault();

		    $(this).append('<span></span>');

		    var $span = $(this).find('span');

		    $window.setTimeout(function(){
		      $span.remove();
		    },1800);

		  });
		}

		buttonEffect();

		//white
		function buttonTouchEffect(){
		  var $buttonTouchEffect = $('.js-touch-effect');

		//button押した時の挙動
		  $buttonTouchEffect.on('click',function(e){
		    e.preventDefault();

		    $(this).append('<span></span>');
		    var $span = $(this).find('span'),
		        offSet = $(this).offset(),
		        offSetY = event.pageY-offSet.top,
		        offSetX = event.pageX-offSet.left;

		    console.log(offSetY,offSetX)
		    $span.css({
		      top:offSetY,
		      left:offSetX
		    });

		      $window.setTimeout(function(){
		      $span.remove();
		    },1800);

		  });
		}

		buttonTouchEffect();



	</script>

</body>

</html>
