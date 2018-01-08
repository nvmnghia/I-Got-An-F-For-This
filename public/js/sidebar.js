var requestTypes = ['my-requests', 'involved-requests', 'my-assigned', 'team-requests'];
var requestStates = ['all', 'new', 'in-progress', 'feedback', 'out-of-date', 'closed'];
for (var i = 0; i < requestTypes.length; i++) {
	for (var j = 0; j < requestStates.length; j++) {
		console.log($('#' + requestTypes[i] + '-' + requestStates[j]).length);

		$('#' + requestTypes[i] + '-' + requestStates[j]).click(function() {
			$.ajax({
				url: "view-tickets.txt",
				success: function(result){
		        	$("#content-frame").html(result);
		        	loadTicketsView('array.txt');
		    	}
		    });
		})
	}
}