$(document).ready(function() {
    // Add a listener to the search input field
    $("#itemSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase(); // Get the user's input and convert to lowercase
        $("#exampleFormControlSelect1 option").filter(function() { // Filter the select options based on the user's input
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});