$(document).ready(function() {
  // Add click event listener to item links
  $('.itemName-link').click(function(event) {
    event.preventDefault(); // Prevent default link behavior
    var itemID = $(this).data('itemid'); // Get itemID from data attribute
    var itemIDauto = $(this).data('itemidauto'); // Get itemIDauto from data attribute
    var itemName = $(this).data('itemname'); // Get item name from data attribute
    var price = $(this).data('price'); // Get price from data attribute
    var time = $(this).data('time'); // Get time from data attribute
    var id = $(this).data('id'); // Get id from data attribute

    // Remove any previous modals
    $('.modal').remove();

    // Make AJAX request to retrieve additional information
    $.ajax({
      url: 'includes/get_item_info.php', // Replace with the URL of your PHP script to retrieve item information
      type: 'POST',
      data: {itemName: itemName, price: price, itemID: itemID, itemIDauto: itemIDauto, time: time, id: id},
      success: function(response) {
        // Create modal popup with additional item information
        var modal = '<div class="modal fade" tabindex="-1" role="dialog">';
        modal += '<div class="modal-dialog" role="document">';
        modal += '<div class="modal-content">';
        modal += '<div class="modal-header">';
        modal += '<h5 class="modal-title">' + itemName + ' (' + itemID + ')</h5>';
        modal += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        modal += '<span aria-hidden="true">&times;</span>';
        modal += '</button>';
        modal += '</div>';
        modal += '<div class="modal-body">';
        modal += '<p>Player ID: ' + id + '</p>';
        modal += '<p>Price: ' + parseFloat(price).toLocaleString() + "</br>" + "Edit price below" +'</p>';
        modal += '<div class="modal-body">';
        modal += '<input type="number" class="form-control" name="price" value="' + parseFloat(price).toLocaleString() + '">';
        modal += '</div>';
        modal += '<p>Time: ' + time + '</p>';
        modal += '<p>Item ID: ' + itemID + '</p>';
        modal += '<p>Item ID Auto: ' + itemIDauto + '</p>';
        modal += '</div>';
        // Add modal footer with close button
        modal += '<div class="modal-footer">';
        modal += '<div class="modal-footer">';
        modal += '<button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>';
        modal += '</div>';
        modal += '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
        modal += '</div>';
        modal += '</div>';
        modal += '</div>';
        modal += '</div>';

        // Append modal to body and show it
        $('body').append(modal);
        $('.modal').modal('show');

        // Add click event listener to "Save" button
        $('#saveChangesBtn').click(function(event) {
          event.preventDefault(); // Prevent default button behavior

          // Retrieve new values from input fields
          var newPrice = $('input[name="price"]').val();

  // Make AJAX request to update database
  $.ajax({
    url: 'includes/update_item_info.php', // Replace with the URL of your PHP script to update item information
    type: 'POST',
    data: {itemIDauto: itemIDauto, price: newPrice},
    success: function(response) {
      // Display success message
      alert('Changes saved successfully');
    },
    error: function(xhr, status, error) {
      console.log('Error:', error);
    }
  });
});

      },
        error: function(xhr, status, error) {
          console.log('Error:', error);
        }
        
      });
      });
    });