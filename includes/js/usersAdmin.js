$(document).ready(function() {
  // Add click event listener to username links
  $('.username-link').click(function(event) {
    event.preventDefault(); // Prevent default link behavior
    var email = $(this).data('email'); // Get email from data attribute
    var id = $(this).data('id'); // Get id from data attribute
    var admin = $(this).data('admin'); // Get admin from data attribute
    // Remove any previous modals
    $('.modal').remove();
    // Make AJAX request to retrieve additional information
    console.log();
    $.ajax({
      url: 'includes/get_user_info.php', // Replace with the URL of your PHP script to retrieve user information
      type: 'POST',
      data: { email: email, id: id, admin: admin},
      success: function(response) {
  // Extract the username from the link's text content
  var username = $(event.target).text();
  // Create modal popup with additional user information
  var modal = '<div class="modal fade" tabindex="-1" role="dialog">';
  modal += '<div class="modal-dialog" role="document">';
  modal += '<div class="modal-content">';
  modal += '<div class="modal-header">';
  modal += '<h5 class="modal-title">' + username + ' (' + email + ')</h5>';
  modal += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
  modal += '<span aria-hidden="true">&times;</span>';
  modal += '</button>';
  modal += '</div>';
  modal += '<div class="modal-body">';
  modal += '<p>ID: ' + id + '</p>';
  modal += '<p>Admin: ' + admin + '</p>';
  modal += '</div>';
  // Add modal footer with close button
  modal += '<div class="modal-footer">';
  modal += '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
  modal += '</div>';
  modal += '</div>';
  modal += '</div>';
  modal += '</div>';

  // Append modal to body and show it
  $('body').append(modal);
  $('.modal').modal('show');
},
  error: function(xhr, status, error) {
    console.log('Error:', error);
  }
});
});
});
