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
                    console.log(response);
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
                    console.log(response);
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
        },
        editor: function (e)
        {
            this.content = editor.getData();
        },
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
        this.regionChanged();
    }
});
