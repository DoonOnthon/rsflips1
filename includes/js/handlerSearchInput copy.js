$(document).ready(function () {
  // Handler for search input
  $('#itemSearch').on('input', function () {
    // Get search query
    var itemSearch = $(this).val()

    // Send AJAX request to get matching items
    $.ajax({
      url: 'includes/searchItems.php',
      type: 'POST',
      data: { itemSearch: itemSearch },
      dataType: 'json',
      success: function (items) {
        // Get suggestions container
        var suggestionsContainer = $('#suggestions')

        // Clear the suggestions container
        suggestionsContainer.empty()

        // If there are matching items
        if (items.length > 0) {
          // Loop through the matching items
          $.each(items, function (index, item) {
            // Create a suggestion element
            var suggestion = $('<div>')
              .addClass('suggestion')
              .text(item.itemName)

            // Add a click event listener to set the value of the search input to the clicked suggestion
            suggestion.on('click', function () {
              // Set the value of the search input to the clicked suggestion
              $('#itemSearch').val(item.itemName)

              // Show the modal with details of the clicked item
              $('#itemInfoModal').modal('show');

              // Clear the suggestions container
              suggestionsContainer.empty()
            })

            // Append the suggestion element to the suggestions container
            suggestionsContainer.append(suggestion)
          })
        }
      },

      error: function (xhr, status, error) {
        console.error('Error:', error) // log the error message
      },
    })
  })
})
