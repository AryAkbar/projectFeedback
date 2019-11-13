$(document).ready(function() {

    function notifad(view = ''){
        const iku = $('.notif').data('notifes');
        $.ajax({
            url:"index.php?url=admin/notif",
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
        notifad();

    $(document).on('click', '.ntap', function(){
        notifad('mantapo');
        $('#gar').removeClass('pulse');
    });

    setInterval(function(){
        notifad();
    }, 1000);
	
	$('#key-search').on('keyup', function(){
		var vale = $('#key-search').val();
		$.ajax({
			url: 'index.php?url=caree',
			data: {vale:vale},
			dataType: 'json',
			method: 'post',
			success: function(data){
				console.log(data);
				var ana = "";
				var no = 1;
				data.forEach(function(val){
				ana += "<tr>";
				ana += "<td>"+(no++)+"</td>";
				ana += "<td>"+val.id_user+"</td>";
				ana += "<td>"+val.name+"</td>";
				ana += "<td>"+val.tgl_lahir+"</td>";
				ana += "<td>"+val.alamat+"</td>";
				ana += "<td>"+val.email+"</td>";
				ana += "<td><button class='btn btn-danger deleteUser mr-2' data-toggle='modal' data-target='#modalDelete'>Hapus</button><button class='btn btn-warning editUser' onclick='Edit("+val.id_user+")' data-toggle='modal' data-target='#modalTambah'>Edit</button></td>";
				ana += "</tr>";
			});
			$('#ceeeb').html(ana);
			}
		});
	});
});

$('#summernote').summernote({
	height : 150,
	placeholder : "Tulis Komentar Anda",
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
$('#biografi').summernote({
	height : 100,
	placeholder : "Tulis Biografi Anda"
});

	function Edit(id){
	$('#judule').html('Edit Data Anggota KRITIKKU');
	$('.modal-body form').attr('action', 'index.php?url=admin/edit/user');
	$('button[type="submit"]').html('Edit Data User').attr('class', 'btn btn-warning float-right');
	$('#passjs').attr('type', 'hidden');
 	$('#pasjs')[0].style.display = "none";

	$.ajax({
		url : 'index.php?url=show',
		data : {id : id},
		method :'post',
		dataType : 'json',
		success : function(data){
			$('#iki').val(data[0].id_user);
			$('#name').val(data[0].name);
    		$('#email').val(data[0].email);
    		$('#user').val(data[0].username);
    		$('#passjs').val(data[0].password);
    		$('#tgljs').val(data[0].tgl_lahir);
    		$('#alamatjs').val(data[0].alamat);
    		$('#nohp').val(data[0].phone);
    		$('#poss').val(data[0].position);
    		$('#bio').val(data[0].biografi);
		}
	});
}

$(".deleteUser").on('click', function(){
	$('button[type="submit"]').html('Hapus Data User').attr('class', 'btn btn-danger float-right');
	const id = $(this).data('id');
	$.ajax({
		url : 'index.php?url=show',
		data : {id :id},
		method : 'post',
		dataType : 'json',
		success : function(data){
			$('#hpid').val(data[0].id_user);
			console.log(data);
		}
	});

});

$(".addUser").on('click', function(){
	$('#judule').html('Tambah Data Anggota KRITIKKU');
	$('button[type="submit"]').html('Tambah Data User').attr('action', 'index.php?url=admin_user_insert');
			$('#passjs').attr('type', 'password').val("");
			$('#name').val("");
    		$('#email').val("");
    		$('#user').val("");
    		$('#tgljs').val("");
    		$('#alamatjs').val("");
    		$('#nohp').val("");
    		$('#poss').val("");
    		$('#bio').val("");
    		$('#passjs')[0].style.display = "block";
    		$('#pasjs')[0].style.display = "block";
});

function komenForm() {

    $('textarea[name="komentar"]').html($('#summernote').code());
}