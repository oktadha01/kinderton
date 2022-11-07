<?php
// $kota_asal = $_POST['kota_asal'];
// $kota_tujuan = '21';
// $kurir = $_POST['kurir'];
// $berat = $_POST['berat'] * 1000;
$user = $this->session->userdata("id_user");
$sql = "SELECT * FROM user WHERE id_user = $user";
$query = $this->db->query($sql);
foreach ($query->result() as $data_user) :
// echo $data_user->nm_user;
endforeach;
// if ($query->num_rows() > 0) {

$kota_asal = '398';
// $kota_tujuan = '21';
$kota_tujuan = $data_user->id_kota;
// $kurir = 'jne';
// $berat = '1000';
$kurir = $this->input->post('kurir');
$berat = $this->input->post('berat_kg') * 1000;

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=" . $kota_asal . "&destination=" . $kota_tujuan . "&weight=" . $berat . "&courier=" . $kurir . "",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: 656279048052809676e144ac54c703ee"
    ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
$data = json_decode($response, true);
$kurir = $data['rajaongkir']['results'][0]['name'];
$kotaasal = $data['rajaongkir']['origin_details']['city_name'];
$provinsiasal = $data['rajaongkir']['origin_details']['province'];
$kotatujuan = $data['rajaongkir']['destination_details']['city_name'];
$provinsitujuan = $data['rajaongkir']['destination_details']['province'];
$berat = $data['rajaongkir']['query']['weight'] / 1000;

