


let 
	registerWindow = document.getElementById('my_register'),
	registerComee = document.getElementById('ccomee'),
	registerCome = document.getElementById('ccome'),
	registerClose = document.querySelector('.register_open');

	registerComee.onclick = function() {
		registerWindow.style.display = "block";
	};
	registerCome.onclick = function() {
		registerWindow.style.display = "block";
	};
	window.onclick = function (ee) {
		if( ee.target == registerWindow)
		registerWindow.style.display = "none";
	};

let 
	regWindowForm = document.getElementById('regWindow'),
	logWindowForm = document.getElementById('logWindow'),
	regs = document.getElementById('regs'),
	logs = document.getElementById('logs');

	regs.onclick = function() {
		regWindowForm.style.display = "block";
		logWindowForm.style.display = "none";
	};
	logs.onclick = function() {
		logWindowForm.style.display = "block";	
		regWindowForm.style.display = "none";
	};






(function($){
  $(function() {
    $('.menu__icon').on('click', function() {
      $(this).closest('.menu').toggleClass('menu_state_open');
    });
  });
})(jQuery);













var slideIndex = 1;
showSlide(slideIndex);

function plusSlide(n) {
	showSlide(slideIndex += n);
}

function currentSlide(n) {
	showSlide(slideIndex = n);
}

function showSlide(n) {
	var i;
	var slides = document.getElementsByClassName('mySlide');
	var dots = document.getElementsByClassName('dot');

	if (n > slides.length) {
		slideIndex = 1;
	}
	if (n < 1) {
		slideIndex = slides.length;
	}
	for (i=0; i<slides.length; i++) {
		slides[i].style.display = "none";
	}
	for (i=0; i<dots.length; i++) {
		dots[i].className = dots[i].className.replace("active_slide", "");
	}
	slides[slideIndex-1].style.display = "block";
	dots[slideIndex-1].className+= " active_slide"; 
}