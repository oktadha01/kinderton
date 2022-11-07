<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>

        <?php
        if (isset($_title)) {
            echo $_title;
        } else {
            echo 'Dashboard';
        }
        ?>
    </title>
    <style>
        .opacity-body {
            margin-top: 0;
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 999;
            background: #0000008c;
        }
    </style>
    <!-- Favicons-->
    <link rel="shortcut icon" href="<?php echo base_url('assets'); ?>/img/ikon-logo-kinderton.png" type="image/x-icon" />
    <!-- <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png"> -->
    <!-- <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png"> -->

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <!-- BASE CSS -->
    <link href="<?php echo base_url('assets'); ?>/css/adminlte.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets'); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/libs/select2/css/select2.min.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/libs/select2-bootstrap4-theme/select2-bootstrap4.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/libs/select2-4.0.6-rc.1/dist/css/select2.min.css">

    <!-- daterange picker -->
    <link href="<?php echo base_url('assets'); ?>/libs/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets'); ?>/css/style.css" rel="stylesheet" />

    <!-- SPECIFIC CSS -->

    <!-- <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/libs/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link href="<?php echo base_url('assets'); ?>/css/home_1.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets'); ?>/css/product_page.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/css/cart.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/css/account.css" rel="stylesheet">
    <!-- YOUR CUSTOM CSS -->
    <link href="<?php echo base_url('assets'); ?>/css/custom.css" rel="stylesheet" />

</head>


