<script>
    
    function toggletabscript(showtabs,hidetabs){
        let showtab = showtabs.split(',');
        for(i=0;i<showtab.length;i++){
            $('#'+showtab[i]).show();
        }
        
        let hidetab = hidetabs.split(',');
         for(i=0;i<hidetab.length;i++){
            $('#'+hidetab[i]).hide();
        }
    }
    
</script><?php /**PATH /home/banqgego/public_html/nobsbackend/resources/views/toggletabscript/index.blade.php ENDPATH**/ ?>