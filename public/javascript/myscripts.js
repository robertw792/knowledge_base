
//
// // Form validation
// $('input[placeholder]').blur(function() {
// 	$("div.error").remove();
// 	var myPattern = $(this).attr('pattern');
// 	var myPlaceholder = $(this).attr('placeholder');
// 	var isValid = $(this).val().search(myPattern) >= 0;
//
// 	if (!isValid) {
// 		$(this).focus();
// 		$(this).after('<div class="error">Entry Does not match expected pattern: ' + myPlaceholder + '</div>');
// 	}// isValid test
// }); // onblur
function confirm_alert(node) {

    return confirm("You are about to permanently delete a record. Are you sure you want to do this?");

}
