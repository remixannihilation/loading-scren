/*-----YOUTUBE PLAYER-----*/
/* List of Youtube videos. One will be picked at random upon page load and played. */
/* You must use the embed link of each video */
/* If you just want a single video to be played, only use a single link. */
var tracks = new Array(
	"http://www.youtube.com/embed/0GLoHifu6aM?autoplay=1&controls=0",
	"http://www.youtube.com/embed/VgSMxY6asoE?autoplay=1&controls=0",
	"http://www.youtube.com/embed/iH4bqVlkEIo?autoplay=1&controls=0",
	"http://www.youtube.com/embed/JlyPzjBl8UI?autoplay=1&controls=0",
	"http://www.youtube.com/embed/ZWir6wUkPtw?autoplay=1&controls=0",
	"http://www.youtube.com/embed/q1ph9wotf_o?autoplay=1&controls=0",
	"http://www.youtube.com/embed/g-A0ftEgOs0?autoplay=1&controls=0",
	"http://www.youtube.com/embed/f-jN3vH26NQ?autoplay=1&controls=0"
);

var playerEnabled = false; // Youtube player enabled?
var showVideo = false; // Show video?

/*-----RANDOM HINTS-----*/
/* List of hints to be cycled randomly. */
var hints = new Array(
	"\"Too many of us are not living our dreams because we are living our fears.\"<br/>- Les Brown",
	"\"A goal is a dream with a deadline.\"<br/>Napoleon Hill",
	"\"The road to success and the road to failure are almost exactly the same.\"<br/>-Colin R. Davis",
	"\"Twenty years ago from now you will be more disappointed by the things that you didn't do than by the ones you did do.\"<br/>-Mark Twain",
	"\"Motivation is a fire from within. If someone else tries to light that fire under you, chances are it will burn very briefly.\"<br/>-Stephen R. Covey",
	"\"Anyone can do something when they want to do it. Really successful people do things when they don't want to do it.\"<br/>-Dr. Phil",
	"\"In three words I can sum up everything I've learned about life: It goes on.\"<br/>-Robert Frost",
	"\"All misfortune is but a stepping stone to fortune.\"<br/>-Henry David Thoreau"
);

var hintsEnabled = true;

/*-----SLIDESHOW----*/
/* List of images to put in slideshow. */
var imagepaths = new Array(
	"images/img1.png",
	"images/img2.png"
);

var slideShowEnabled = true;

/*--------DO NOT EDIT ANYTHING BENEATH THIS LINE, UNLESS YOU KNOW WHAT YOU'RE DOING--------*/
var thisIndex = 0;
var lastIndex = 0;
var curImage = 0;

$(document).ready(function() {
	if(slideShowEnabled){
		$("#background").hide().attr("src", imagepaths[curImage]).fadeIn(3000);
		curImage++;
	} else {$("#background").hide();}
	
	if(!showVideo) {
	$("#vid").css("width", "0.01%");
	$("#vid").css("height", "0.01%");
	$("#vid").css("-webkit-box-shadow", "0px 0px 0px 0px rgba(0, 0, 0, 1)");
	$("#vid").css("box-shadow", "0px 0px 0px 0px rgba(0, 0, 0, 1)");
    }
	if(hintsEnabled) {
		thisIndex = Math.floor(Math.random()*hints.length);
		lastIndex = thisIndex;
		$("#hint").hide().html(hints[thisIndex]).fadeIn(3000);
	}
	if(playerEnabled) {
		$("#video").attr("src", tracks[Math.floor(Math.random()*tracks.length)])
	}
});

if(hintsEnabled) {
	setInterval(function(){
		while(thisIndex == lastIndex) {
			thisIndex = Math.floor(Math.random()*hints.length);
		}
		
		$("#hint").fadeOut(1000, function() {
          	  $("#hint").html(hints[thisIndex]).fadeIn(3000);
   		 });
	
		lastIndex = thisIndex;
	}, 10000);
}

if(slideShowEnabled) {
setInterval(function(){
	if(curImage >= imagepaths.length) {
		curImage = 0;
	}

	$("#background").hide().attr("src", imagepaths[curImage]).fadeIn(3000);
	curImage++;
}, 10000);
}

$(function() {
			$(".meter > span").each(function() {
				$(this)
					.data("origWidth", $(this).width())
					.width(0)
					.animate({
						width: $(this).data("origWidth")
					}, 1200);
			});
		});

// Called when a file starts downloading. The filename includes the entire path of the file;
// for example "materials/models/bobsModels/car.mdl".
function DownloadingFile( fileName ) {
		$("#loadingtext").hide().text("Downloading " + fileName).fadeIn(300);
}

// Called when something happens. This might be "Initialising Game Data", "Sending Client Info", etc.
function SetStatusChanged( status ) {
	   $("#loadingtext").hide().text(status).fadeIn(300);
}
