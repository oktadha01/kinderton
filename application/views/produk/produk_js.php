<script>
    jQuery(function() {
        jQuery('.btn-filter-produk').click(function() {
            jQuery('.col-produk').hide();
            $('#produk' + $(this).data('btn')).show();
            $('.btn-filter-produk-active').removeClass('btn-filter-produk-active');
            $('.btn-' + $(this).data('btn')).addClass('btn-filter-produk-active');
        });
        jQuery('.btn-all').click(function() {
            jQuery('.col-produk').show();
        });
    });
    
</script>