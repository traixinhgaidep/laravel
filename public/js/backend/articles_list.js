$(".selectall").click(function(){
    $(".individual").prop("checked",$(this).prop("checked"));
});
var checkboxes = $("input[type='checkbox']"),
    submitButt = $("#delete-btn");

checkboxes.click(function() {
    submitButt.attr("disabled", !checkboxes.is(":checked"));
});