$(document).ready(function(){
		
			
	AJAX = {};      

   	AJAX.postSong = function() {
        song = $('input#song').val();
        $.ajax({
          data: "song=" + song,
          dataType: 'html',
          type: 'post',
          error: function(data) {
            alert('ajax error');
            console.log('error while getting: ' + data);
          },
          success: function(data) { 
            $('#newDiv').empty();
            $('#newDiv').append(data);
          },   
          url: 'get.php'
        }); 
      }  

	$('input#send').click(function(){

		AJAX.postSong(); 

	});

	$('input.input').focus();

	$('input.input').focus(function() {
        $(this).val('');
    });

    $(document).keypress(function(e) {

    	if(e.which == 13 && $("input.input").is(":focus")) {

       		AJAX.postSong(); 
    	}

	});

});