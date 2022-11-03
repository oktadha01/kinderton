<style>
    @media only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px) {

        /* Force table to not be like tables anymore */
        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block !important;
        }

        /* Hide table headers (but not display: none !important;, for accessibility) */
        thead tr {
            position: absolute !important;
            top: -9999px !important;
            left: -9999px !important;
        }

        tr {
            margin: 0 0 1rem 0 !important;
        }

        td {
            /* Behave  like a "row" */
            border: none !important;
            border-bottom: 1px solid #eee !important;
            position: relative !important;
            padding-left: 40% !important;
        }

        td:before {
            /* Now like a table header */
            position: absolute !important;
            /* Top/left values mimic padding */
            top: 0 !important;
            left: 6px !important;
            /* width: 45% !important; */
            /* padding-right: 0px !important; */
            white-space: nowrap !important;
        }

        /*
		Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
		*/

        td:nth-of-type(1):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "KODE PESANAN";
        }

        td:nth-of-type(2):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "TGL DIKIRIM";
        }

        td:nth-of-type(3):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "KURIR";
        }

        td:nth-of-type(4):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "LAYANAN";
        }

        td:nth-of-type(5):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "ETD";
        }

    }
</style>
<div id="form-foto-produk" class="min-height box_account ">
    <div class="form_container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <h5>Riwayat Pesanan</h5>
            </div>
        </div>
        <!-- <div class="row"> -->
        <div class="card-body table-responsive p-0" style="height: 330px;">
            <table role="table" class="table table-head-fixed  table-striped text-nowrap table-hover">
                <thead role="rowgroup">
                    <tr role="row">
                        <th scope="col" role="columnheader">KODE PESANAN</th>
                        <th scope="col" role="columnheader">TGL DIKIRIM</th>
                        <th scope="col" role="columnheader">KURIR</th>
                        <th scope="col" role="columnheader">LAYANAN</th>
                        <th scope="col" role="columnheader">SELESAI DI KIRIM</th>
                    </tr>
                </thead>
                <tbody id="data-foto">
                    <?php
                    foreach ($riwayat_pesanan as $data) {
                    ?>
                        <tr id="<?php echo $data->status_pembayaran; ?><?php echo $data->id_cart; ?>" class="btn-lihat-pesanan" id="" data-kode="<?php echo $data->kode_pesanan; ?>">
                            <td role="cell" scope="col"><?php echo $data->kode_pesanan; ?></td>
                            <td role="cell" scope="col"><?php echo $data->tgl_kirim; ?> <?php echo $data->jam_kirim; ?></td>
                            <td role="cell" scope="col"><?php echo $data->kurir; ?></td>
                            <td role="cell" scope="col"><?php echo $data->pelayanan; ?></td>
                            <td role="cell" scope="col"><?php echo $data->tgl_selesai_dikirim; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <hr>
    </div>
    <!-- /form_container -->
</div>

<script>
    $('.btn-lihat-pesanan').click(function(e) {
        // alert('ya')
        var kode = $(this).data('kode');
        let formData = new FormData();
        formData.append('kode-pesanan', kode);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Chekout/detail_vali_pesanan'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.detail-vali-pesanan').html(data);
                $('#detail-pesanan').removeAttr('hidden', true);
                jQuery('html,body').animate({
                    scrollTop: 0
                });
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    })
</script>