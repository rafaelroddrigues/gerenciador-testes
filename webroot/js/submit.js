$(function(){
    $("select").on("change", function(){
    $("#submit-button").toggle(!!this.value);
    }).change();
});