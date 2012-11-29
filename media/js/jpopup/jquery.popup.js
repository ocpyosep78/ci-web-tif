/* Author : Airlangga bayu seto 
 * Contact : qu4ck@iso.web.id
 * */
 
$(document).ready(function() {
	$('a[name=modal]').click(function(e) {
		e.preventDefault();

		//Ambil isi dari attribut href dari Tag a
		var id = $(this).attr('href');

		//deklarasi variabel panjang dan lebar pada layar
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();

		//masukkan panjang dan lebar layar pada id mask
		$('#bg_popup').css({'width':maskWidth,'height':maskHeight});

		//cuma effect untuk mempermanis :)
		$('#bg_popup').fadeIn(1000);
		$('#bg_popup').fadeTo("slow",0.8);

		//untuk menampilkan besar window yang ditampilkan
		var winH = $(window).height();
		var winW = $(window).width();

		//posisikan popup pada tengah layar
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);

		//Tampilkan selama 2 detik (untuk Effect saja)
		$(id).fadeIn(2000);
	});

	//Ketika Tombol Close ditekan
	$('.window .close').click(function (e) {
		e.preventDefault();

		$('#bg_popup').hide();
		$('.window').hide();
	});

	//bila pada area bg_popup diklik
	$('#bg_popup').click(function () {
		$(this).hide();
		$('.window').hide();
	});
});
