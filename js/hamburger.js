// HAMBURGER MENU
document.addEventListener('DOMContentLoaded', function () {
	let toggleButton = document.getElementsByClassName('toggle-button')[0];
	let navbarLinks = document.getElementsByClassName('navbar-links')[0];

	toggleButton.addEventListener('click', () => {
		navbarLinks.classList.toggle('active');
	});
});
