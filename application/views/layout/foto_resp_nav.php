<div class="container mt-5">
    <?php
    $sql = "SELECT * FROM jenis_produk, harga_produk, foto_produk WHERE jenis_produk.id_jp = harga_produk.id_hrg_produk AND foto_produk.id_fotjp = jenis_produk.id_jp AND foto_produk.status_foto ='display' ORDER BY RAND() LIMIT 1";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $nm_jp = $row->nm_jp;
            $nm_produk = preg_replace("![^a-z0-9]+!i", "-", $nm_jp);
    ?>
            <a class="size-foto-nav" href="<?php echo base_url(); ?>detail_produk/data/<?php echo $row->id_jp; ?>/<?php echo $nm_produk; ?>">

                <img class="img-fluid" src="<?php echo base_url('upload'); ?>/<?php echo $row->fotpro; ?>">
            </a>
    <?php
        }
    }
    ?>
</div>