<body>
    <?php
    include_once 'navbar.php';
    ?>
    <div id="page" class="dropdown-close-user top-panel-close">
        <?php
        if (isset($_view) && !empty($_view)) {
            $this->load->view($_view);
        }
        ?>

        <?php
        include_once 'nav_bottom/nav_bottom.php';
        // include_once 'footer.php';
        ?>

    </div>
    <div id="toTop"></div><!-- Back to top button -->
    <?php
    // include_once 'modal/modal_detail_produk.php';
    include_once 'data_modal/modal_addtocart.php';
    include_once 'modal/modal_login.php';
    // include_once 'modal/favorit/modal_favorit.php';
    ?>

    <!-- COMMON SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo base_url('assets'); ?>/js/jquery-3.2.1.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/adminlte.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/libs/jquery-autonumeric/autoNumeric.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/libs/jquery-autonumeric/autonumeric-4.1.0.js"></script>



    <!-- InputMask -->
    <script src="<?php echo base_url('assets'); ?>/libs/moment/moment.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- date-range-picker -->
    <!-- SPECIFIC SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.10/clipboard.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="<?php echo base_url('assets'); ?>/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/common_scripts.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/main.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/carousel_with_thumbs.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/carousel-home.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/libs/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/libs/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>
    <script src="<?php echo base_url('assets'); ?>/libs/daterangepicker/moment.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/libs/daterangepicker/daterangepicker.min.js"></script>

    <?php
    if (isset($_script) && !empty($_script)) {
        $this->load->view($_script);
    } ?>
    <?php
    if (isset($_GET['pesanan']) && !empty($_GET['pesanan'])) {
        $pesanan = $_GET['pesanan'];
    ?>
        <?php
        if ($pesanan == 'dikirim') { ?>
            <?php if ($this->session->userdata("privilage") == 'member') { ?>
                <script>
                    $('#modal-panel').addClass('show');
                    $('#data_modal_addtocart').load('<?php echo site_url('Cart/data_cart'); ?>');
                    $('.targetDiv').hide();
                </script>
            <?php
            } else {
            ?>
                <script>
                    $('#modal-login').modal();
                </script>
            <?php
            }
            ?>
        <?php
        } else {
            redirect(base_url(''));
        ?>

        <?php
        }
        ?>
    <?php
    }
    ?>

    <script>
        
        $('.dropdown-close-user').click(function(e) {
            // alert('ya');
            $('#dropdown-user').removeClass('show');
        })
        $('.top-panel-close').click(function(e) {
            // alert('ya');
            $('#modal-panel').removeClass('show');
        });
        $('#sidebar-menu').click(function(e) {
            $('.foto-nav').load('<?php echo site_url('dashboard/foto_nav'); ?>');
            $('#page').addClass('close-sidebar');
            $('.close-sidebar').click(function(e) {
                $('#page').removeClass('close-sidebar');
                $('.main-menu').removeClass('show');
            });
        });

        var langArray = [];
        $('.vodiapicker option').each(function() {
            var img = $(this).attr("data-thumbnail");
            var text = this.innerText;
            var value = $(this).val();
            var item = '<li><img src="' + img + '" alt="" value="' + value + '"/><span>' + text + '</span></li>';
            langArray.push(item);
        })

        $('#a').html(langArray);

        //Set the button value to the first el of the array
        $('.btn-select').html(langArray[0]);
        $('.btn-select').attr('value', 'en');

        //change button stuff on click
        $('#a li').click(function() {
            var img = $(this).find('img').attr("src");
            var value = $(this).find('img').attr('value');
            var text = this.innerText;
            var item = '<li><img src="' + img + '" alt="" /><span>' + text + '</span></li>';
            $('.btn-select').html(item);
            $('.btn-select').attr('value', value);
            $(".b").toggle();
            if (value == 'BANK MANDIRI') {
                $('#th-no-addtocart').text('No Rekening');
                $('#id-no-addtocart').text('1360014983586');
                $('#id-no-addtocart-val').val('1360014983586');
                $('.th-nm-pembayaran').text('Bank Mandiri');
                $('#logo-pembayaran').attr({
                    src: "<?php echo base_url('assets'); ?>/img/logo_mandiri.png"
                });
            } else if (value == 'SHOPEEPAY') {
                $('#th-no-addtocart').text('Virtual Akun');
                $('#id-no-addtocart').text('893082325788719');
                $('#id-no-addtocart-val').val('893082325788719');
                $('.th-nm-pembayaran').text('Shopee Pay');
                $('#logo-pembayaran').attr({
                    src: "<?php echo base_url('assets'); ?>/img/logo_shopeePay.png"
                });
            } else if (value == 'GOPAY') {
                $('#th-no-addtocart').text('Virtual Akun');
                $('#id-no-addtocart').text('087831697017');
                $('#id-no-addtocart-val').val('087831697017');
                $('.th-nm-pembayaran').text('GoPay');
                $('#logo-pembayaran').attr({
                    src: "<?php echo base_url('assets'); ?>/img/logo_gopay.png"
                });
            }
            //   console.log(value);
        });

        $(".btn-select").click(function() {
            $(".b").toggle();
        });

        //check local storage for the lang
        var sessionLang = localStorage.getItem('lang');
        if (sessionLang) {
            //find an item with value of sessionLang
            var langIndex = langArray.indexOf(sessionLang);
            $('.btn-select').html(langArray[langIndex]);
            $('.btn-select').attr('value', sessionLang);
        } else {
            var langIndex = langArray.indexOf('ch');
            console.log(langIndex);
            $('.btn-select').html(langArray[langIndex]);
            //$('.btn-select').attr('value', 'en');
        }

        var set_time = setInterval(function() {
            const milliseconds = new Date().getTime();
            const hours_ = `0${new Date(milliseconds).getHours()}`.slice(-2);
            const minutes_ = `0${new Date(milliseconds).getMinutes()}`.slice(-2);
            const seconds_ = `0${new Date(milliseconds).getSeconds()}`.slice(-2);
            const time = `${hours_}:${minutes_}:${seconds_}`;
            $('#jam-tempo').text(time);
            $('#jam-kirim').text(time);
        }, 1000);

        $('#pembayaran-addtocart').hide();
        $('#buat-pesanan-addtocart').click(function() {
            $('#form-buat-pesanan-addtocart').hide();
            $('#pembayaran-addtocart').show();
            $('#total-pembayaran').text($('#total-addtocart').text());
            var jam = $('#jam-tempo').text();
            var tgl_tempo = $('#tgl-tempo').text();
            $('#jatuh_tempo').text('Jatuh tempo ' + tgl_tempo + ',' + jam);
            var x = setInterval(function() {
                // Tetapkan tanggal kita menghitung mundur
                var countDownDate = new Date(tgl_tempo + ' ' + jam);

                // Dapatkan tanggal dan waktu hari ini
                var now = new Date().getTime();
                var kode = new Date().getTime();
                // console.log(kode);
                // Temukan jarak antara sekarang dan tanggal hitung mundur
                var distance = countDownDate - now;

                // Perhitungan waktu untuk hari, jam, menit dan detik
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Keluarkan hasil dalam elemen dengan id = "demo"
                document.getElementById("durasi-addtocart").innerHTML = hours + " jam " +
                    minutes + " menit " + seconds + " detik ";
                $('#kode-cart').text(kode);
                //Jika hitungan mundur selesai, tulis beberapa teks
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("durasi-addtocart").innerHTML = "EXPIRED";
                }
            }, 1000);
            $('#btn-ubah-pembayaran-addtocart, #btn-modal-close').click(function(e) {
                $('#form-buat-pesanan-addtocart').show();
                $('#pembayaran-addtocart').hide();
                clearInterval(x);
            });
            $('#btn-ok-addtocart').click(function() {
                // e.preventDefault();
                if ($('#btn-ok-addtocart').val() == 'detail') {
                    $.ajax({
                        url: '<?php echo site_url('Chekout/addtocart'); ?>',
                        type: 'post',
                        data: {
                            action: $('#btn-ok-addtocart').val(),
                            kode_chekout: $('#kode-cart').text(),

                            tgl_bayar: $('#tgl-tempo').text(),
                            jam_bayar: $('#jam-tempo').text(),
                            nm_bayar: $('.th-nm-pembayaran').text(),
                            no_bayar: $('#id-no-addtocart').text(),
                            total_produk: $('#total-produk-addtocart').text(),
                            total_barang: $('#qty-addtocart').text(),
                            berat: $('#berat-addtocart').text(),
                            kurir: $(".select-kurir-addtocart").find(':selected').val(),
                            pelayanan: $('#layanan-kurir').val(),
                            etd: $('#etd').val(),
                            ongkir: $('#ongkir-addtocart').text(),
                            subtotal: $('#subtotal-addtocart').text(),
                            total_bayar: $('#total-pembayaran').text(),

                            id_produk: $('#id-produk-addtocart').val(),
                            id_foto: $("#select-texture-addtocart option:selected").attr("id"),
                            id_hrg: $("#select-size-addtocart").find(':selected').val(),
                            size: $("#select-size-addtocart").find(':selected').text(),
                            qty: $('.quantity').val(),
                        },
                        success: function(msg) {
                            alert(msg);
                            $('.notif-cart').load('<?php echo site_url('cart/notif_cart'); ?>');
                            $('#form-buat-pesanan-addtocart').show();
                            $('#pembayaran-addtocart').hide();
                            clearInterval(x);
                        }
                    });
                } else {
                    var id_favorit = [];
                    $(".chekout:checked").each(function() {
                        var userid = $(this).val();
                        // alert(userid);

                        id_favorit.push(userid);
                    });

                    // Array length
                    var length = id_favorit.length;

                    if (length > 0) {

                        // AJAX request
                        $.ajax({
                            // url: '<?= base_url() ?>index.php/users/deleteUser',
                            url: '<?php echo site_url('Chekout/addtocart'); ?>',
                            type: 'post',
                            data: {
                                id: id_favorit,
                                action: $('#btn-ok-addtocart').val(),
                                kode_chekout: $('#kode-cart').text(),

                                tgl_bayar: $('#tgl-tempo').text(),
                                jam_bayar: $('#jam-tempo').text(),
                                nm_bayar: $('.th-nm-pembayaran').text(),
                                no_bayar: $('#id-no-addtocart').text(),
                                total_produk: $('#total-produk-addtocart').text(),
                                total_barang: $('#qty-addtocart').text(),
                                berat: $('#berat-addtocart').text(),
                                kurir: $(".select-kurir-addtocart").find(':selected').val(),
                                pelayanan: $('#layanan-kurir').val(),
                                etd: $('#etd').val(),
                                ongkir: $('#ongkir-addtocart').text(),
                                subtotal: $('#subtotal-addtocart').text(),
                                total_bayar: $('#total-pembayaran').text(),


                            },
                            success: function(msg) {
                                alert(msg);
                                $('#notif-favorit').load('<?php echo site_url('Favorit/notif_favorit'); ?>');
                                $('.notif-cart').load('<?php echo site_url('cart/notif_cart'); ?>');
                                $('#form-buat-pesanan-addtocart').show();
                                $('#pembayaran-addtocart').hide();
                                clearInterval(x);
                            }
                        });
                    }
                }
                var close = $(this).parents().find(".btn_close_top_panel");
                close.trigger("click");

            });
        });
    </script>
    <script>
        $('#notif-favorit').load('<?php echo site_url('Favorit/notif_favorit'); ?>');
        $('.notif-cart').load('<?php echo site_url('cart/notif_cart'); ?>');

        $('.btn-favorit-produk').click(function() {
            $('.navbar-bottom').addClass("opened");
            var id_produk = $(this).data('id-produk');
            var foto_produk = $(this).data('foto-produk');
            let formData = new FormData();
            formData.append('id-produk', id_produk);
            formData.append('foto-produk', foto_produk);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Favorit/select_favorit'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    // alert(data);
                    $('#data-addto-favorit').html(data);

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        });
        $('.close-addto-favorit').click(function(e) {
            $('.navbar-bottom').removeClass("opened");
        });

        $('#btn-addtocart-favorit').click(function(e) {
            $('#data_modal_addtocart').load('<?php echo site_url('Favorit/data_favorit'); ?>');
        });
        $('#btn-cart').click(function(e) {
            $('#data_modal_addtocart').load('<?php echo site_url('Cart/data_cart'); ?>');
        });

        $(function() {
            $('#tgl-akhir-promo').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'MM-DD-YYYY'
                }
            })
            $('#tgl-addtocart').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            })
        });

        $(document).on('click', 'a[href^="#"]', function(event) {
            event.preventDefault();
            // alert('ya');
            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top
            }, 100);
        });
        $(function() {
            // this will get the full URL at the address bar
            var url = window.location.href;

            // passes on every "a" tag
            $("#navbar a").each(function() {
                // checks if its the same on the address bar
                if (url == (this.href)) {
                    $(this).closest(".menu").addClass("menu-active");
                }
            });
        });

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

        $(document).on("keypress", function(e) {
            var key = e.which
            if (key == 13) {
                // alert('coba');
            }
        });

        const autoNumericOption = {
            digitGroupSeparator: '.',
            decimalCharacter: ',',
            decimalCharacterAlternative: '.',
            decimalPlaces: 0,
            watchExternalChanges: true //!!!        
        };
    </script>
</body>

</html>