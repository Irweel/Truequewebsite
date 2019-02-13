


function markAsRead(){
    $.get('/markAsRead');
}

function toggler(divId) {
    $("." + divId).toggle();
}
// Options
var options = {
    max_value: 5,
    step_size: 0.5,
    initial_value: 0,
    selected_symbol_type: 'utf8_star', // Must be a key from symbols
    cursor: 'default',
    readonly: false,
    change_once: false, // Determines if the rating can only be set once
    ajax_method: 'POST',
    url: '/postajax',
    additional_data: {
    } // Additional data to send to the server
}

$(".rating").rate(options);

$(document).ready(function(){
  $("#hola").click(function(){
    var rate =  $(".rating").rate("getValue");
    $(".sent").html(rate);
    $(".rating").rate("setAdditionalData", {id: 42});

    $.ajax({
      method: 'POST',
      url: '/postajax',
      data: {
          rate: rate
       },
  });




  });
});
