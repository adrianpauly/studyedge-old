/* Mobile check */
window.mobilecheck = function() {
  var check = false;
  (function(a) {
      if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) 
      	check = true
  })(navigator.userAgent || navigator.vendor || window.opera);
  return check;
}


// Open modals

function renderModal() {
	var w = window,
		d = document,
		e = d.documentElement,
		g = d.getElementsByTagName('body')[0],
		wWidth = w.innerWidth || e.clientWidth || g.clientWidth,
		wHeight = w.innerHeight|| e.clientHeight|| g.clientHeight,
		$popup = $('#popup'),
		width = $popup.outerWidth(),
		height = $popup.outerHeight();
	$popup.css({
		left: (wWidth-width)/2 + 'px',
		top: (wHeight-height)/2 + 'px'
	});	
}


function openModal(popup,el) {

	if (popup == 'close') {
		$('#popup-overlay, #popup').removeClass('visible');
		$('#popup>div').html('');
		return false;
	}

	$('#popup-overlay').addClass('visible');
	$('#popup').attr('class', 'visible ' + popup);

	var html = '<a class="close" popup="close"></a>';

	var currentpath = window.location.pathname,
		sitePaths = ['fsu','other'],
		pathPieces = currentpath.split('/'),
		lastPiece = '';

	switch (popup) {
		case 'change-school':
			pathPieces.forEach(function(item){
				if(item.length > 0 && sitePaths.indexOf(item) < 0) {
					lastPiece = item;
				}
			});
			html = '<h1>Change School</h1>'; //= instead of += so change school does not have a close button
			html += '<div class="list">';
			for (var i in sites) {
				// If last character is '/', strip it
				var sitePath = sites[i].path;
				if( sitePath.slice(-1) != '/' ) {
					sitePath = sitePath + '/';
				}
				html += '<a href="' + sitePath + lastPiece + '"' + (sites[i].active ? ' class="active"><b></b>' : '>') + sites[i].name + '</a>';
			}
			html += '</div>';
		break;
		case 'facebook-app':
			html += '<center style="padding:20px"> Study Edge videos can be watched using our iPhone, iPad, <br />Android, and Facebook apps! If you want to watch videos <br />on your computer, click ‘Go to our Facebook App’ below. <br /> <br />If you want to get our mobile app to watch videos on your <br />iPhone, iPad or Android device, click on the button below <br />or search ‘Study Edge’ in your phone’s App Store. <br /> <br />Everyone gets 10 free tokens to start! <br /> <br /> <a class="facebook-app-btn" href="http://studyedge.com/app" target="_blank"></a> <a class="app-store" href="https://itunes.apple.com/us/app/study-edge/id550020899?mt=8" target="_blank"></a> &nbsp; <a class="play-store" href="https://play.google.com/store/apps/details?id=com.purelogics.studyedge" target="_blank"></a> &nbsp; </center>';
		break;
		case 'class-select':
			html += '<h1>Select Your Course</h1>';
			html += '<div class="classes"><div class="multi-column"><ul>';
			columns = ['','',''];
			for (i in classes) {
				var queryString;
				queryString = sitePaths.indexOf(pathPieces[1]) !== -1 ? '/' + pathPieces[1] + '/' : '/';
				html += '<li><a href="' + queryString + '?p=class&class=' + classes[i].id + '"><b>' + classes[i].code + '</b> - ' + classes[i].name + '</a></li>';
			}
			html += '</div></ul></div>';
		break;
		case 'exp-bio':
			html += $(el).find('.popup-text').html().replace(/\[video=(.*)\]/ig, '<div class="flowplayer color-light no-background"><video autoplay><source type="video/mp4" src="$1"></video></div>');
		break;
	}

	$('#popup>div').html(html);

	try {
		var $flowplayer = $('#popup .flowplayer');
		if ($flowplayer.length > 0)
			$flowplayer.flowplayer();
	} catch(e){}

	renderModal();
	return false;

}


jQuery(document).ready(function($){
	$.smartbanner({
		daysHidden: 2,
		daysReminder: 10,
		title: 'Study Edge',
		author: 'Study Edge'
	});
	$(document).on('mouseover', '.testimonial:not(.active)', function(){
		$('.testimonial.active, .testimonials blockquote.active').removeClass('active');
		$(this).addClass('active');
		$('.testimonials>.wrap>blockquote').eq($(this).index()-$('.testimonial').index()).addClass('active');
	});
	$(window).scroll(function(e){
		var top = $(document).scrollTop(),
			height = $('header .dark').height();
		if (top > height) {
			$('header .sticky').addClass('active').css('top', '0px');
		} else {
			$('header .sticky').css('top', (height-top) + 'px').removeClass('active');
		}
	});

	$(document).on('click', '.bio .col-40 a', function(){
		var $this = $(this),
			height = $this.find('img').height(),
			width = $this.find('img').width();

		if ($(this).hasClass('hidden')) return;
		$('#bio-player').remove();
		$('.bio .col-40 a.hidden').removeClass('hidden').children().fadeIn(600);
		$(this).children().fadeOut(600,function(){
			if ($this.hasClass('hidden')) return;
			$this.addClass('hidden');
			$this.append('<div id="bio-player" class="flowplayer color-light no-background"><video autoplay><source type="video/mp4" src="' + $this.attr('href') + '"></video></div>');
			$('#bio-player').flowplayer();
		});
		return false;
	});


	// About video
	$(document).on('click', '.about-video', function(){
		if ($(this).hasClass('playing')) return false;
		$(this).addClass('playing');
		$(this).html('<div id="about-player" class="flowplayer color-light no-background no-volume play-button"><video autoplay><source type="video/mp4" src="' + $(this).attr('href') + '"></video></div>');
		$('#about-player').flowplayer();
		return false;
	});

	// Main front page video
	$(document).on('click', '.home .video', function(e){
		if ($(e.target).closest('#lrs-button').length > 0) {
			$('html, body').animate({
				scrollTop: $('[name=courses]').offset().top
			}, 700);
			return false;
		}
		$('.video-overlay').fadeIn().on('click', function(){
			$(this).fadeOut();
			$('.full-video').fadeOut(300,function(){$(this).empty()});
		});
		$('.full-video').fadeIn();
		$('.full-video').html('<div><b></b><div id="home-player" class="flowplayer color-light no-background no-volume play-button"><video autoplay><source type="video/mp4" src="' + $(this).attr('data-video') + '"></video></div></div>');
		$('#home-player').flowplayer();
	});

	$(document).on('click', '.full-video>div>b', function(){
		$('.video-overlay').trigger('click');
	});


	// Trigger modals
	$(document).on('click', '[popup]', function(){
		var popup = $(this).attr('popup');
		openModal(popup,this);
	});

	$(window).on('resize',function(){
		placeModal();
	});

	var timeoutConst;
	$('.flip-container').hover(function(){
		self = this;
		setTimeoutConst = setTimeout(function(){
			console.log($(self));
			$(self).find('b').addClass('active')
		}, 600);
	}, function(){
		clearTimeout(timeoutConst);
		$('.expert b').removeClass('active');
	});

	function showHelpTab() {
		$('.help-tab').addClass('active');
	}


	// Pricing page help tab opens on click...
	$('.help-tab').on('click',function(){
		$(this).toggleClass('active');
	});

	// ... and on timer
	setTimeout(showHelpTab, 10000);

});