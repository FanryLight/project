function funcSuccess(data){
	
	$("#text").html(data);
	
	
}

$(document).ready(function (){
	
	$(".menu").click(function()
	{
		var page = this.href;
		event.preventDefault();
		history.pushState('', '', page);
		$.ajax (
		{
			url: "/ajax",
			type: "POST",
			data: ({url: page}),
			dataType: "html",
			success: funcSuccess
		});	
		
	});
});