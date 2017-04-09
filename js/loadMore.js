$(document).ready(function() {
	var start = php_OFFERSPRESENTED;
	
	$('#loadMoreButton').click(function() {
		
		$('#loadMoreButton').hide();
		$.ajax({
			type: "POST",
			
			dataType: "json",
			
			url: "loadnews/"+start,

			success: function(h) {
				
				
				var i = start;
				var m = 0;
				
				$.each(h, function(key, value){
					
					if (m < php_OFFERSPRESENTED) {
						$("#offersTable").find('tbody')
						.append('<tr><td>' + value.Added + '</td>' + '<td><button type="button" class="btn link btn-primary-outline"  data-toggle="collapse" data-target="#demo' + i + '">' + value.Title + '</button></td>' + 
									
									'<td class = "text-nowrap">' + value.Hourprice+ '</td>' +
									'<td class = "text-nowrap">' + value.Start+ '</td>' +
									'<td class = "text-nowrap">' + value.Enddatetime + '</td>' +
									'<td class = "text-nowrap">' + value.Location+ '</td>' +
									
								'</tr>' +
								'<tr><td></td>' +
								'<td><div id="demo' + i + '" class="collapse">' +
									value.Description + '</div></td></tr>'
								);
					} else {
				
						$("#loadMoreButton").show();
					}
					i = i + 1;
					m = m + 1;
				});
				
				start = start + php_OFFERSPRESENTED;
			}

		});
		
		
	});
});
