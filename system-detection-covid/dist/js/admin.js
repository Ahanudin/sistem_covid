// dropdown menu apabila didalam class menu li kok ada ul lagi bearti itu dropdown
// bila a di klik apa yang  terjadi
$(".menu li > a").click (function(e){
// yang terjadi ngeslide up dan ngeslide down apabila punya anak menu
	$(".menu ul ul").slideUp(), $(this).next().is(":visible") || $(this).next().slideDown(),e.stopPropagation()
})

//bila yang membuka kurang dari 768px
$(window).bind("load resize", function(){
	if($(this).width() < 768)
	{
		$(".sidebar-collapse").addClass("collapse");
	}
	else
	{
		$(".sidebar-collapse").removeClass("collapse");
		$(".sidebar-collapse").removeAttr("style");
	}
})