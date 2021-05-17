$('.tombol-hapus').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Apakah anda yakin menghapus data?',
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Saya yakin',
        cancelButtonText: 'Batalkan'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })
})