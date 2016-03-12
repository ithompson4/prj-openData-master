var gsap = require('gsap');
var $ = require('jquery');

require('domready')(function() {
	var re = new RegExp("animCookie=anim");
    var value = re.exec(document.cookie);
    if(value) return;
    re = new RegExp("animSess=anim");
    value = re.exec(document.cookie);
    if(value) return;
	animate();

	$(window.unload(function() {
		$.cookie("animCookie", null, { path: '/' });
	});
});



function animate() {
	var header = document.getElementById('header');
	var span1  = document.getElementById('span1');
 	var span2 = document.getElementById('span2');
	var span3 = document.getElementById('span3');

	var blogButtons = document.getElementsByClassName('blog-button');
	var blogPreview = document.getElementsByClassName('blog-preview');

	gsap.fromTo(header, 1, { y: -100, ease: Power1.easeOut },
		{ y: 0, ease: Power1.easeOut });


	gsap.fromTo(span1, 1, { x: -100, ease: Power1.easeOut },
		{ x: 0, ease: Power1.easeOut });
	gsap.fromTo(span2, 1, { x: -100, ease: Power1.easeOut },
		{ x: 0, ease: Power1.easeOut });
	gsap.fromTo(span3, 1, { x: -100, ease: Power1.easeOut },
		{ x: 0, ease: Power1.easeOut });

	for(var i = 0; i < blogButtons.length; i++) {
		var delay = 1;
		gsap.fromTo(blogButtons[i], 0.5, {x: -100, delay: delay, ease: Power1.easeOut}, {x: 0})
	}

	for(var i = 0; i < blogPreview.length; i++) {
		var delay = 4;
		gsap.fromTo(blogPreview[i], 3, {opacity: 0}, {opacity: 1});
	}
	document.cookie = "animSess=anim; expires=0; path=/";
	createCookie('animCookie', 'anim', 5);
}



function createCookie(name, value, minutes) {
    var date, expires;
    if (minutes) {
        date = new Date();
        date.setTime(date.getTime()+(minutes+60*1000));
        expires = "; expires="+date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = name+"="+value+expires+"; path=/";
}