?>
<div class="panel panel-default text-left">
    <!-- <div class="col-lg-6 col-md-6 col-12"> -->

    <div class="panel-body">
        <table class="tabel-alamat">
            <tr>
                <td width="15%"><b>Kurir</b> </td>
                <td>&nbsp;<b><?= $kurir ?></b></td>
            </tr>
            <tr>
                <td>Dari</td>
                <td>: <?= $kotaasal . ", " . $provinsiasal ?></td>
            </tr>
            <tr>
                <td>Tujuan</td>
                <td>: <?= $kotatujuan . ", " . $provinsitujuan ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?= $data_user->alamat ?></td>
            </tr>
            <tr>
                <!-- <td>Berat (Kg)</td> -->
                <td hidden>: <span class="cek-berat"><?= $berat ?></span></td>
            </tr>
        </table>

        <div id="" class="row form-edit-alamat" hidden>
            <div class="col-12">
                <div class="form-group">
                    <label class="control-label col-sm-6" for="kota_tujuan">Kota Tujuan Pengiriman</label>
                    <select class="form-control col-12 text-left kota-tujuan" id="kota_tujuan" name="kota_tujuan">
                        <option></option>
                    </select>
                </div>
                <label class="control-label col-sm-3" for="alamat">Alamat</label>
                <div class="form-group">
                    <textarea id="alamat" name="alamat" class="form-control alamat" cols="10" rows="8" placeholder="Alamat Lengkap Tujuan Pengiriman ..."></textarea>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="reset" id="" class="btn-batal-edit-alamat col-12 btn btn-sm btn-danger">Batal</button>
                    </div>
                    <div class="col">
                        <button type="button" id="" class="btn-simpan-edit-alamat col-12 btn btn-sm btn-info float-right" value="">Simpan</button>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <!-- <div class="row"> -->
        <button id="" class="float-right btn-ubah-alamat m-3" data-id-kota="<?= $data_user->id_kota ?>" data-kota="<?= $data_user->kota ?>" data-alamat="<?= $data_user->alamat ?>" <i class="fa-regular fa-address-card"></i> Ubah alamat pengiriman</button>
        <!-- </div> -->
        <table class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th>Nama Layanan</th>
                    <th>Tarif</th>
                    <th>ETD(Estimates Days)</th>
                    <th>Pilih</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data['rajaongkir']['results'][0]['costs'] as $value) {
                    echo "<tr>";
                    echo "<td>" . $value['service'] . "</td>";

                    foreach ($value['cost'] as $tarif) {
                        // echo "<td align='left'>Rp " . number_format($tarif['value'], 0, ',', '.') . "</td>";
                        echo "<td align='left'><span class=''>Rp.<strong class='hrg-layanan-" . $value['service'] . "'>" . number_format($tarif['value'], 0, ',', '.') . "</strong></span></td>";
                        echo "<td>" . $tarif['etd'] . " D</td>";
                        echo "<td>";
                        echo "<div class='form-group'>";
                        echo "<div class='custom-control custom-checkbox'>";
                        echo "<input class='custom-control-input layanan layanan-addtocart' type='checkbox' id='" . $value['service'] . "' data-layanan='" . $value['service'] . "' data-tarif='" . number_format($tarif['value'], 0, ',', '.') . "' data-etd='" . $tarif['etd'] . "' value=''>";
                        echo "<label for='" . $value['service'] . "' class='custom-control-label'></label>";
                        echo "</div>";
                        echo "</div>";
                        echo "</td>";
                    }

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <input type="text" id="layanan-kurir" value="" hidden>
    <input type="text" id="etd" value="" hidden>
</div>
<script>
    $(document).ready(function() {
        $('#berat-addtocart').text($('.cek-berat').text());
        $('#tes-total').text($('.cek-berat').text());
        btn_disabled_b_pesanan();

        $('.layanan').click(function(e) {
            $('.layanan').not(this).prop('checked', false);
            var layanan = $(this).data('layanan');
            var tarif = $(this).data('tarif');
            var etd = $(this).data('etd');
            if ($(this).is(":checked")) {
                $('#ongkir-addtocart').text(tarif);
                $('#layanan-kurir').val(layanan);
                $('#etd').val(etd);
                var total = parseFloat(removeCommas($('#subtotal-addtocart').text())) + parseFloat(removeCommas(tarif));
                if ($('#subtotal-addtocart').text() == '0,00') {
                    $('#total-addtocart').text('0,00');
                } else {
                    $('#total-addtocart').text(addCommas(total));
                }
                
            } else {
                $('#layanan-kurir').val('');
                $('#etd').val('');
                $('#ongkir-addtocart').text('0,00');
                var total = parseFloat(removeCommas($('#subtotal-addtocart').text())) + parseFloat(removeCommas('0,00'));
                if ($('#subtotal-addtocart').text() == '0,00') {
                    $('#total-addtocart').text('0,00');
                } else {
                    $('#total-addtocart').text(addCommas(total));
                }
            }
            btn_disabled_b_pesanan();
        });

        $('.btn-ubah-alamat').click(function(e) {
            // alert('ya');
            var id_kota = $(this).data('id-kota');
            var kota = $(this).data('kota');
            var alamat = $(this).data('alamat');
            $('#data-id-user').val($(this).data('id-user'));
            $('#data-kurir').val($(this).data('kurir'));
            $('#data-berat').val($(this).data('berat'));
            $('.alamat').val($(this).data('alamat'));
            $("#kota_tujuan, option[value='" + id_kota + "']").attr("selected", "selected");
            $('#kota_tujuan').select2({
                placeholder: $(this).data('kota'),
                language: "id"
            });
            $('.tabel-alamat').hide();
            $('.btn-ubah-alamat').hide();
            $('.form-edit-alamat').removeAttr('hidden', true);

        });

        $('.btn-simpan-edit-alamat').click(function(e) {
            e.preventDefault();
            // alert('ya');
            var kurir = $(".select-kurir-addtocart").find(':selected').val();
            var val_kota_tujuan = $("#kota_tujuan").find(':selected').val();
            var text_kota_tujuan = $("#kota_tujuan").find(':selected').text();
            let formData = new FormData();
            formData.append('id-kota', val_kota_tujuan);
            formData.append('kota', text_kota_tujuan);
            formData.append('alamat', $('.alamat').val());
            formData.append('id-user', '<?= $data_user->id_user ?>');
            formData.append('kurir', kurir);
            formData.append('berat_kg', '<?= $berat ?>');
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('user/edit_alamat'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('Chekout/cek_ongkir'); ?>",
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            // alert(data);
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
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }

            });
            $('#ongkir').text('0,00');
            var total = parseFloat(removeCommas($('#allsubtotal').text())) + parseFloat(removeCommas($('#ongkir').text()));
            $('#total').text(addCommas(total));
            $('.form-edit-alamat').attr('hidden', true);

        });

        $('.btn-batal-edit-alamat').click(function(e) {
            $('.tabel-alamat').show(300);
            $('.btn-ubah-alamat').show(300);
            $('.form-edit-alamat').attr('hidden', true);
        });
        $('#kota_tujuan').select2({
            placeholder: 'Pilih kota/kabupaten tujuan',
            language: "id"
        });

        $.ajax({
            url: "<?php echo site_url('Data_kota/kota_tujuan'); ?>",
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // alert(data)
                $("select#kota_tujuan").html(data);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });

    function btn_disabled_b_pesanan() {
        if ($('#ongkir-addtocart').text() == '0,00') {
            $('#buat-pesanan-addtocart').addClass('btn-disabled-b-pesanan').attr('disabled', true);
        } else {
            $('#buat-pesanan-addtocart').removeClass('btn-disabled-b-pesanan').removeAttr('disabled', true);
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
</script>