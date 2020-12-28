$('#comment-submit ').on('click',function(e){
		if ( true != $('#wp-comment-cookies-consent').is(":checked") ) {
			alert('You must agree with Privacy Policy.');
			e.preventDefault();
		}
});