$(document).ready(function(){
    // masks
    $(".email-field").inputmask({alias: "email"});

    // ckeditor
    if($('#editor').length > 0) {
        ClassicEditor
            .create( document.querySelector( '#editor' ))
            .then( editor => {
                window.editor = editor;
            })
            .catch( err => {
                console.error( err.stack );
            });
    }
});


