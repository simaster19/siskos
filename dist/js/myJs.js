//AJAX for Tambah Data Admin




function addDataAdmin(){
    $.ajax({
        type: 'POST',
        url : '../../admin/tambah_admin.php',
        data : data,
        processData : false,
        contentType : false,
        cache : false,
        success : function(result){
            //alert(result);
        }
    })
}

function hapusAdmin(id){
    let id = id;

    $.ajax({
        type: 'GET',
        url: '../../admin/hapus_admin.php',
        data:{idAdmin:id},
        success: function(){

        }

    })
}