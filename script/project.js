var playing=false;

blip.sampleLoader().samples({
	'glass': 'https://cdn.rawgit.com/jshanley/blip/b2d1594c94a63af9bebab2730ec262301d17b360/sounds/glass.wav',
	'plastic': 'https://cdn.rawgit.com/jshanley/blip/b2d1594c94a63af9bebab2730ec262301d17b360/sounds/plastic.wav',
	'can': 'https://cdn.rawgit.com/jshanley/blip/b2d1594c94a63af9bebab2730ec262301d17b360/sounds/cokecan.wav'
}).done(loaded).load();


function loaded() {
	var sounds = [];

/*	for(var i=0, l=json['sounds'].length; i<l; i++) {

}*/

	var glass = blip.clip().sample('glass');
	var plastic = blip.clip().sample('plastic');
	var can = blip.clip().sample('can');

	var loop = blip.loop()
	.limit(1)
	.tempo(120)
	.data([0, 1, 0, 0, 1, 1])
	.tick(function(t,d) {
		if (d)
			glass.play(t)

		console.log(blip.time.now());
	});

	/* click events */
	document.getElementById('play').addEventListener('click', function () {
		if(playing) {
			loop.stop();
			this.classList.remove('pause');
			playing=false;
		} else {
			loop.start();
			this.classList.add('pause');
			playing=true;
		}
	});
	document.getElementById('rewind').addEventListener('click', function () {
		loop.reset();
	});
}

//length/(120/60) = secondes