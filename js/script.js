$(document).ready(function(){ 

	$("#reservationEmail").css( "display", "none" );
	$("#lblemail").css( "display", "none" );

	$("#confirmReservation").on('click',function(){
	if($("#confirmReservation").is(":checked")){
		
		$("#reservationEmail").css( "display", "block" );
		$("#lblemail").css( "display", "block" );

	}else{

		$("#reservationEmail").css( "display", "none" );
		$("#lblemail").css( "display", "none" );

	}
	});
	
});