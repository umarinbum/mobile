
function get_pro(){

	$.ajax({
        url: link2,
        dataType: "json",
        data: {
            txt : $("#search").val()
        },
        success: function(data) {
            response(data);
        }
    });

}
