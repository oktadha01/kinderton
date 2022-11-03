// alert('ya')
var langArray = [];
$('.vodiapicker option').each(function () {
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
$('#a li').click(function () {
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

$(".btn-select").click(function () {
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

var set_time = setInterval(function () {
    const milliseconds = new Date().getTime();
    const hours_ = `0${new Date(milliseconds).getHours()}`.slice(-2);
    const minutes_ = `0${new Date(milliseconds).getMinutes()}`.slice(-2);
    const seconds_ = `0${new Date(milliseconds).getSeconds()}`.slice(-2);
    const time = `${hours_}:${minutes_}:${seconds_}`;
    $('#jam-tempo').text(time);
}, 1000);

$('#pembayaran-addtocart').hide();
$('#buat-pesanan-addtocart').click(function () {
    $('#form-buat-pesanan-addtocart').hide();
    $('#pembayaran-addtocart').show();
    $('#total-pembayaran').text($('#total-addtocart').text());
    var jam = $('#jam-tempo').text();
    var tgl_tempo = $('#tgl-tempo').text();
    $('#jatuh_tempo').text('Jatuh tempo ' + tgl_tempo + ',' + jam);
    var x = setInterval(function () {
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

        //Jika hitungan mundur selesai, tulis beberapa teks
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("durasi-addtocart").innerHTML = "EXPIRED";
        }
    }, 1000);
    $('#btn-ubah-pembayaran-addtocart, #btn-modal-close').click(function (e) {
        $('#form-buat-pesanan-addtocart').show();
        $('#pembayaran-addtocart').hide();
        clearInterval(x);
    });
    $('#btn-ok-addtocart').click(function (e) {
        e.preventDefault();
        let formData = new FormData();
        formData.append('nm-produk-cart', $('#nm-produk-addtocart').text());
        formData.append('texture-cart', $('#texture-addtocart').text());
        formData.append('size-cart', $('#size-addtocart').text());
        formData.append('qty-cart', $('.quantity').val());
        formData.append('berat-cart', $('.cek-berat').text());
        formData.append('total-bayar', $('#total-addtocart').text());
        formData.append('tgl-chekout', $('#tgl-tempo').text());
        formData.append('jam-chekout', $('#jam-tempo').text());
        formData.append('nm-payment', $('.th-nm-pembayaran').text());
        formData.append('no-payment', $('#id-no-addtocart').text());
        // alert($('.quantity').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Chekout/addtocart'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (msg) {
                alert(msg);
                // alert("Data berhasil di simpan.");
                $('#form-buat-pesanan-addtocart').show();
                $('#pembayaran-addtocart').hide();
                clearInterval(x);

            },
            error: function () {
                alert("Data Gagal Diupload");
            }
        });
        var close = $(this).parents().find(".btn_close_top_panel");
        close.trigger("click");
    });
});