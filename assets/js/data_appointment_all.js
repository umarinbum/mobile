
function toggle_modal(id)
{
	$("#myModal").modal();
	$("#btn_modal_link").attr('href', window.location.protocol+'//'+window.location.host+'/main/cancle_appointment/'+id);
}


function more_detail(message)
{
	$("#myModal2").modal();
	$("#modal_2_p").text(message);
}