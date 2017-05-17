
function confirm_data(id){
	$.ajax({
		url:window.location.protocol+'//'+window.location.host+'/ajax/confirm_appointment',
		type:'post',
		data:{id:id},
		success:function(result){
			console.log(result);
			$("#myModal").modal();
		}
	});
}

