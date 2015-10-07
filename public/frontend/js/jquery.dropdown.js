$(function () {
//
$('.dropdown li').hover(
	function () {
		$('.sub_menu', this).stop(true, true).slideDown(); /*slideDown the subitems on mouseover*/
	}, function () {
		$('.sub_menu', this).stop(true, true).slideUp();  /*slideUp the subitems on mouseout*/
	});
//
});