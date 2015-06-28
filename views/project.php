<!--meta title="" css="style/project.css" js="script/blip.min.js" js="script/project.js"-->

<audio id="son">
	<source src="data/sounds/June/June.mp3" type="audio/mp3"/>
</audio>


<div id="content">
	<button id="rewind"><span>Rembobiner</span></button>
	<button id="play"><span>Lecture</span></button>
		<aside id="versions">
		<h2>Versions</h2>
		<button id="orderByLikes"></button>
		<button id="orderByDate"></button>
		<button id="orderByView"></button>
		<nav>
			<ul>
				<li>1. <h3>Impro 1</h3><p>Michael Berko, Vianney Habert</p></li>
			</ul>
		</nav>
	</aside>
	<section id="playground">
		<nav id="timeline"></nav>
		<dl>
			<dt>Piste 1<button class="deletePiste"><span>Supprimer</span></button></dt>
			<dd><div data-time="0" data-length="1" style="width: 572px">Batterie</div></dd>
			<dt>Piste 2<button class="deletePiste"><span>Supprimer</span></button></dt>
			<dd><div data-time="0" data-length="1" style="left:80px;width: 492px">Guitare passive</div></dd>
			<dt>Piste 3<button class="deletePiste"><span>Supprimer</span></button></dt>
			<dd><div data-time="0" data-length="1" style="left:200px;width: 371px">Guitare active</div></dd>
			<dt><button id="addTrack">ajouter une piste</button></dt>
			<dd></dd>
		</dl>
	</section>
	<aside id="sounds">
		<h2>Sons</h2>
		<button id="addSound">Ajouter un son</button>
		<ul>
			<li>Batterie</li>
			<li>Guitare passive</li>
			<li>Guitare active</li>
		</ul>
	</aside>
</div>

<script type="text/javascript">
var playing=false;

document.getElementById('play').addEventListener('click', function () {
	if(playing) {
			document.getElementById('son').stop();
			this.classList.remove('pause');
			playing=false;
	} else {
		document.getElementById('son').play();
		this.classList.add('pause');
		playing=true;
	}
});
</script>