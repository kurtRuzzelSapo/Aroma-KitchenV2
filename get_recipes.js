$(document).ready(function () {

    // Function to open the update modal
    window.openUpdateModal = function (
        recipeId,
        currentTitle,
        currentDescription,
        currentSteps
    ) {
        // Set the recipeId as a data attribute in the modal for later retrieval
        $('#updateModal').attr('data-recipe-id', recipeId);

        document.getElementById('updateTitle').value = currentTitle;
        document.getElementById('updateDescription').value = currentDescription;
        document.getElementById('updateSteps').value = currentSteps;

        var modal = document.getElementById('updateModal');
        modal.style.display = 'block';
    };

    // Function to close the update modal
    window.closeModal = function () {
        var modal = document.getElementById('updateModal');
        modal.style.display = 'none';
    };

    // Function to delete a recipe
    window.deleteRecipe = function (recipeId) {
        if (confirm("Are you sure you want to delete this recipe?")) {
            $.ajax({
                url: 'get_recipes.php',
                method: 'POST',
                dataType: 'json',
                data: { action: 'delete', id: recipeId },
                success: function (response) {
                    if (response.success) {
                        console.log(response.message);
                        // Reload or update the recipe list after successful deletion
                        location.reload();
                    } else {
                        console.error(response.message);
                    }
                },
                error: function () {
                    console.error('Error deleting recipe.');
                }
            });
        }
    };

    // Function to save the update
    window.saveUpdate = function () {
        var recipeId = $('#updateModal').data('recipe-id'); // Retrieve the recipeId from the modal's data attribute
        var updatedTitle = document.getElementById('updateTitle').value;
        var updatedDescription = document.getElementById('updateDescription').value;
        var updatedSteps = document.getElementById('updateSteps').value;

        $.ajax({
            url: 'get_recipes.php',
            method: 'POST',
            dataType: 'json',
            data: {
                action: 'update',
                id: recipeId,
                newTitle: updatedTitle,
                newDescription: updatedDescription,
                newSteps: updatedSteps
            },
            success: function (response) {
                if (response.success) {
                    console.log(response.message);
                    // Reload or update the recipe list after successful update
                    location.reload();
                } else {
                    console.error(response.message);
                }
            },
            error: function () {
                console.error('Error updating recipe.');
            }
        });

        // Close the modal
        closeModal();
    };

    // AJAX request to get recipes
    $.ajax({
        url: 'get_recipes.php',
        method: 'GET',
        dataType: 'json',
        success: function (recipes) {
            if (recipes.length > 0) {
                var recipesListHtml = '<ul class="rep">';
                $.each(recipes, function (index, recipe) {
                    recipesListHtml += '<li class="re-item">';
                    recipesListHtml += '<p>ID: ' + recipe.id + '</p>';
                    recipesListHtml += '<p>Title: ' + recipe.title + '</p>';
                    recipesListHtml +=
                        '<button onclick="openUpdateModal(' +
                        recipe.id +
                        ", '" +
                        recipe.title +
                        "', '" +
                        recipe.description +
                        "', '" +
                        recipe.steps +
                        '\')">Update</button>';

                    recipesListHtml +=
                        '<button onclick="deleteRecipe(' + recipe.id + ')">Delete</button>';
                    recipesListHtml += '</li>';
                });
                recipesListHtml += '</ul>';
                $('.saved-recipe-data').html(recipesListHtml);
            } else {
                $('.saved-recipe-data').html('<p>No recipes found.</p>');
            }
        },
        error: function () {
            $('.saved-recipe-data').html('<p>Error fetching recipes.</p>');
        }
    });
});