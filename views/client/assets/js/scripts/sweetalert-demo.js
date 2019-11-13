$(function(){
    $('.sweet-1').click(function(){
        swal("Here's a message!", "Here's a under text");
    });
    $('.sweet-2').click(function(){ swal("Here's a message!", "Here's a under text", 'success'); });
    $('.sweet-3').click(function(){ swal("Here's a message!", "Here's a under text", 'error'); });  
    $('.sweet-4').click(function(){ swal("Here's a message!", "Here's a under text", 'info'); });   
    $('.sweet-5').click(function(){
        swal({
            title: "Apa Anda Yakin?",
            text: "Keluhan Yang Ditutup Tidak Dapat Dibuka Kembali",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn-warning',
            confirmButtonText: 'Ya, Tutup Keluhan',
            closeOnConfirm: false,
        },function(){
            swal("Berhasil!", "Keluhan Anda Telah Ditutup.", "success");
        });
    });   

    $('.sweet-6').click(function(){
        swal({
            title: "Apa Anda Yakin?",
            text: "Keluhan Yang Ditutup Tidak Dapat Dibuka Kembali",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn-warning',
            confirmButtonText: 'Ya, Tutup Keluhan',
            closeOnConfirm: false,
        },function(){
            swal("Berhasil!", "Keluhan Anda Telah Ditutup.", "success");
        });
    });


    $('.sweet-7').click(function(){
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn-warning',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
            closeOnCancel: false
        },function(isConfirm) {
          if (isConfirm) {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
          } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
          }
        });
    }); 
});