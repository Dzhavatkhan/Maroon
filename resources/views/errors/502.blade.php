<div class="page">
	<div class="page__info">
		<h1 class="page__title">
			<span class="page__mistake-code">502</span>
			<span class="page__mistake-text">Whooops, the website is taking too much time to respond</span>
		</h1>
		<div class="page__mistake-instructions">
			<p>We are fixing this mistake. Try refreshing the page, or going back and attempting the action again</p>
		</div>
	</div>
	<div class="page__flask page__first-flask flask">
		<div class="flask__shape">
			<div class="flask__throat flask__throat-one"></div>
			<div class="flask__throat flask__throat-two"></div>

			<div class="flask__bottom flask__bottom-one"></div>
			<div class="flask__bottom flask__bottom-two"></div>
			<div class="flask__bottom flask__bottom-three"></div>
		</div>
		<div class="page__bubble-type1 bubble"></div>
		<div class="page__bubble-type2 bubble"></div>
		<div class="page__bubble-type3 bubble"></div>
		<div class="page__bubble-type4 bubble"></div>
		<div class="page__bubble-type5 bubble"></div>
	</div>
	<div class="page__flask page__second-flask flask">
		<div class="flask__shape">
			<div class="flask__throat flask__throat-one"></div>
			<div class="flask__throat flask__throat-two"></div>

			<div class="flask__bottom flask__bottom-one"></div>
			<div class="flask__bottom flask__bottom-two"></div>
			<div class="flask__bottom flask__bottom-three"></div>
		</div>
		<div class="page__bubble-type1 bubble"></div>
		<div class="page__bubble-type2 bubble"></div>
		<div class="page__bubble-type3 bubble"></div>
		<div class="page__bubble-type4 bubble"></div>
		<div class="page__bubble-type5 bubble"></div>
		<div class="page__bubble-type6 bubble"></div>
		<div class="page__bubble-type9 bubble"></div>
	</div>
	<div class="page__flask page__third-flask flask">
		<div class="flask__shape">
			<div class="flask__throat flask__throat-one"></div>
			<div class="flask__throat flask__throat-two"></div>

			<div class="flask__bottom flask__bottom-one"></div>
			<div class="flask__bottom flask__bottom-two"></div>
			<div class="flask__bottom flask__bottom-three"></div>
		</div>
		<div class="page__bubble-type1 bubble"></div>
		<div class="page__bubble-type2 bubble"></div>
		<div class="page__bubble-type3 bubble"></div>
		<div class="page__bubble-type4 bubble"></div>
		<div class="page__bubble-type5 bubble"></div>
		<div class="page__bubble-type6 bubble"></div>
		<div class="page__bubble-type7 bubble"></div>
		<div class="page__bubble-type8 bubble"></div>
	</div>
</div>
st
<style>
@import url('https://fonts.googleapis.com/css?family=Baloo+Tammudu|Indie+Flower&display=swap');

/*
=====
FLASK
=====
*/
.flask {
    --basic-flask-color-step: var(--flask-color-step, 15);

	width: var(--flask-width, 368px);
	height: var(--flask-height, 405px);
	position: var(--flask-position, relative);
}

.flask__shape {
	width: 100%;
	height: 100%;
	overflow: hidden;

	position: absolute;
	bottom: 0;
	z-index: 2;

	clip-path: polygon(40.49% 0, 59.51% 5.94%, 59.51% 38.27%, 100% 100%, 0 100%, 40.49% 38.27%);
}

:is(.flask__throat, .flask__bottom)::before,
:is(.flask__throat, .flask__bottom)::after {
	content: "";
	position: absolute;
	animation-iteration-count: infinite;
	animation-duration: 5s;
}

.flask__throat-one::before {
	--basic-flask-h: var(--flask-h, 261);
	--basic-flask-s: var(--flask-s, 40%);
	--basic-flask-l: var(--flask-l, 48%);

	width: 40.761%;
	height: 5.2383%;

	right: 25.8153%;
	top: 18.025%;
	z-index: 4;
	rotate: 20deg;

	animation-name: part-animation;
}

