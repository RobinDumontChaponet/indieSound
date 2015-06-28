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
					<p class="author"><span style="font-style: italic">par </span>Michael Berko</p>
					<p class="title">Soldier</p>
				</div>

					<img src="data/covers/mikaB.jpg"/>
				<audio id="son1">
					<source src="data/sounds/soldier.mp3" type="audio/mp3"/>
				</audio>



				<div class="ControlSong">
					<button class="rewind"></button>
					<button class="play" id="play"></button>
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
					<p class="author"><span style="font-style: italic">par </span>Tigre Demon</p>
					<p class="title">Novo Assassino</p>
				</div>

					<img src="data/covers/TigreD.jpg"/>

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
					<p class="author"><span style="font-style: italic">par </span>Michael Berko</p>
					<p class="title">Ocean I</p>
				</div>

					<img src="data/covers/mikaB2.jpg"/>

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
document.getElementById('play').addEventListener('click', function () {
		document.getElementById('son1').play();
	});
</script>

