$('#activarDepreciacion').change(function() {
	if ($(this).is(':checked') ){
		$('#divDepreciacion').css("display","block");
	}else{
		$('#divDepreciacion').css("display","none");
	}
});