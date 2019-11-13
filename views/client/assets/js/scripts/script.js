$(document).ready(function(){
	function notif(view = ''){
		const iku = $('.notif').data('notifes');
		$.ajax({
			url:"index.php?url=notif",
			method:'post',
			data:{view:view, no:iku},
			dataType:'json',
			success:function(data){
				$('.notif').html(data.daleman);
				if(data.koun > 0){
					$('#gar').addClass('pulse');
				}
			} 
		});
	}
		notif();

	$(document).on('click', '.ntap', function(){
 		notif('mantapo');
 		$('#gar').removeClass('pulse');
 		console.log('selamat ke klik');
	});
    function commenForm() {
  		$('textarea[name="komentar"]').html($('#komen').code());
  		notif();
  		console.log('mantap')
	}
	setInterval(function(){
 		notif();
	}, 1000);
});



$(".editKomen").on('click', function(){
	$('#labele').html('Edit Komentar');
	$('.modal-body form').attr('action', 'index.php?url=komentar/edit/act');
	$('.jud')[0].style.display = "none";
	$('#judul')[0].style.display = "none";
	$('.kel').html("Komentar :");
	const ide = $(this).data('id');

	$.ajax({
		url: 'index.php?url=komentar/edit',
		data : {id : ide},
		method :'post',
		dataType: 'json',
		success: function(data){
			$('#ide').val(data[0].id_komentar);
			$('#edited').summernote("code", data[0].komentar,{
        		height: "100px",
    		});
    		$('#idk').val(data[0].id_keluhan);
		}
	});
});

$(".hapusKomen").on('click', function(){
	$('#hapuslabel').html('Hapus Komentar');
	$('.modal-body form').attr('action', 'index.php?url=komentar/delete/act');
	$('#ulasan').html('Yakin Hapus Komentar Anda?');
	const ide = $(this).data('id');

	$.ajax({
		url: 'index.php?url=komentar/edit',
		data : {id : ide},
		method :'post',
		dataType: 'json',
		success: function(data){
			$('#idke').val(data[0].id_komentar);
		}
	});
});

$(".hapusKeluhan").on('click', function(){
	$('#hapuslabel').html('Hapus Keluhan');
	$('.modal-body form').attr('action', 'index.php?url=keluhan/delete/act');
	$('#ulasan').html('Yakin Hapus Keluhan Anda?');
	$('.bun').html('Hapus Keluhan').addClass('btn-danger')
	const ide = $(this).data('id');

	$.ajax({
		url: 'index.php?url=keluhan/edit',
		data : {id : ide},
		method :'post',
		dataType: 'json',
		success: function(data){
			$('#idke').val(data[0].id_keluhan);
		}
	});
});

$(".tutupkel").on('click', function(){
	$('#hapuslabel').html('Tutup Keluhan');
	$('.modal-body form').attr('action', 'index.php?url=rate');
	$('#ulasan').html('Keluhan Anda Sudah Terselesaikan?');
	$('.bun').html('Tutup Keluhan').addClass('btn-warning','rate').removeClass('btn-danger');
	$('.rating').removeClass('hidden');
	const ide = $(this).data('id');

	$.ajax({
		url: 'index.php?url=keluhan/edit',
		data : {id : ide},
		method :'post',
		dataType: 'json',
		success: function(data){
			$('#idke').val(data[0].id_keluhan);
		}
	});
});

$(".editKeluhan").on('click', function(){
	$('#labele').html('Edit Keluhan');
	$('.jud')[0].style.display = "block";
	$('#judul')[0].style.display = "block";
	$('.kel').html("Keluhan :");

	$('.modal-body form').attr('action', 'index.php?url=keluhan/edit/act');
	const ide = $(this).data('id');

	$.ajax({
		url: 'index.php?url=keluhan/edit',
		data : {id : ide},
		method :'post',
		dataType: 'json',
		success: function(data){
			$('#judul').val(data[0].judul);
			$('#ide').val(data[0].id_keluhan);
			$('#edited').summernote("code", data[0].deskripsi,{
        		height: "100px"
    		});
		}
	});
});

$('#summernote').summernote({
        height: 200,
        placeholder : "Tulis Keluhan Anda...",
        disableDragAndDrop : true,
    });

    $('#biograph').summernote({
        height: "100px",
        placeholder : "Tulis Biografi Anda..."
        
    });

     $('#komen').summernote({
        height: "100px",
        placeholder : "Tulis Komentar Anda...",
        disableDragAndDrop : true,
        toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']]
  ]
    });

   	$(function() {
            $('#datatable').DataTable({
                pageLength: 5,
                fixedHeader: true,
                responsive: true,
                "sDom": 'rtip'
            });
            var table = $('#datatable').DataTable();
            $('#key-search').on('keyup', function() {
                table.search(this.value).draw();
            });
            $('#type-filter').on('change', function() {
                table.column(4).search($(this).val()).draw();
            });
        });

    function postForm() {

    $('textarea[name="keluhan"]').html($('#summernote').code());
}
	function biografiForm() {

    $('textarea[name="biografi"]').html($('#biograph').code());
}

	function editcomForm() {

    $('textarea[name="editKeluhan"]').html($('#edited').code());
}