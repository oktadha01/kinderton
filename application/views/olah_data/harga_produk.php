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
            padding-left: 50% !important;
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
            content: "NAMA PRODUK";
        }

        td:nth-of-type(2):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "HARGA AWAL";
        }

        td:nth-of-type(3):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "DISKON";
        }

        td:nth-of-type(4):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "HARGA DISKON";
        }

        td:nth-of-type(5):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "UKURAN";
        }

        td:nth-of-type(6):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "STATUS";
        }

        td:nth-of-type(7):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "TGL AKHIR PROMO";
        }

        td:nth-of-type(8):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "ACTION";
        }
    }
</style>
<div id="" class="min-height box_account ">
    <div class="form_container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <h5>Data Harga Produk</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <button type="button" id="btn-form-harga-produk" class="btn btn-sm bg-info float-right">Tambah Data Harga Produk</button>
            </div>
        </div>
        <!-- <hr> -->
        <div class="card-body table-responsive p-0" style="height: 330px;">
            <table role="table" class="table table-head-fixed  table-striped text-nowrap table-hover">
                <thead role="rowgroup">
                    <tr role="row">
                        <th scope="col" role="columnheader">NAMA PRODUK</th>
                        <th scope="col" role="columnheader">HARGA AWAL</th>
                        <th scope="col" role="columnheader">DISKON</th>
                        <th scope="col" role="columnheader">HARGA DISKON</th>
                        <th scope="col" role="columnheader">UKURAN</th>
                        <th scope="col" role="columnheader">STATUS</th>
                        <th scope="col" role="columnheader">TGL AKHIR PROMO</th>
                        <th scope="col" role="columnheader">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM harga_produk, jenis_produk WHERE harga_produk.id_hrg_produk = jenis_produk.id_jp";
                    $query = $this->db->query($sql);
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $data_hrg) {

                    ?>
                            <tr>
                                <td role="cell" scope="col"><?php echo $data_hrg->nm_jp; ?></td>
                                <td role="cell" scope="col">Rp.<?php echo $data_hrg->hrg_awal; ?></td>
                                <td role="cell" scope="col"> <?php echo $data_hrg->diskon; ?> %</td>
                                <td role="cell" scope="col">Rp.<?php echo $data_hrg->hrg_diskon; ?></td>
                                <td role="cell" scope="col">
                                    <?php
                                    if ($data_hrg->all_size == '') {
                                    } else { ?>
                                        <span class="border-size"></h6><?php echo $data_hrg->all_size; ?></span>
                                    <?php }
                                    if ($data_hrg->small == '') {
                                    } else { ?>
                                        <span class="border-size"></h6><?php echo $data_hrg->small; ?></span>
                                    <?php }
                                    if ($data_hrg->medium == '') {
                                    } else { ?>
                                        <span class="border-size"></h6><?php echo $data_hrg->medium; ?></span>
                                    <?php }
                                    if ($data_hrg->large == '') {
                                    } else { ?>
                                        <span class="border-size"></h6><?php echo $data_hrg->large; ?></span>
                                    <?php }
                                    if ($data_hrg->extra_large == '') {
                                    } else { ?>
                                        <span class="border-size"></h6><?php echo $data_hrg->extra_large; ?></span>

                                    <?php }
                                    if ($data_hrg->extra2_large == '') {
                                    } else { ?>
                                        <span class="border-size"></h6><?php echo $data_hrg->extra2_large; ?></span>

                                    <?php }
                                    ?>
                                </td>
                                <td role="cell" scope="col">
                                    <?php
                                    if ($data_hrg->status_produk == 'HOT') { ?>
                                        <span class="badge badge-success"><?php echo $data_hrg->status_produk; ?></span>

                                    <?php
                                    } else if ($data_hrg->status_produk == 'NEW') { ?>
                                        <span class="badge badge-info"><?php echo $data_hrg->status_produk; ?></span>
                                    <?php
                                    } else if ($data_hrg->status_produk == 'PROMO') { ?>
                                        <span class="badge badge-danger"><?php echo $data_hrg->status_produk; ?></span>
                                    <?php
                                    } ?>
                                </td>
                                <td role="cell" scope="col"><?php echo $data_hrg->tgl_akhir_promo; ?> <?php echo $data_hrg->jam_akhir_promo; ?></td>
                                <td role="cell" scope="col">
                                    <a href="#page">
                                        <button type="button" class="btn btn-xs bg-gradient-warning elevation-3 btn-edit-harga-produk" id="" data-id-hrg="<?php echo $data_hrg->id_hrg; ?>" data-id-hrg-produk="<?php echo $data_hrg->id_hrg_produk; ?>" data-hrg-awal="<?php echo $data_hrg->hrg_awal; ?>" data-diskon="<?php echo $data_hrg->diskon; ?>" data-hrg-diskon="<?php echo $data_hrg->hrg_diskon; ?>" data-al="<?php echo $data_hrg->all_size; ?>" data-s="<?php echo $data_hrg->small; ?>" data-m="<?php echo $data_hrg->medium; ?>" data-l="<?php echo $data_hrg->large; ?>" data-xl="<?php echo $data_hrg->extra_large; ?>" data-status-produk="<?php echo $data_hrg->status_produk; ?>" data-tgl-akhir="<?php echo $data_hrg->tgl_akhir_promo; ?>" data-jam-akhir="<?php echo $data_hrg->jam_akhir_promo; ?>">
                                            <i class="fa-solid fa-pen-to-square"></i> Lihat & Edit Harga
                                        </button>
                                    </a>
                                    <button type="button" class="hapus-hrg btn btn-xs bg-gradient-danger elevation-3" data-id-hrg="<?php echo $data_hrg->id_hrg; ?>">
                                        <i class="fas fa-trash-alt mr-1"></i>Delete
                                    </button>
                                </td>
                            </tr>
                            <!-- <hr> -->
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.btn-edit-harga-produk').click(function(e) {
            // alert(addCommas($(this).data('hrg-awal')))

            $('#form-harga-produk').removeAttr('hidden', true);
            $("#btn-simpan-harga-produk").val('edit-harga-produk');
            var hrg_produk = $(this).data('id-hrg-produk');
            $("#id-hrg-produk, option[value='" + hrg_produk + "']").attr("selected", "selected");
            // alert(hrg_produk);
            var status_produk = $(this).data('status-produk');
            $("#status-produk, option[value='" + status_produk + "']").attr("selected", "selected");
            $('#id-hrg').val($(this).data('id-hrg'));
            $('#hrg-awal').val(removeCommas($(this).data('hrg-awal')));
            $('#diskon').val($(this).data('diskon'));
            $('#hrg-diskon').val(removeCommas($(this).data('hrg-diskon')));
            $('#all-size').val($(this).data('al'));
            $('#small').val($(this).data('s'));
            $('#medium').val($(this).data('m'));
            $('#large').val($(this).data('l'));
            $('#extra-large').val($(this).data('xl'));
            $('#tgl-akhir-promo').val($(this).data('tgl-akhir'));
            $('#jam-akhir-promo').val($(this).data('jam-akhir'));
            alert(removeCommas($('#hrg-awal').val()))
            if ($('#all-size').val() == 'All Size') {
                $('#cheklis-al').prop('checked', true);
            } else {
                $('#cheklis-al').prop('checked', false);
            }
            if ($('#small').val() == 'S') {
                $('#cheklis-s').prop('checked', true);
            } else {
                $('#cheklis-s').prop('checked', false);
            }
            if ($('#medium').val() == 'M') {
                $('#cheklis-m').prop('checked', true);
            } else {
                $('#cheklis-m').prop('checked', false);
            }
            if ($('#large').val() == 'L') {
                $('#cheklis-l').prop('checked', true);
            } else {
                $('#cheklis-l').prop('checked', false);
            }
            if ($('#extra-large').val() == 'XL') {
                $('#cheklis-xl').prop('checked', true);
            } else {
                $('#cheklis-xl').prop('checked', false);
            }
            if (status_produk == 'PROMO') {
                $('#diskon').removeAttr('readonly', true);

            } else {
                $('#diskon').attr('readonly', true);

            }
            // if ($('#status').val() == 'Rekomendasikan') {
            //     $('#status-produk').prop('checked', true);
            // } else {
            //     $('#status-produk').prop('checked', false);
            // }

        });
        $('.hapus-hrg').click(function(e) {
            var el = this;

            // Delete id
            var id_hrg = $(this).data('id-hrg');
            $('#id-hrg').val(id_hrg);
            var confirmalert = confirm("Are you sure?");
            if (confirmalert == true) {
                let formData = new FormData();
                formData.append('id-hrg', id_hrg);
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('olah_data/hapus_hrg_produk') ?>",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(msg) {
                        $(el).closest('tr').css('background', 'tomato');
                        $(el).closest('tr').fadeOut(300, function() {
                            $(this).remove();
                        });
                    }
                });
            }
        });
        $('#btn-form-harga-produk').click(function(e) {
            $('#form-harga-produk').removeAttr('hidden', true);
            $("#btn-simpan-harga-produk").val('simpan-harga-produk');
        });
        $('#btn-batal-harga-produk').click(function(e) {
            $('#form-harga-produk').attr('hidden', true);
            form_harga_produk();
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

    });
</script>