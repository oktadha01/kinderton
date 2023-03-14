<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.10/clipboard.min.js"></script> -->
<script>

</script>
<script>
    // $(document).ready(function() {
    $('#btn-addtocart').click(function() {
        $('#page').addClass('top-panel-close');
        $('#data_modal_addtocart').load('<?php echo site_url('Chekout/data_addtocart_detail'); ?>');
        // berat_kg();

        berat_kg();
        subtotal_total();
        // var subtotal = parseInt($('.new-price-addtocart').text()) * $('.quantity').val();

        // $('#subtotal-addtocart').text(addCommas(subtotal));
    });
    changes_size();

    $('#select-size-addtocart').change(function(e) {
        changes_size();
        subtotal_total();

    });

    $('#select-texture-addtocart').change(function(e) {
        var taxt_texture = $("#select-texture-addtocart").find(':selected').text();
        var val_foto_texture = $("#select-texture-addtocart").find(':selected').val();
        var id_texture = $("#select-texture-addtocart option:selected").attr("id");
        var foto = $(this).parents().find("#texture-" + id_texture);
        foto.trigger("click");
        $('#foto-addtocart').attr({
            src: "<?php echo base_url('upload'); ?>/" + val_foto_texture
        });
    });


    $('.increase-btn-addtocart').click(function() {
        $('.quantity').val(parseInt($('.quantity').val()) + 1);
        var qty = $('.quantity').val();
        $('#qty-addtocart').text(qty + 'X');
        $('#ongkir-addtocart').text('0,00');
        berat_kg();
        subtotal_total();

    });

    $('.decrease-btn-addtocart').click(function() {
        $('.quantity').val(parseInt($('.quantity').val()) - 1);
        var qty = $('.quantity').val();
        $('#qty-addtocart').text(qty + 'X');
        $('#ongkir-addtocart').text('0,00');
        berat_kg();
        subtotal_total();
    });

    $(document).on("change", ".select-kurir-addtocart", function(e) {
        $('#ongkir-addtocart').text('0,00');
        berat_kg();
        $('#ongkir-addtocart').text('0,00');
        var total = parseFloat(removeCommas($('#subtotal-addtocart').text())) + parseFloat(removeCommas($('#ongkir-addtocart').text()));
        $('#total-addtocart').text(addCommas(total));

    });

    function changes_size() {
        var id_hrg = $("#select-size-addtocart").find(':selected').val();
        var data_diskon = $("#select-size-addtocart").find(':selected').data('diskon');
        var data_hrg_diskon = $("#select-size-addtocart").find(':selected').data('hrg-diskon');
        var data_hrg_awal = $("#select-size-addtocart").find(':selected').data('hrg-awal');
        if (data_diskon == '') {
            $('.percentage-addtocart, .old-price-addtocart').hide();
            $('.new-price-addtocart').text(data_hrg_awal);
        } else {
            $('.percentage-addtocart, .old-price-addtocart').show();
            $('.new-price-addtocart').text(data_hrg_diskon);
            $('.percentage-addtocart').text('-' + data_diskon + '%');
            $('.old-price-addtocart').text('Rp' + data_hrg_awal);
        }
    };


    function subtotal_total() {
        // var test = removeCommas('150.000') * 2;
        // alert(addCommas(test))
        var subtotal = parseFloat(removeCommas($('.new-price-addtocart').text())) * $('.quantity').val();
        $('#subtotal-addtocart').text(addCommas(subtotal));
        var total = parseFloat(removeCommas($('#subtotal-addtocart').text())) + parseFloat(removeCommas($('#ongkir-addtocart').text()));
        $('#total-addtocart').text(addCommas(total));



        function addCommas(nStr) {
            nStr += '';
            var x = nStr.split(',');
            var x1 = x[0];
            var x2 = x.length > 1 ? ',' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + '.' + '$2');
            }
            return x1 + x2;
        }

        function removeCommas(nStr) {

            return nStr.split('.').join("");
        }
    }



    function berat_kg() {

        var total_gram = parseInt($('#berat-produk').val()) * parseInt($('.quantity').val());
        if (total_gram <= '1000') {
            var kg = '1';
            chekout();
        } else if (total_gram >= '1000' && total_gram <= '2000') {
            var kg = '2';
            chekout();
        } else if (total_gram >= '2000' && total_gram <= '3000') {
            var kg = '3';
            chekout();
        } else if (total_gram >= '3000' && total_gram <= '4000') {
            var kg = '4';
            chekout();
        } else if (total_gram >= '4000' && total_gram <= '5000') {
            var kg = '5';
            chekout();
        } else if (total_gram >= '5000' && total_gram <= '6000') {
            var kg = '6';
            chekout();
        } else if (total_gram >= '6000' && total_gram <= '7000') {
            var kg = '7';
            chekout();
        } else if (total_gram >= '7000' && total_gram <= '8000') {
            var kg = '8';
            chekout();
        } else if (total_gram >= '8000' && total_gram <= '9000') {
            var kg = '9';
            chekout();
        } else if (total_gram >= '9000' && total_gram <= '10000') {
            var kg = '10';
            chekout();
        }

        function chekout() {
            var kurir = $(".select-kurir-addtocart").find(':selected').val();
            let formData = new FormData();
            formData.append('kurir', kurir);
            formData.append('berat_kg', kg);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Chekout/cek_ongkir'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    $('.cek-ongkir').html(data);
                    if ($('.cek-berat').text() == '0') {
                        chekout();
                    } else {
                        setTimeout(hide_loader, 1000);
                        event.preventDefault();
                    }
                    $('.mode-bayar').show();
                    show_loader();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    }


    function show_loader() {
        // $("#loader").addClass("loader");
        $("#loader").show();
        $('.cek-ongkir').hide();
        //event.preventDefault();
    }

    function hide_loader() {
        // $("#loader").removeClass("loader");
        $("#loader").hide(300);
        $('.cek-ongkir').show();
        //event.preventDefault();
    }
    // Tooltip

    $('#salin-no').tooltip({
        trigger: 'click',
        placement: 'bottom'
    });

    function setTooltip(message) {
        $('#salin-no').tooltip('hide')
            .attr('data-original-title', message)
            .tooltip('show');
    }

    function hideTooltip() {
        setTimeout(function() {
            $('#salin-no').tooltip('hide');
        }, 1000);
    }

    // Clipboard

    var clipboard = new Clipboard('#salin-no');

    clipboard.on('success', function(e) {
        setTooltip('Copied!');
        hideTooltip();
    });

    clipboard.on('error', function(e) {
        setTooltip('Failed!');
        hideTooltip();
    });

    $('#btn-close-addtocart').click(function(e) {
        $('.tabel-alamat').show(300);
        $('.btn-ubah-alamat').show(300);
        $('.form-edit-alamat').attr('hidden', true);
        $('.cek-ongkir').html('0');
    });

    // });

    function myFunction() {
        var copyText = document.getElementById("id-no-addtocart-val");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
    }

    var tgl_promo = $('.tgl-akhir-promo').text();
    var jam_promo = $('.jam-akhir-promo').text();
    if ($('.status-produk').text() == 'PROMO') {
        var x = setInterval(function() {
            var countDownDate = new Date(tgl_promo + ' ' + jam_promo);

            // Dapatkan tanggal dan waktu hari ini
            var now = new Date().getTime();
            // Temukan jarak antara sekarang dan tanggal hitung mundur
            var distance = countDownDate - now;

            // Perhitungan waktu untuk hari, jam, menit dan detik
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Keluarkan hasil dalam elemen dengan id = "demo"
            document.getElementById("countdown-detail").innerHTML = days + "D " + hours + ":" +
                minutes + ":" + seconds + "";
            //Jika hitungan mundur selesai, tulis beberapa teks
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown-detail").innerHTML = "EXPIRED";
            }
        }, 1000);
    }
</script>