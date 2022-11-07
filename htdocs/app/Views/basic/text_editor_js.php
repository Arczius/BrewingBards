<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.2/trumbowyg.min.js" integrity="sha512-mBsoM2hTemSjQ1ETLDLBYvw6WP9QV8giiD33UeL2Fzk/baq/AibWjI75B36emDB6Td6AAHlysP4S/XbMdN+kSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.test').trumbowyg({
    tagsToRemove: ['script', 'link']
});

    function test(){
    alert($('#editor').trumbowyg('html'));
    }
</script>