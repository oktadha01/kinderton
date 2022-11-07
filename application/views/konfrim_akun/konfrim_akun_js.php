<script>
    $("#form-edit-email").hide();
    $(".loader-konf-akun").attr('hidden', true);
    $("#form-edit-email").removeAttr('hidden', true);
    $("#btn-edit-email").click(function() {
        $("#form-edit-email").toggle(300);

    });
    $('.btn-edit-input-email').click(function() {
        $('#gmail').removeClass('input_disabled').removeAttr('disabled', true);
    });
    $('#btn-kirim-ulang-email').click(function() {

        $(".loader-konf-akun").removeAttr('hidden',true);
        $("#form-edit-email").toggle(300);
        let formData = new FormData();
        formData.append('gmail', $('#gmail').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Konfrim_akun/kirim_ulang_email'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(msg) {
                if (msg == 'Sukses') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        type: 'success',
                        title: 'E-mail Berhasil Di kirim'
                    })
                    $(".loader-konf-akun").attr('hidden', true);
                }
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });
</script>