$(function () {
     // start the ticker 
	$('#js-news').ticker({
            titleText: 'Noticias'
        });
	
	// hide the release history when the page loads
	$('#release-wrapper').css('margin-top', '-' + ($('#release-wrapper').height() + 20) + 'px');

});