.flask__throat-one::after {
    --basic-flask-h: var(--flask-h, 261);
    --basic-flask-s: var(--flask-s, 57%);
    --basic-flask-l: var(--flask-l, 44%);

	width: 40.761%;
	height: 12.346%;

	right: 25.816%;
	top: 23.457%;
	z-index: 3;
	rotate: 20deg;

	animation-name: part-animation;
}

.flask__throat-two::before {
	--basic-flask-h: var(--flask-h, 261);
	--basic-flask-s: var(--flask-s, 57%);
	--basic-flask-l: var(--flask-l, 44%);

	width: 100%;
	height: 12.346%;

	right: 0;
	top: 25.926%;
	z-index: 3;

	animation-name: part-animation;
}

.flask__bottom-one::before {
	--basic-flask-h: var(--flask-h, 254);
	--basic-flask-s: var(--flask-s, 56%);
	--basic-flask-l: var(--flask-l, 32%);

	width: 25%;
	height: 30%;

	bottom: -17.284%;
	left: -6.794%;
	z-index: 5;
	rotate: -40deg;

	animation-name: part-animation;
}

.flask__bottom-one::after {
	--basic-flask-h: var(--flask-h, 237);
	--basic-flask-s: var(--flask-s, 50%);
	--basic-flask-l: var(--flask-l, 51%);

	width: 100%;
	height: 18.519%;

	left: -8.1522%;
	bottom: -8.642%;
	z-index: 4;
	rotate: 25deg;

	animation-name: part-animation;
}

.flask__bottom-two::before {
	--basic-flask-h: var(--flask-h, 223);
	--basic-flask-s: var(--flask-s, 50%);
	--basic-flask-l: var(--flask-l, 51%);

	width: 150%;
	height: 37.038%;

	right: -8.153%;
	bottom: -8.642%;
	z-index: 3;
	rotate: 35deg;

	animation-name: part-animation;
}

.flask__bottom-two::after {
	--basic-flask-h: var(--flask-h, 198);
	--basic-flask-s: var(--flask-s, 71%);
	--basic-flask-l: var(--flask-l, 54%);

	width: 100%;
	height: 41.976%;

	right: 0;
	bottom: 0;
	z-index: 1;

	animation-name: part-animation;
}

.flask__bottom-three::before {
	--basic-flask-h: var(--flask-h, 198);
	--basic-flask-s: var(--flask-s, 71%);
	--basic-flask-l: var(--flask-l, 43%);

	width: 100%;
	height: 66.667%;

	right: -19.022%;
	bottom: 27.902%;
	z-index: 2;
	rotate: 20deg;

	animation-name: part-animation;
}

.flask__bottom-three::after {
	--basic-flask-h: var(--flask-h, 261);
	--basic-flask-s: var(--flask-s, 57%);
	--basic-flask-l: var(--flask-l, 44%);

	width: 50%;
	height: 4.939%;

	right: 25.816%;
	bottom: 58.125%;
	z-index: 2;
	rotate: -10deg;

	animation-name: part-animation;
}

@keyframes part-animation {
	0%, 100% {
		background-color: hsl(var(--basic-flask-h), var(--basic-flask-s), var(--basic-flask-l));
	}
	25%, 75% {
		background-color: hsl(calc(var(--basic-flask-h) - var(--basic-flask-color-step)), var(--basic-flask-s), var(--basic-flask-l));
	}
	50% {
		background-color: hsl(calc(var(--basic-flask-h) - var(--basic-flask-color-step) - var(--basic-flask-color-step)), var(--basic-flask-s), var(--basic-flask-l));
	}
}

/*
=====
Bubble
=====
*/

@media (prefers-reduced-motion: no-preference) {
	.bubble {
		--basic-bubble-size: 8px;
		--basic-bubble-duration: 2s;

		width: var(--bubble-size, var(--basic-bubble-size));
		height: var(--bubble-size, var(--basic-bubble-size));

		border-radius: 50%;
		border: var(--bubble-border-width, 1px) solid var(--bubble-border-color, var(--bubble-color));
		background-color: var(--bubble-color);

		position: absolute;

		animation-name: bubble;
		animation-iteration-count: infinite;
		animation-fill-mode: both;
		animation-duration:
									var(--bubble-animation-duration,
											calc(
												var(--bubble-duration, var(--basic-bubble-duration)) *
												var(--bubble-duration-rate, 0) +
												var(--bubble-duration-duration, var(--basic-bubble-duration))
									));
		animation-delay: calc(var(--bubble-delay, .1s) + var(--bubble-delay-rate) * var(--bubble-delay-step, .2s));
	}

	@keyframes bubble {
		10%, 20% {
			transform: translateZ(0) translateY(0) scale(1);
			opacity: 1;
		}
		0%, 98% {
			opacity: 0;
		}
		100% {
			transform: translateZ(0) translateY(var(--bubble-animation-distance, -200px)) scale(0);
			opacity: 0;
		}
	}
}
/*
=====
DEMO
=====
*/

