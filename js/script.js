//failed attempt to implment search suggestion 
//$(document).ready(function() {
//     $("#movieSearch").on("input", function() {
//         var searchTerm = $(this).val();
//         if (searchTerm.length >= 3) {
//             // Make an AJAX request to the server to get search suggestions
//             $.ajax({
//                 url: "search_suggestions.php",
//                 method: "GET",
//                 dataType: "json",
//                 data: { term: searchTerm },
//                 success: function(response) {
//                     // Display the suggestions in a dropdown
//                     $("#suggestionsContainer").empty();
//                     for (var i = 0; i < response.length; i++) {
//                         $("#suggestionsContainer").append("<div>" + response[i] + "</div>");
//                     }
//                 }
//             });
//         } else {
//             // Clear suggestions if search term is too short
//             $("#suggestionsContainer").empty();
//         }
//     });
// });
$( function() {
    $( "#movieSearch" ).autocomplete({
    source: 'search_suggestions.php'  
    });
});