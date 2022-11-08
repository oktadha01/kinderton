<script>
    $(document).ready(function() {
        $('.notif-pesanan').load('<?php echo site_url('chekout/notif_vali_pesanan'); ?>');
        $('.notif-pesanan_dikirim').load('<?php echo site_url('chekout/notif_pesanan_dikirim'); ?>');

        $('.form-data').load('<?php echo site_url('Olah_data/jenis_produk'); ?>');
        $('#btn-jenis-produk').click(function(e) {
            $('.form-data').load('<?php echo site_url('Olah_data/jenis_produk'); ?>');
            $('#form-harga-produk').attr('hidden', true);
            $('#form-foto-produk').attr('hidden', true);
            $('#detail-pesanan').attr('hidden', true);
        });
        $('#btn-harga-produk').click(function(e) {
            $('.form-data').load('<?php echo site_url('Olah_data/harga_produk'); ?>');
            let formData = new FormData();
            formData.append('select', 'harga');
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('olah_data/form_select_data_jenis_produk'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    $('.form-select-data-jenis-produk-harga').html(data);
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
            $('.form-select-data-jenis-produk').load('<?php echo site_url('Olah_data/form_select_data_jenis_produk'); ?>');
            $('#form-foto-produk').attr('hidden', true);
            $('#form-jenis-produk').attr('hidden', true);
            $('#detail-pesanan').attr('hidden', true);
            form_harga_produk();
        });
        $('#btn-foto-produk').click(function(e) {
            $('.form-data').load('<?php echo site_url('Olah_data/foto_produk'); ?>');
            let formData = new FormData();
            formData.append('select', 'foto');
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('olah_data/form_select_data_jenis_produk'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    $('.form-select-data-jenis-produk-foto').html(data);
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
            $('#form-harga-produk').attr('hidden', true);
            $('#form-jenis-produk').attr('hidden', true);
            $('#detail-pesanan').attr('hidden', true);
            form_jenis_produk();
        });
        $('#btn-vali-pesanan').click(function(e) {
            $('.form-data').load('<?php echo site_url('Chekout/vali_pesanan'); ?>');
            $('#detail-pesanan').attr('hidden', true);
            $('#form-foto-produk').attr('hidden', true);
            $('#form-jenis-produk').attr('hidden', true);
            $('#form-harga-produk').attr('hidden', true);
        });
        $('#btn-pesanan-dikirim').click(function(e) {
            $('.form-data').load('<?php echo site_url('Chekout/pesanan_dikirim'); ?>');
            $('#detail-pesanan').attr('hidden', true);
            $('#form-foto-produk').attr('hidden', true);
            $('#form-jenis-produk').attr('hidden', true);
            $('#form-harga-produk').attr('hidden', true);
        });
        $('#btn-riwayat-pesanan').click(function(e) {
            $('.form-data').load('<?php echo site_url('Chekout/riwayat_pesanan'); ?>');
            $('#detail-pesanan').attr('hidden', true);
            $('#form-foto-produk').attr('hidden', true);
            $('#form-jenis-produk').attr('hidden', true);
            $('#form-harga-produk').attr('hidden', true);
        });

        // JENIS PRODUK JS
        $("#btn-simpan-jenis-produk").click(function(e) {
            e.preventDefault();
            var val_simpan_jp = $("#btn-simpan-jenis-produk").val();
            var kategori = $("#kategori").find(':selected').val();
            var gender = $("#gender").find(':selected').val();
            let formData = new FormData();
            formData.append('id-jp', $('#id-jp').val());
            formData.append('nm-jp', $('#nm-jp').val());
            formData.append('kategori', kategori);
            formData.append('gender', gender);
            formData.append('desk', $('#desk').val());
            if (val_simpan_jp == 'simpan-jenis-produk') {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('olah_data/simpan_jenis_produk'); ?>",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(msg) {
                        // alert(msg);
                        alert("Data jenis produk berhasil di simpan.");
                        $('#form-jenis-produk').attr('hidden', true);
                        $('.form-data').load('<?php echo site_url('Olah_data/jenis_produk'); ?>');
                        form_jenis_produk();

                    },
                    error: function() {
                        alert("Data Gagal Diupload");
                    }
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('olah_data/edit_jenis_produk') ?>",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        // alert(msg);
                        alert("Edit data jenis produk berhasil di simpan.");
                        $('#form-jenis-produk').attr('hidden', true);
                        $('.form-data').load('<?php echo site_url('Olah_data/jenis_produk'); ?>');
                        form_jenis_produk();

                    },
                    error: function() {
                        alert("Data Gagal Diupload");
                    }
                });
            }
        });
        // END JENIS PRODUK JS

        $(document).on("input", "#diskon,#hrg-awal", function(e) {
            // alert('ya');
            hrg = parseFloat(removeCommas($("#hrg-awal").val())) * parseFloat($('#diskon').val()) / 100;
            hrg_diskon = parseFloat(removeCommas($("#hrg-awal").val())) - hrg;
            $('#hrg-diskon').val((hrg_diskon));
            // alert(parseFloat(removeCommas($("#hrg-awal").val())));
        });


        $('#cheklis-al').click(function(e) {
            if ($(this).is(":checked")) {
                // profesi.push($(this).val());
                $('#all-size').val('All Size');
            } else {
                $('#all-size').val('');
            }
        });
        $('#cheklis-s').click(function(e) {
            if ($(this).is(":checked")) {
                // profesi.push($(this).val());
                $('#small').val('S');
            } else {
                $('#small').val('');
            }
        });
        $('#cheklis-m').click(function(e) {
            if ($(this).is(":checked")) {
                // profesi.push($(this).val());
                $('#medium').val('M');
            } else {
                $('#medium').val('');
            }
        });
        $('#cheklis-l').click(function(e) {
            if ($(this).is(":checked")) {
                // profesi.push($(this).val());
                $('#large').val('L');
            } else {
                $('#large').val('');
            }
        });
        $('#cheklis-xl').click(function(e) {
            if ($(this).is(":checked")) {
                // profesi.push($(this).val());
                $('#extra-large').val('XL');
            } else {
                $('#extra-large').val('');
            }
        });
        $('#cheklis-xxl').click(function(e) {
            if ($(this).is(":checked")) {
                // profesi.push($(this).val());
                $('#extra2-large').val('XXL');
            } else {
                $('#extra2-large').val('');
            }
        });

        if ($("#status-produk").find(':selected').val() == 'PROMO') {
            $('#tgl-akhir').val(tgl);
            $('#jam-akhir').val(jam);
        } else {
            $('#tgl-akhir').val('');
            $('#jam-akhir').val('');
        }

        $('#status-produk').change(function(e) {
            var status = $("#status-produk").find(':selected').val();
            if (status == 'PROMO') {
                $('#diskon').removeAttr('readonly', true).removeClass('input_disabled');
                $('#tgl-akhir-promo').removeAttr('disabled', true).removeClass('input_disabled');
                $('#jam-akhir-promo').removeAttr('disabled', true).removeClass('input_disabled');

            } else {
                $('#diskon').attr('readonly', true).addClass('input_disabled').val('');
                $('#hrg-diskon').attr('readonly', true).addClass('input_disabled').val('');
                $('#tgl-akhir-promo').attr('disabled', true).addClass('input_disabled');
                $('#jam-akhir-promo').attr('disabled', true).addClass('input_disabled').val('');
            }
        });

        $("#btn-simpan-harga-produk").click(function(e) {
            e.preventDefault();
            var status = $("#status-produk").find(':selected').val();
            var tgl = $('#tgl-akhir-promo').val();
            var jam = $('#jam-akhir-promo').val();
            if (status == 'PROMO') {
                $('#tgl-akhir').val(tgl);
                $('#jam-akhir').val(jam);
            } else {
                $('#tgl-akhir').val('');
                $('#jam-akhir').val('');
            }
            var val_simpan_hrg_produk = $("#btn-simpan-harga-produk").val();
            var id_hrg_produk = $("#id-jenis-produk-harga").find(':selected').val();
            var status = $("#status-produk").find(':selected').val();
            let formData = new FormData();
            formData.append('id-hrg', $('#id-hrg').val());
            formData.append('id-hrg-produk', id_hrg_produk);
            formData.append('status-produk', status);
            formData.append('hrg-awal', $('#hrg-awal').val());
            formData.append('diskon', $('#diskon').val());
            formData.append('hrg-diskon', $('#hrg-diskon').val());
            formData.append('all-size', $('#all-size').val());
            formData.append('small', $('#small').val());
            formData.append('medium', $('#medium').val());
            formData.append('large', $('#large').val());
            formData.append('extra-large', $('#extra-large').val());
            formData.append('extra2-large', $('#extra2-large').val());
            formData.append('tgl-akhir-promo', $('#tgl-akhir').val());
            formData.append('jam-akhir-promo', $('#jam-akhir').val());
            if (val_simpan_hrg_produk == 'simpan-harga-produk') {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('olah_data/simpan_harga_produk'); ?>",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(msg) {
                        // alert(msg);
                        alert("Data harga produk berhasil di simpan.");
                        $('#form-harga-produk').attr('hidden', true);
                        $('.form-data').load('<?php echo site_url('Olah_data/harga_produk'); ?>');
                        form_harga_produk();

                    },
                    error: function() {
                        alert("Data Gagal Diupload");
                    }
                });
            } else {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('olah_data/edit_harga_produk') ?>",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        // alert(msg);
                        alert("Edit data harga produk berhasil di simpan.");
                        $('#form-harga-produk').attr('hidden', true);
                        $('.form-data').load('<?php echo site_url('Olah_data/harga_produk'); ?>');
                        form_harga_produk();

                    },
                    error: function() {
                        alert("Data Gagal Diupload");
                    }
                });
            }
        });

        $("#btn-simpan-foto-produk").submit(function(e) {
            e.preventDefault();
            var val_simpan = $("#btn-simpan-foto-produk").val();
            var val_ceklis_ubah = $('#val-ceklis-ubah').val();
            var id_fotjp = $("#id-jenis-produk-foto").find(':selected').val();
            var status_foto = $("#status-foto").find(':selected').val();
            const foto_produk = $('#fot_produk').prop('files')[0];
            if (id_fotjp == '0') {
                alert('produk tidak boleh kosong');
            } else {
                let formData = new FormData();
                formData.append('id-fotpro', $('#id-fotpro').val());
                formData.append('id-fotjp', id_fotjp);
                formData.append('fot_produk', foto_produk);
                formData.append('texture', $('#texture').val());
                formData.append('status-foto', status_foto);
                formData.append('fotlama', $('#fotlama').val());
                if (val_simpan == 'simpan-foto-produk') {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('olah_data/simpan_foto_produk'); ?>",
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(msg) {
                            // alert(msg);
                            alert("Data foto produk berhasil di simpan.");
                            $('#form-foto-produk').attr('hidden', true);
                            $('.form-data').load('<?php echo site_url('Olah_data/foto_produk'); ?>');
                            // form_foto_produk();

                        },
                        error: function() {
                            alert("Data Gagal Diupload");
                        },
                    });
                    return false;
                } else {
                    if (val_ceklis_ubah == 'edit-foto') {
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo site_url('olah_data/edit_foto_produk') ?>",
                            data: formData,
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(msg) {
                                alert(msg);
                                alert("Data foto produk berhasil di simpan.");
                                $('#ceklis-ubah-fotpro').prop('checked', false);
                                $('#form-foto-produk').attr('hidden', true);
                                $('.form-data').load('<?php echo site_url('Olah_data/foto_produk'); ?>');
                                // form_foto_produk();

                            },
                            error: function() {
                                alert("Data Gagal Diupload");
                            }
                        });
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo site_url('olah_data/edit_fotoproduk') ?>",
                            data: formData,
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(msg) {
                                // alert(msg);
                                alert("Data foto produk berhasil di simpan.");
                                $('#form-foto-produk').attr('hidden', true);
                                $('.form-data').load('<?php echo site_url('Olah_data/foto_produk'); ?>');
                                // form_foto_produk();

                            },
                            error: function() {
                                alert("Data Gagal Diupload");
                            }
                        });
                    }

                }
            }

        });

        $(document).on("click", ".pilih-fot-produk", function() {
            var file = $(this).parents().find(".file-produk");
            file.trigger("click");
        });

        $('#fot_produk').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#nm-fot-produk").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview-fot-produk").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
        $('#ceklis-ubah-fotpro').click(function(e) {
            if ($(this).is(":checked")) {
                // profesi.push($(this).val());
                $('#fot_produk, .pilih-fot-produk').removeAttr('disabled');
                $('#val-ceklis-ubah').val('edit-foto');
                // alert($('#id-fotpro').val());
            } else {
                $('#fot_produk, .pilih-fot-produk').attr('disabled', true);
                $('#val-ceklis-ubah').val('');
            }
        });

        function form_jenis_produk() {
            var id_jp = $('#id-jp').val('');
            var nm_jp = $('#nm-jp').val('');
            var desk = $('#desk').val('');
            $("#kategori, option[value='0']").attr("selected", "selected");
            $('#status-produk').prop('checked', false);

        }

        function form_harga_produk() {
            var hrg_awal = $('#hrg-awal').val('');
            var diskon = $('#diskon').val('');
            var hrg_diskon = $('#hrg-diskon').val('');
            var all_size = $('#all-size').val('').prop('checked', false);
            var small = $('#small').val('').prop('checked', false);
            var medium = $('#medium').val('').prop('checked', false);
            var large = $('#large').val('').prop('checked', false);
            var extra_large = $('#extra-large').val('').prop('checked', false);
            $('.cheklis-size').prop('checked', false);
        }

        var header = document.getElementById("menu-admin");
        var btns = header.getElementsByClassName("btn_1");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("btn-menu-active");
                current[0].className = current[0].className.replace(" btn-menu-active", "");
                this.className += " btn-menu-active";
            });
        }
    });
    new AutoNumeric('#hrg-awal', autoNumericOption);
    new AutoNumeric('#hrg-diskon', autoNumericOption);
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
    });
</script>