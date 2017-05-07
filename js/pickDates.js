$(document).ready(function(){
	//$('#begindate').datepicker.setDefaults(
		//$.extend(
			//{'dateFormat':'dd-mm-yy'},
			//$.datepicker.regional['et']
		//)
	//);
    var options={
      format: 'yyyy-mm-dd 12:00:00',
      todayHighlight: true,
      autoclose: true,
	  startDate: "dateToday"
    };
	
    $('#begindate').datepicker(options);
	$('#enddate').datepicker(options);
	
 })