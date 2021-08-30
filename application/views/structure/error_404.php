<style>

.noise {
pointer-events: none;
position:inherit;
width: 100%;
height: 100%;
background-image: url("https://media.giphy.com/media/oEI9uBYSzLpBK/giphy.gif");
background-repeat: no-repeat;
background-size: cover;
z-index: 9999;
opacity: 0.02;
}

.overlay {
pointer-events: none;
position: inherit;
width: 100%;
height: 100%;
background: repeating-linear-gradient(180deg, rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0) 100%);
background-size: auto 4px;
z-index: 9999;
}

.overlay::before {
content: "";
pointer-events: none;
position: absolute;
display: block;
top: 0;
left: 0;
right: 0;
bottom: 0;
width: 100%;
height: 100%;
background-image: linear-gradient(0deg, transparent 0%, rgba(32, 128, 32, 0.2) 2%, rgba(32, 128, 32, 0.8) 3%, rgba(32, 128, 32, 0.2) 3%, transparent 100%);
background-repeat: no-repeat;
-webkit-animation: scan 7.5s linear 0s infinite;
		animation: scan 7.5s linear 0s infinite;
}

@-webkit-keyframes scan {
0% {
background-position: 0 -100vh;
}
35%, 100% {
background-position: 0 100vh;
}
}

@keyframes scan {
0% {
background-position: 0 -100vh;
}
35%, 100% {
background-position: 0 100vh;
}
}
.terminal {
box-sizing: inherit;
position: absolute;
height: 100%;
width: 100%;
max-width: 100%;
padding: 4rem;
text-transform: uppercase;
}

.output {
color: rgba(128, 255, 128, 0.8);
text-shadow: 0 0 1px rgba(51, 255, 51, 0.4), 0 0 2px rgba(255, 255, 255, 0.8);
}

.output::before {
content: "> ";
}

/*
.input {
color: rgba(192, 255, 192, 0.8);
text-shadow:
0 0 1px rgba(51, 255, 51, 0.4),
0 0 2px rgba(255, 255, 255, 0.8);
}

.input::before {
content: "$ ";
}
*/

a{
	text-decoration: none;
	color: white;
}
.errorcode {
color: white;
}
</style>
<div class="content-page">
<div class="content">
	<div class="noise"></div>
	<div class="overlay"></div>
	<div class="card text-white bg-secondary col-md-10 m-4" style="min-height:100%">
		<div class="card-header text-white"><i class="fa fa-warning"></i> Error <span class="errorcode">404</span></div>
		<div class="card-body">
			<h4 class="card-title">ERROR 404 - Halaman konten tidak ditemukan</h4>
			<p class="output">Halaman ini tidak tersedia atau mungkin sudah dihapus.</p>
			<p class="output">Coba untuk <a href="<?= site_url() ?>">Kembali Ke Beranda</a>.</p>
			<p class="output">Good luck.</p>
			<div class="terminal">
			</div>
		</div>
	</div>
</div>
</div>
