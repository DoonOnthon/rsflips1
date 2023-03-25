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
        console.log('Success:', items)

        // Get suggestions container
        var suggestionsContainer = $('#suggestions')

        // Clear the suggestions container
        suggestionsContainer.empty()

        // If there are matching items
        if (items.length > 0) {
          var latestItems = {};

          // Loop through the matching items
          $.each(items, function (index, item) {
            latestItems[item.itemName] = item;
          });

          // Loop through the latestItems object
          $.each(latestItems, function (itemName, itemData) {
            // Create a suggestion element
            console.log(itemData)
            var suggestion = $('<div>')
              .addClass('suggestion')
              .text(itemData.itemName)
              .data('item', itemData) // Store the item data on the suggestion element

            // Add a click event listener to set the value of the search input to the clicked suggestion
            suggestion.on('click', function () {
              $('#itemSearch').val(itemData.itemName)

              // Clear the suggestions container
              suggestionsContainer.empty()

              // Show the item information div
              $('#itemInfo').show()

              // Populate the item information
              console.log('Setting itemName:', itemData.itemName)
              $('#modalItemName').text(itemData.itemName)
              $('#price').text(itemData.price)
              $('#sellPriceInformationSearch').text(itemData.sellPrice);
              $('#sellPrice').html('<strong>' + itemData.sellPrice + '</strong>');
              $('#itemTimeInfoSearch').text(itemData.time)
              $('#description').text(itemData.description)
              $('#usernameInformation').text(itemData.username);

              console.log(itemData)

              renderPriceChart(itemData.itemName);
            })

            // Append the suggestion element to the suggestions container
            suggestionsContainer.append(suggestion)
          });
        }
      },

      error: function (xhr, status, error) {
        console.error('Error:', error) // log the error message
      },
    })
  })
})



// ############...CHART SCRIPT...###############
function renderPriceChart(itemName) {
  $.ajax({
    url: 'includes/fetchPriceData.php',
    type: 'GET',
    data: { itemName: itemName },
    dataType: 'json',
    success: function (data) {
      // Prepare the data for the chart
      var labels = data.map(function (item) { return item.time; });
      var prices = data.map(function (item) { return item.price; });
      var sellPrices = data.map(function (item) { return item.sellPrice; });

      // Sort the labels based on time
      labels.sort(function(a, b) {
        return new Date(a) - new Date(b);
      });

      // Create the chart
      var ctx = document.getElementById('priceChart').getContext('2d');
      var chart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [
            {
              label: 'Buy Price',
              data: prices,
              borderColor: 'rgba(75, 192, 192, 1)',
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              fill: false,
            },
            {
              label: 'Sell Price',
              data: sellPrices,
              borderColor: 'rgba(255, 99, 132, 1)',
              backgroundColor: 'rgba(255, 99, 132, 0.2)',
              fill: false,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: true,
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    },
    error: function (xhr, status, error) {
      console.error('Error fetching price data:', error);
    },
  });
}
