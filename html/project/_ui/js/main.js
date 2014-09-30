/*******************************************************************************

  Main JavaScript
  Author: Václav Vracovský (http://vracovsky.cz/)

*******************************************************************************/

$(function() {
	
	// Toggle menu
	$('.toggle-menu').on('click', function(e) {
		e.preventDefault();
		$('#navigation').toggle();
	});
	
});