$(document).ready(function () {
	// AJAX request to get users
	$.ajax({
		url: 'get_users.php',
		method: 'GET',
		dataType: 'json',
		success: function (users) {
			if (users.length > 0) {
				var userListHtml = '<ul class="user-list">';
				$.each(users, function (index, user) {
					userListHtml += '<li class="user-item">';
					userListHtml += '<p>ID: ' + user.id + '</p>';
					userListHtml += '<p>Email: ' + user.email + '</p>';
					userListHtml += '</li>';
				});
				userListHtml += '</ul>';
				$('.saved-recipe-data').html(userListHtml);
			} else {
				$('.saved-recipe-data').html('<p>No users found.</p>');
			}
		},
		error: function () {
			$('.saved-recipe-data').html('<p>Error fetching users.</p>');
		}
	});
});
