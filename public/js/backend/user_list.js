$(".selectall").click(function(){
    $(".individual").prop("checked",$(this).prop("checked"));
});
var checkboxes = $("input[type='checkbox']"),
    submitButt = $("input[type='submit']");

checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
});