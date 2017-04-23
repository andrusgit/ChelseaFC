$(document).ready(function(){
	//$('#begindate').datepicker.setDefaults(
		//$.extend(
			//{'dateFormat':'dd-mm-yy'},
			//$.datepicker.regional['et']
		//)
	//);
    var options={
      format: 'dd/mm/yyyy',
      todayHighlight: true,
      autoclose: true,
	  startDate: "dateToday"
    };
	
    $('#begindate').datepicker(options);
	$('#enddate').datepicker(options);
	
 })