
function save_data(){
	$.ajax({
		url:window.location.protocol+'//'+window.location.host+'/index.php/main/appointment_insert',
		success:function(result){
			console.log(result);

			$("#myModal").modal();
		}
	});
}

