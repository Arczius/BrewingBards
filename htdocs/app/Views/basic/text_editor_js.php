<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.2/trumbowyg.min.js" integrity="sha512-mBsoM2hTemSjQ1ETLDLBYvw6WP9QV8giiD33UeL2Fzk/baq/AibWjI75B36emDB6Td6AAHlysP4S/XbMdN+kSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.2/plugins/fontsize/trumbowyg.fontsize.min.js" integrity="sha512-WdhL8sm9nOrrL8uyZAPwKq6YIwmyYe2KUQjcEd7sBRNq0TSkWFbhRSg8x39okWRAnYIzD8Bex7kV2R3O/+VqTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.editor').trumbowyg({
    tagsToRemove: ['script', 'link'], 
    btns: [  
        ['viewHTML'],
        ['undo', 'redo'], // Only supported in Blink browsers
        ['formatting'],
        ['fontsize'],
        ['strong', 'em', 'del'],
        ['superscript', 'subscript'],
        ['link'],
        ['insertImage'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']
    ]
});

    function test(){
    var content = ($('.editor').trumbowyg('html'));
    alert(content);
    }
</script>