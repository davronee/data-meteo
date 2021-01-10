if($('#app').length > 0)
var app = new Vue({
    el:'#app',
    data: {
        errors: [],
        statuses: [],
        isLoading: true,
        user_id: '',
        region_id: '',
        district_id: '',
        station_id: '',
        districts: {},
        stations: {},
        date: "",
        content: "",
    } ,
    methods: {
        validateInn: function(event)
        {
            $(event.target).val($(event.target).val().substr(0,9));
        },
        scrollToTop: function()
        {
            $("html, body").animate({ scrollTop: 0 }, "slow");
        },
        regionChanged: function(e)
        {
            var url = "/api/districts?region_id=" + this.region_id + "&user_id=" + this.user_id;
            this.regionFieldsAddDisabled();
            this.resetDistrictField();

            axios.get(url)
                .then((response) => {
                    if(response.data) {
                        this.districts = response.data;
                    }
                    this.setDistrictField();
                    this.regionFieldsRemoveDisabled();
                    this.districtChanged();
                }, (error) => {
                    console.log(error);
                    this.regionFieldsRemoveDisabled();
                });
        },
        districtChanged:function(e)
        {
            var url = "/api/stations?region_id=" + this.region_id + "&district_id=" + this.district_id + "&user_id=" + this.user_id;
            this.regionFieldsAddDisabled();
            this.resetStationField();

            axios.get(url)
                .then((response) => {
                    if(response.data) {
                        this.stations = response.data;
                    }
                    this.setStationField();
                    this.regionFieldsRemoveDisabled();
                }, (error) => {
                    console.log(error);
                    this.regionFieldsRemoveDisabled();
                });
        },
        resetDistrictField: function()
        {
            this.district_id = '';
        },
        setDistrictField: function()
        {
            this.district_id = $('#district_id').attr('data-selected');
        },
        regionFieldsAddDisabled: function()
        {
            $('#region_id, #district_id, #station_id').prop('disabled', true);
        },
        regionFieldsRemoveDisabled: function()
        {
            $('#region_id, #district_id, #station_id').prop('disabled', false);
        },
        resetStationField: function()
        {
            this.station_id = '';
        },
        setStationField: function()
        {
            this.station_id = $('#station_id').attr('data-selected');
        },


        // hourly station info
        deleteInfo: function(e, action, confirm_message, form_id)
        {
            if(!confirm(confirm_message))
            {
                return false;
            }

            $(form_id).attr('action', action);
            $(form_id).submit();
        },
        sendInfo: function(e, action, confirm_message, form_id)
        {
            if(!confirm(confirm_message))
            {
                return false;
            }

            $(form_id).attr('action', action);
            $(form_id).submit();
        },
        editor: function (e)
        {
            this.content = editor.getData();
        },
        makeEditor: function()
        {
            window.editor;
            DecoupledEditor
                .create( document.querySelector( '.document-editor__editable' ), {
                })
                .then(editor => {
                    const toolbarContainer = document.querySelector( '.document-editor__toolbar' );
                    toolbarContainer.appendChild( editor.ui.view.toolbar.element );
                    window.editor = editor;

                    this.content = editor.getData();
                })
                .catch( err => {
                    console.error( err );
                });
        }
    },
    watch: {
        'region_id': {
            handler: function (after, before) {
                // console.log(after, before);
            },
        },
    },
    computed: {
        //
    },
    created() {
        this.region_id = $('#region_id').val();
        this.user_id = $('#user_id').val();
    },
    mounted() {
        this.makeEditor();
        this.regionChanged();
    }
});
