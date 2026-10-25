<form action="{{ url($url, $id) }}" method="post" style="display: inline-block;" class="delete-form">
    @csrf
    @method('delete')
    <button type="button" class="btn btn-danger" title="Hapus Data" onclick="confirmDelete(this)">
        <i class="fa fa-trash"></i> Hapus
    </button>
</form>

@once
    <script>
        if (typeof window.confirmDelete === 'undefined') {
            window.confirmDelete = function(button) {
                const form = button.closest('form');
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        title: 'Konfirmasi Hapus',
                        text: 'Apakah Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: '<i class="fas fa-trash mr-1"></i> Ya, Hapus!',
                        cancelButtonText: '<i class="fas fa-times mr-1"></i> Batal',
                        reverseButtons: true,
                        focusCancel: true,
                        customClass: {
                            confirmButton: 'btn btn-danger ml-2',
                            cancelButton: 'btn btn-secondary'
                        },
                        buttonsStyling: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                } else if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    form.submit();
                }
            };
        }
    </script>
@endonce