body {
	font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Open Sans, Ubuntu, Fira Sans, Helvetica Neue, sans-serif;
	line-height: 1.75;
	background-color: #292548;
	color: #fff;
	margin: 0;
}

p:first-child {
	margin-block-start: 0;
}

p:last-child {
	margin-block-end: 0;
}

.page {
	box-sizing: border-box;
	padding-inline: .5rem;
	padding-block-start: 2rem;
	position: relative;
	margin-inline: auto;
	block-size: max(50px, 100dvh);

	display: grid;
	grid-template-columns: repeat(12, 1fr);
	gap: 2rem;
	align-items: end;
}

.page__info {
	box-sizing: border-box;
	max-inline-size: 60ch;
	padding-inline: 1rem;
	grid-column: span 12;
	align-self: start;
}

.page__title {
	margin-block: 0;
}

.page__mistake-code {
	display: block;
	font-family: 'Baloo Tammudu', cursive;
	font-size: 4rem;
	line-height: 1.15;
}

.page__mistake-text {
	display: block;
	font-size: 1.5rem;
	line-height: 1.25;
}

.page__first-flask {
	--flask-width: 200px;
	--flask-height: 230px;
}

.page__second-flask {
	--flask-width: 270px;
	--flask-height: 297px;
}

.page__bubble-type1 {
	--bubble-color: #42a8c0;
	--bubble-delay-rate: 0;
	left: 50.272%;
	top: 15px;
}

.page__bubble-type2 {
	--bubble-color: #fff;
	--bubble-delay-rate: 1;
	left: 47.555%;
	top: 30px;
}

.page__bubble-type3 {
	--bubble-color: #244081;
	--bubble-delay-rate: 2;
	left: 52.99%;
	top: 50px;
}

.page__bubble-type4 {
	--bubble-color: hsl(262, 51%, 48%);
	--bubble-delay-rate: 3;
	left: 43.479%;
	top: 45px;
}

.page__bubble-type5 {
	--bubble-color: #42a8c0;
	--bubble-delay-rate: 4;
	left: 48.914%;
	top: 60px;
}

.page__bubble-type6 {
	--bubble-delay-rate: 6;
	left: 50.272%;
	top: 20px;
}

.page__bubble-type7 {
	--bubble-delay-rate: 10;
	left: 52.99%;
	top: 30px;
}

.page__bubble-type6,
.page__bubble-type7,
.page__bubble-type9 {
	--bubble-border-color: #fff;
	--bubble-size: 20px;
	--bubble-delay-step: .1s;
	--bubble-duration-rate: .75;
}

.page__bubble-type8 {
	--bubble-border-color: #fff;
	--bubble-size: 35px;
	--bubble-delay-rate: 5;
	--bubble-duration-rate: 1.25;
	left: 40.761%;
	top: 50px;
}

.page__bubble-type9 {
	--bubble-delay-rate: 10;
	left: 44.45%;
	top: 30px;
}

@media (max-width: 750px) {

	.page__first-flask {
		grid-column: span 12;
	}


	.page__second-flask {
		display: none;
	}
}

@media (min-width: 751px) {

	.page__info {
		margin-inline: auto;
		text-align: center;
	}
}

@media (max-width: 1200px) {

	.page__second-flask {
		grid-column: 8;
	}

	.page__third-flask {
		display: none;
	}
}


@media (min-width: 1201px) {

	html {
		font-size: 1.25rem;
	}

	.page__mistake-code {
		font-size: 5rem;
	}

	.page__second-flask {
		grid-column: 5;
	}

	.page__third-flask {
		grid-column: 11;
	}
}
</style>
