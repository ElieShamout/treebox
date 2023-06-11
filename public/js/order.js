/* Calculation of transportation cost */
$(document).ready(function(){
    // Add event [keyup] on input [order weight]
    $("[name=order_weight]").keyup(function(event){
        // get value input [order weight] 
        const val=$("[name=order_weight]").val() ?? 0;
        // view transportation cost
        $(".cost_value").text(val*5);
    });
});