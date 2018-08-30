(function () {

	var streaming = false,
		video	= document.querySelector('#video'),
		cover	= document.querySelector('#cover'),
		canvas 	= document.querySelector('#canvas'),
		startbutton = document.querySelector('#startbutton'),
		width = 520,
		height = 320;

	navigator.getMedia = ( navigator.getUserMedia ||
							navigator.webkitGetUserMedia ||
							navigator.mozGetUserMedia ||
							navigator.msGetUserMedia);
	navigator.getMedia(
	{
		video: true,
		audio: false
	},
	function(stream) {
		if (navigator.mozGetUserMedia) {
			video.mozSrcObject = stream;
		} else {
			var vendorURL = window.URL || window.webkitURL;
			video.src = vendorURL.createObjectURL(stream);
		}
		video.play();
	},
	function(err) {
		console.log("An error occured! " + err);
	}
	);
	video.addEventListener('canplay', function(ev){
		if (!streaming) {
			height = video.videoHeight / (video.videoWidth/width);
			console.log(video.videoHeight + " / (" + video.videoWidth + " / " + width + ")");
			video.setAttribute('width', width);
			video.setAttribute('height', height);
			canvas.setAttribute('width', width);
			canvas.setAttribute('height', height);
			streaming = true;
		}
	}, false);

	function takepicture() {
		photo	= document.querySelector('#photo');
		canvas.width = width;
		canvas.height = height;
		canvas.getContext('2d').drawImage(video, 0, 0, width, height);
		var data = canvas.toDataURL('image/png');
		console.log(photo);
		photo.setAttribute('value', data);
	}
	startbutton.addEventListener('click', function(ev){
		takepicture();
		ev.preventDefault();
	}, false);
})();

function readURL(input, tochange) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            tochange.attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}