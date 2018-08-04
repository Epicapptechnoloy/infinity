$.fn.alertPopup = function ($title, $msg, $buttonText){
	var htmlalert = '<div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index:9999999;">';
		htmlalert += '<div class="modal-dialog" role="document">';		  
		htmlalert += '<div class="modal-content">';
		htmlalert += '<div class="modal-header">';
		htmlalert += '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title text-center">'+$title+'</h4>';
		htmlalert += '</div>';
		htmlalert += '<div class="modal-body">';
		htmlalert += '<h4 class="text-center" id="error-msg">'+$msg+'</h4>';
		htmlalert += '</div>';
		htmlalert += '<div class="modal-footer">';
		htmlalert += '<div class=" col-md-4 col-md-offset-4  col-md-xs-4 col-xs-offset-4">';
		htmlalert += '<button type="button" class="btn btn-info" data-dismiss="modal">'+$buttonText+'</button>';
		htmlalert += '</div>';
		htmlalert += '</div>';
		htmlalert += '</div>';
		htmlalert += '</div>'
		htmlalert += '</div>';
	$("#FGCModalContainer").html(htmlalert);
	$("#error-modal").modal("show");	
}