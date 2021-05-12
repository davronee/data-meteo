var app = new Vue({
    el:'#quick_info_create',
    data: {
        date: "",
        content: ""
    } ,
    methods: {
        editor: function (e)
        {
            this.content = editor.getData();
        },
        deleteModel: function(e)
        {
            if(!confirm($(e.target).attr('data-delete-confirm-text')))
            {
                e.preventDefault();
                return false;
            }
        },
        deleteInfo: function(e, action, confirm_message)
        {
            if(!confirm(confirm_message))
            {
                return false;
            }

            $('#delete-hourly-station-info-form').attr('action', action);
            $('#delete-hourly-station-info-form').submit();
        },
        sendInfo: function(e, action, confirm_message)
        {
            if(!confirm(confirm_message))
            {
                return false;
            }

            $('#send-hourly-station-info-form').attr('action', action);
            $('#send-hourly-station-info-form').submit();
        }
    },
    watch: {
        // 'content': {
        //     handler: function (after, before) {
        //         console.log(after, before);
        //     },
        // },
    },
    computed: {
        //
    },
    created() {
        console.log(this.content);
    }
});
