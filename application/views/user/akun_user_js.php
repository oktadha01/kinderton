<script>
    $(document).ready(function() {
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
        <?php
        $id_user = $this->session->userdata("id_user");
        $sql = "SELECT * FROM user WHERE id_user = $id_user";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) :
        ?>
                $('#kota_tujuan').select2({
                    placeholder: '<?php echo $data->kota; ?>',
                    language: "id"
                });
        <?php
            endforeach;
        }
        ?>
    });
    $('#btn-simpan-user').hide();
    $('#btn-batal-user').hide();
    $('#btn-edit-user').click(function(e) {
        $('#btn-simpan-user,#btn-batal-user').show(200);
        $('#btn-edit-user').hide();
        $('.kota_tujuan').removeClass('input_disabled').removeAttr('disabled');
        $('#nm-user,#gmail,#kontak,#alamat').removeClass('input_disabled').removeAttr('readonly');
        $("#kota_tujuan, option[value=<?php echo $data->id_kota; ?>]").attr("selected", "selected");
        $('#kota_tujuan').select2({
            placeholder: '<?php echo $data->kota; ?>',
            language: "id"
        });

    });
    $('#btn-batal-user').click(function(e) {
        $('#btn-simpan-user,#btn-batal-user').hide();
        $('#btn-edit-user').show(200);
        $('.kota_tujuan').addClass('input_disabled').attr('disabled');
        $('#nm-user,#gmail,#kontak,#alamat').addClass('input_disabled').attr('readonly');
    });

    $('#btn-simpan-user').click(function(e) {
        var val_kota_tujuan = $("#kota_tujuan").find(':selected').val();
        var text_kota_tujuan = $("#kota_tujuan").find(':selected').text();
        alert(val_kota_tujuan + text_kota_tujuan)
        let formData = new FormData();
        formData.append('id-user', <?= $this->session->userdata("id_user"); ?>);
        formData.append('nm-user', $('#nm-user').val());
        formData.append('gmail', $('#gmail').val());
        formData.append('kontak', $('#kontak').val());
        formData.append('kota', text_kota_tujuan);
        formData.append('id-kota', val_kota_tujuan);
        formData.append('alamat', $('#alamat').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('user/edit_user'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(msg) {
                alert(msg);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });
</script>