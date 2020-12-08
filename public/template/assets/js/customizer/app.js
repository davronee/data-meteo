var app = new Vue({
    el:'#app',
    data: {
        errors: [],
        statuses: [],
        isLoading: true,
        region_id: '',
        district_id: '',
        districts: {},
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
        changeStatusToSudda: function(client_id)
        {
            console.log(client_id);
        },
        regionChanged: function(e)
        {
            var url = "/api/districts?region_id=" + this.region_id;
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
            $('#region_id, #district_id').prop('disabled', true);
        },
        regionFieldsRemoveDisabled: function()
        {
            $('#region_id, #district_id').prop('disabled', false);
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
    },
    mounted() {
        this.regionChanged();
    }
});
