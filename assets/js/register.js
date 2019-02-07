$(document).ready(function(){ // When the page is loaded
    
    // On click signup, hide login and show registration form
    $('#signup').click(function(){
        $("#first").slideUp("slow", function(){ // Call back
            $("#second").slideDown("slow");
        });
    });

    // On click login, hide registration form and show login
    $('#signin').click(function(){
        $("#second").slideUp("slow", function(){ // Call back
            $("#first").slideDown("slow");
        });
    });
});