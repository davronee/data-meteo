$(document).ready(function(){
    // masks
    $(".email-field").inputmask({alias: "email"});

    // date field
    $(".date-field").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD.MM.YYYY',
            cancelLabel: 'Qaytadan',
            daysOfWeek: ["Du" ,"Se", "Cho", "Pa" ,"Ju", "Sha", "Ya"],
            monthNames: ["Yanvar", "Fevral", "Mart", "Aprel", "May", "Iyun", "Iyul", "Avgust","Sentyabr","Oktyabr","Noyabr","Dekabr"]
        }
    });

    $('[data-toggle="tooltip"]').tooltip();

    // ckeditor
    // if($('#editor').length > 0) {
        // ClassicEditor
        //     .create( document.querySelector( '#editor' ))
        //     .then( editor => {
        //         window.editor = editor;
        //     })
        //     .catch( err => {
        //         console.error( err.stack );
        //     });


});


