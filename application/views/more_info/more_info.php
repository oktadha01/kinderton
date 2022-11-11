<div class="container pt-5rem">
    <center class="p-5">
        <a href="<?php echo base_url('dashboard'); ?>">
            <div class="col-12 btn-more-info p-2 mb-3">
                <h6 class="mb-1 mt-1">Website Kinderton</h6>
            </div>
        </a>
        <a href="https://shopee.co.id/kinderton.id">
            <div class="col-12 btn-more-info p-2 mb-3">
                <h6 class="mb-1 mt-1">Shopee</h6>
            </div>
        </a>
        <a href="https://www.tiktok.com/@kinderton.id">
            <div class="col-12 btn-more-info p-2 mb-3">
                <h6 class="mb-1 mt-1">Tiktok Shop</h6>
            </div>
        </a>
        <a href="https://www.instagram.com/kinderton.id/">
            <div class="col-12 btn-more-info p-2 mb-3">
                <h6 class="mb-1 mt-1">Instagram</h6>
            </div>
        </a>
        <a href="#">
            <div id="btn-wa" class="col-12 btn-more-info p-2 mb-3">
                <h6 class="mb-1 mt-1">Whatsapp</h6>
            </div>
        </a>
    </center>
</div>
<script>
    $('#btn-wa').click(function(e) {
        $("body").each(function() {
            
            var nohp = $('#no-admin').val();
            var pesan = 'Hallo Kinderton..';
            var $minWidth = 900;
            if ($(this).width() < $minWidth) {
                var linkWA = 'https://api.whatsapp.com/send?phone='+nohp+'&text='+pesan;
                window.location = linkWA;
            } else {
                var linkWA = 'https://web.whatsapp.com/send?phone='+nohp+'&text='+pesan;
                window.location = linkWA;
            }
        });
    });
</script>