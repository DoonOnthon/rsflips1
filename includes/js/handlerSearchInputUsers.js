$(document).ready(function () {
  // Handler for search input
  $('#userItemName').on('input', function () {
    // Get search query
    var itemSearch = $(this).val()

    // Send AJAX request to get matching items
    $.ajax({
      url: 'includes/searchItems.php',
      type: 'POST',
      data: { itemSearch: itemSearch },
      dataType: 'json',
      success: function (items) {
        console.log('Success: handlerSearchInputUsers.js')

        // Get suggestions container
        var suggestionsContainer = $('#userItemResults')

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
              .data('item', item) // Store the item data on the suggestion element

            // Add a click event listener to set the value of the search input to the clicked suggestion
            suggestion.on('click', function () {
              var itemData = $(this).data('item') // Retrieve the item data from the clicked suggestion
            
              $('#userItemName').val(itemData.itemName)
            
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
