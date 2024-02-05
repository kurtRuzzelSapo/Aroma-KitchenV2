$(document).ready(function () {
	// Function to fetch recipes using AJAX
	function fetchRecipes(searchQuery) {
		$.ajax({
			type: 'GET',
			url: 'ajax_backend.php',
			data: { search: searchQuery },
			success: function (data) {
				$('#recipeSection').html(data);
			},
			error: function (xhr, status, error) {
				console.error('AJAX Error:', error);
			}
		});
	}

	// Attach an event listener to the search form submission
	$('form').on('submit', function (e) {
		e.preventDefault();
		var searchQuery = $('#search').val();
		fetchRecipes(searchQuery);
	});

	// Call the fetchRecipes function when the document is ready
	// This will display all recipes initially
	fetchRecipes('');

	// Optionally, you can set up an event listener for the search button click
	// and call fetchRecipes when the button is clicked.
});
