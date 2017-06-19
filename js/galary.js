$(function(){
	var fx ={
			"initModal" : function(){
				if($('.modal-window').length == 0){
					$('<div>').addClass('overlay').fadeTo( "slow" , 0.7).appendTo('body');
					return $('<div>').addClass('modal-window').appendTo('body');
				}else{
					return $('.modal-window');	
				}
			}
					
	}
	
			
	$('.galary img').bind('click',function(event){
		event.preventDefault();
		var data = $(this).attr('id');
		modal = fx.initModal();
		$('<a>').attr('href','#')
				.addClass('modal-close-btn')
				.html('&times;')
				.click(function(e){
									/*e.preventDefault();
									$(modal).remove();
									$('.overlay').remove();*/
									$(modal).fadeOut('slow',function(){
																$(this).remove();		
															});	
									$('.overlay').fadeOut('slow',function(){
																$(this).remove();	
															});						
										
								})
				.appendTo(modal);
		$.ajax({
			'url' : 'ajax.php',
			'data' : 'id='+data,
			'type' : 'POST',
			'success' : function(data){
						modal.append(data);
						},
			'error' : function(msg){
						modal.append(msg);
					}
		});
	});
});