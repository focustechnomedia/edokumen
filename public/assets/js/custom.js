$(document).ready(function() {

//--------- HANDLE BUTTON MODAL CLICK ------------------
    $('.btn-modal').click(function(e) {
      e.preventDefault();
      //alert($(this).attr('href'));
      load_modal($(this).attr('href'));
   });

//---------------- LOAD MODAL --------------------------
   function load_modal(url) {
      setTimeout(function(){
         $("#myModal").load(url, function(response, status, xhr){

            if (status=="error") {
               alert('Terjadi Kesalahan');
               //$("#load-animasi").fadeOut(300);
            }
            else {
               //$("#load-animasi").fadeOut(300);
               $("#myModal").modal("show");
            }
         });
      },400);
   }
//--------------- SWAL ----------------------------------------
    $('.swal').click(function(e){
    e.preventDefault();
    let href = ($(this).attr("href"));

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data akan terhapus permanen dari database anda !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus !'
            }).then((result) => {
            if (result.value) {
                    location.replace(href);
                }
        })
    })
//----------------------------------------------------------------
});
