var url = 'http://www.proyecto-laravel.com'

window.addEventListener("load", function(){

	$('.btn-like').css('cursor', 'pointer')
	$('.btn-dislike').css('cursor', 'pointer')

	function like(){
		$('.btn-like').unbind('click').click(function(){
			console.log(like);
			$(this).addClass('btn-dislike').removeClass('btn-like');
			$(this).attr('src', url+'/storage/heart-red.png');

			$.ajax({
				url: url+'/like/'+$(this).data('id'),
				type: 'GET',
				success: function(response){
					console.log(response);
				}
			});

			dislike();
		});
	}

	like();

	function dislike(){
		$('.btn-dislike').unbind('click').click(function(){
			$(this).addClass('btn-like').removeClass('btn-dislike');
			$(this).attr('src', url+'/storage/heart-black.png');

			$.ajax({
				url: url+'/dislike/'+$(this).data('id'),
				type: 'GET',
				success: function(response){
					console.log(response);
				}
			});

			like();
		});
	}

	dislike();

	//Buscador

	$('#buscador').submit(function(){
		$(this).attr('action', url+'/users/'+$('#buscador #search').val());
	});
});