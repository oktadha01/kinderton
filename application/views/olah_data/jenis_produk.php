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
            content: "NAMA PRODUK";
        }

        td:nth-of-type(2):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "KATEGORI";
        }

        td:nth-of-type(3):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "GENDER";
        }

        td:nth-of-type(4):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "STATUS";
        }


        td:nth-of-type(5):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "DESKRIPSI";
        }

        td:nth-of-type(6):before {
            padding-top: 12px;
            font-weight: bolder;
            content: "ACTION";
        }
    }
</style>

<div id="dtjp" class="min-height box_account ">
    <div class="form_container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <h5>Data Jenis Produk</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <button type="button" id="btn-form-jenis-produk" class="btn btn-sm bg-info float-right">Tambah Data Jenis Produk</button>
            </div>
        </div>
        <!-- <div class="row"> -->
        <div class="card-body table-responsive p-0" style="height: 330px;">
            <table role="table" class="table table-head-fixed  table-striped text-nowrap table-hover">
                <thead role="rowgroup">
                    <tr role="row">
                        <th scope="col" role="columnheader">NAMA PRODUK</th>
                        <th scope="col" role="columnheader">KATEGORI</th>
                        <th scope="col" role="columnheader">GENDER</th>
                        <th scope="col" role="columnheader">STATUS</th>
                        <th scope="col" role="columnheader">DESKRIPSI</th>
                        <th scope="col" role="columnheader">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($jenis_produk as $data_jp) :
                    ?>
                        <tr role="row">
                            <td role="cell" scope="col"> <?php echo $data_jp->nm_jp; ?></td>
                            <td role="cell" scope="col"> <?php echo $data_jp->kategori; ?></td>
                            <td role="cell" scope="col"> <?php echo $data_jp->gender; ?></td>
                            <td role="cell" scope="col">
                                <?php
                                if ($data_jp->status_produk == 'HOT') { ?>
                                    <span class="badge badge-success"><?php echo $data_jp->status_produk; ?></span>

                                <?php
                                } else if ($data_jp->status_produk == 'NEW') { ?>
                                    <span class="badge badge-info"><?php echo $data_jp->status_produk; ?></span>
                                <?php
                                } else if ($data_jp->status_produk == 'PROMO') { ?>
                                    <span class="badge badge-danger"><?php echo $data_jp->status_produk; ?></span>
                                <?php
                                } ?>
                            </td>
                            <td role="cell" scope="col">
                                <h6 id="deskripsi<?php echo $data_jp->id_jp; ?>" class="cursor-pointer text-primary mt-1">Deskripsi</h6>
                                <div id="conten-desk<?php echo $data_jp->id_jp; ?>" class="desk<?php echo $data_jp->id_jp; ?>">
                                    <p class="text-wrap"> <?php echo $data_jp->desk; ?></p>
                                </div>
                            </td>
                            <td role="cell" scope="col">
                                <a href="#page">
                                    <button type="button" class="btn btn-xs bg-gradient-info elevation-3 btn-edit-jenis-produk" id="" data-id-jp="<?php echo $data_jp->id_jp; ?>" data-nm-jp="<?php echo $data_jp->nm_jp; ?>" data-kategori="<?php echo $data_jp->kategori; ?>" data-gender="<?php echo $data_jp->gender; ?>" data-desk="<?php echo $data_jp->desk; ?>">
                                        <i class="fa-solid fa-pen-to-square"></i> Lihat & Edit Detail
                                    </button>
                                </a>
                                <button type="button" data-id="" class="hapus-jp btn btn-xs bg-gradient-danger elevation-3" data-id-jp="<?php echo $data_jp->id_jp; ?>">
                                    <i class="fas fa-trash-alt mr-1"></i>Delete
                                </button>
                            </td>
                        </tr>
                    <?php
                    endforeach
                    ?>
                </tbody>
            </table>
        </div>
        <hr>
    </div>
    <!-- /form_container -->
</div>

<script>
    $(document).ready(function() {
        // $("#ukuran,select option[value='medium']").attr("selected", true);

        $('.btn-edit-jenis-produk').click(function(e) {
            $("#btn-simpan-jenis-produk").val('edit-jenis-produk');
            $('#form-jenis-produk').removeAttr('hidden', true);
            $('#id-jp').val($(this).data('id-jp'));
            $('#nm-jp').val($(this).data('nm-jp'));
            $("#kategori, option[value='" + $(this).data('kategori') + "']").attr("selected", "selected");
            $("#gender, option[value='" + $(this).data('gender') + "']").attr("selected", "selected");
            $('#desk').val($(this).data('desk'));
            $('#status').val($(this).data('status'));
        });
        $('.hapus-jp').click(function(e) {
            var el = this;

            // Delete id
            var id_jp = $(this).data('id-jp');
            $('#id-jp').val(id_jp);
            var confirmalert = confirm("Are you sure?");
            if (confirmalert == true) {
                let formData = new FormData();
                formData.append('id-jp', id_jp);
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('olah_data/hapus_jenis_produk') ?>",
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

        $('#btn-form-jenis-produk').click(function(e) {
            $('#form-jenis-produk').removeAttr('hidden', true);
            $("#btn-simpan-jenis-produk").val('simpan-jenis-produk');
        });
        $('.btn-batal').click(function(e) {
            $('#form-jenis-produk').attr('hidden', true);
            form_jenis_produk();
            $("#kategori").removeAttr("selected", "selected");

        });
        <?php
        foreach ($jenis_produk as $data_jp) :
        ?>
            $('.desk<?php echo $data_jp->id_jp; ?>').hide();
            $('#deskripsi<?php echo $data_jp->id_jp; ?>, #conten-desk<?php echo $data_jp->id_jp; ?>').click(function() {
                $('.desk<?php echo $data_jp->id_jp; ?>').toggle(300);
                // alert('ya');
            });
        <?php
        endforeach;
        ?>
    });
</script>