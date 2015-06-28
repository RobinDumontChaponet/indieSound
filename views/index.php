<!--meta title="index" css="style/index.css"-->
<div id="content">

	<section id="teaser">
		<p>Musicien solitaire ?</p>
		<p>Rejoignez le premier groupe de musique communautaire</p>
		<p>Publiez vos créations et laissez les autres y contribuer</p>
		<p>Découvrez la création de musique en toute simplicité</p>
		<a href="create">Essayez !</a>
	</section>

	<section>
		<h2>Morceaux du moment</h2>
		<ul>

            <li class="soundList__item">
				<div class= "titleSong">
					<p class="title"><button id="music">Soldier </button></p>
					<p class="author"><button id="user">Michael Berko</button></p>
				</div>

				<div class= "ImgSong">
					<img src="data/covers/mikaB.jpg"/>
				</div>
<audio id="son1">
	<source src="data/sounds/soldier" type="audio/mp3"/>
</audio>
				<div class="ControlSong">
					<button class="rewind"></button>
					<button class="play"></button>
					<button class="volume-up"></button>
				</div>

				<div class= "SocialSong">
					<button class="heart"></button>
					<button class="facebook"></button>
					<button class="twitter"></button>
					<button class="google-plus"></button>
				</div>
            </li>

            <li class="soundList__item">
				<div class= "titleSong">
					<p class="title"><button class="music">Novo Assassino </button></p>
					<p class="author"><button class="user">Tigre Demon</button></p>
				</div>

				<div class= "ImgSong">
					<img src="data/covers/TigreD.jpg"/>

				</div>

				<div class="ControlSong">
					<button class="rewind"></button>
					<button class="play"></button>
					<button class="volume-up"></button>
				</div>

				<div class= "SocialSong">
					<button class="heart-o"></button>
					<button class="facebook"></button>
					<button class="twitter"></button>
					<button class="google-plus"></button>
				</div>

            </li>

            <li class="soundList__item">
				<div class= "titleSong">
					<p class="title"><button class="music">Ocean I </button></p>
					<p class="author"><button class="user">Michael Berko</button></p>
				</div>

				<div class= "ImgSong">
					<img src="data/covers/mikaB2.jpg"/>

				</div>

				<div class="ControlSong">
					<button class="rewind"></button>
					<button class="play"></button>
					<button class="volume-up"></button>
				</div>

				<div class= "SocialSong">
					<button class="heart-o"></button>
					<button class="facebook"></button>
					<button class="twitter"></button>
					<button class="google-plus"></button>
				</div>

            </li>
		</ul>
	</section>

	<section id="more">
		<p>Création et partage de musique du monde entier <br> #CoMusique</p>
		<p>Découvrez les <a href="trend">Morceaux du moment</a></p>
	</section>
</div>



<script type="text/javascript">
document.getElementById('play1').addEventListener('click', function () {
		document.getElementById('son1').play();

	});
</script>

