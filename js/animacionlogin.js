$(document).ready(function() {
    $('#showlogin').click(function() {
      $('#loginpanel').slideToggle('slow', function() {
          $("#triangle_down").toggle(); 
          $("#triangle_up").toggle();
      });
    });
 });