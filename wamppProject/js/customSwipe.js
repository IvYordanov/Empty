// jQuery версия
var mySwipe = $('#mySwipe').Swipe({
	auto: 3000,
	continuous: true
}).data('Swipe');

$('.prev').on('click', mySwipe.prev);
$('.next').on('click', mySwipe.next);


// JavaScript версия
// var elem = document.getElementById("mySwipe"),
// 	prev = document.querySelector('.prev'),
// 	next = document.querySelector('.next');

// var mySwipe = Swipe(elem, {
// 	auto: 3000,
// 	continuous: true
// });

// if (next.addEventListener) {
// 	next.addEventListener('click', nextSlide, false);
// 	prev.addEventListener('click', prevSlide, false); 
// } else if (next.attachEvent) {
// 	next.attachEvent('onclick', nextSlide);
// 	prev.attachEvent('onclick', prevSlide);
// }

// function nextSlide() {
// 	mySwipe.next();
// }

// function prevSlide() {
// 	mySwipe.prev();
// }