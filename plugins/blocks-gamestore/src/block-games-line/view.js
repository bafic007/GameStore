document.addEventListener('DOMContentLoaded', () => {
	var swiperGames = new Swiper('.games-line-container', {
		loop: true,
		autoplay: {
			delay: 1,
			disableOnInteraction: false,
		},
		slidesPerView: 'auto',
		speed: 3500,
		grabCursor: true,
	});
});
