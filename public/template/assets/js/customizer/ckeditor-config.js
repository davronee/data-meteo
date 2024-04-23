if(typeof ClassicEditor !== 'undefined')
    ClassicEditor.defaultConfig = {
        toolbar: {
            items: [
                'heading',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify',
                'bold',
                'italic',
                'Link',
                '|',
                'bulletedList',
                'numberedList',
                '|',
                'insertTable',
                '|',
                'undo',
                'redo'
            ]
        },
        table: {
            contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
        },
        language: 'en'
    };

if(typeof DecoupledEditor !== 'undefined')
    DecoupledEditor.defaultConfig = {
        toolbar: {
            items: [
                'heading',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify',
                '|',
                'bold',
                'italic',
                'FontColor',
                '|',
                // 'subscript',
                // 'superscript',
                // '|',
                'bulletedList',
                'numberedList',
                '|',
                'insertTable',
                '|',
                'Link',
                '|',
                'undo',
                'redo'
            ]
        },
        table: {
            contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
        },
        language: 'en'
    };
