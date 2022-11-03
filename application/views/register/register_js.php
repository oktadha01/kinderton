<script>
    $(document).ready(function() {
        // alert('ya');

        $('#kota_asal').select2({
            placeholder: 'Pilih kota/kabupaten asal',
            language: "id"
        });

        $('#kota_tujuan').select2({
            placeholder: 'Pilih kota/kabupaten tujuan',
            language: "id"
        });

        $.ajax({
            url: "<?php echo site_url('Data_kota/kota_asal'); ?>",
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // alert(data)
                $("#kota_asal").html(data);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
        $('#kota_tujuan').click(function(e) {
            $.ajax({
                url: "<?php echo site_url('Data_kota/kota_tujuan'); ?>",
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    // alert(msg)
                    $("select#kota_tujuan").html(msg);

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        });
        $.ajax({
            url: "<?php echo site_url('Data_kota/kota_tujuan'); ?>",
            cache: false,
            processData: false,
            contentType: false,
            success: function(msg) {
                // alert(msg)
                $("select#kota_tujuan").html(msg);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });

        $('#btn-simpan-register').click(function(e) {
            e.preventDefault();
            var val_kota_tujuan = $("#kota_tujuan").find(':selected').val();
            var text_kota_tujuan = $("#kota_tujuan").find(':selected').text();
            // alert('ya')
            // alert(text_kota_tujuan + val_kota_tujuan);
            let formData = new FormData();
            formData.append('nm-user', $('#nm-user').val());
            formData.append('gmail', $('#gmail').val());
            formData.append('kontak', $('#kontak').val());
            formData.append('password', $('#password').val());
            formData.append('alamat', $('#alamat').val());
            formData.append('id-kota', val_kota_tujuan);
            formData.append('kota', text_kota_tujuan);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Register/simpan_data_user'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    alert(msg);
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('Login/reg_login'); ?>",
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(msg) {
                            // alert(msg);
                            window.location.assign("<?php echo base_url('dashboard'); ?>");
                        },
                        error: function() {
                            alert("Data Gagal Diupload");
                        }
                    });

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        });

    });
</script>