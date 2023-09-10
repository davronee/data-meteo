<div
        class="calcite-panels calcite-panels-left calcite-bg-custom calcite-text-light panel-group calcite-bgcolor-dark-blue"
        role="tablist" aria-multiselectable="true">


    <!-- API Panel -->

    <div id="panelApi" class="panel collapse">
        <div id="headingApi" class="panel-heading" role="tab">
            <div class="panel-title">
                <a class="panel-toggle" role="button" data-toggle="collapse" href="#collapseApi"
                   aria-expanded="true" aria-controls="collapseApi"><span class="fa fa-code"
                                                                          aria-hidden="true"></span><span
                            class="panel-label">Метео API</span></a>
                <a class="panel-close" role="button" data-toggle="collapse" tabindex="0" href="#panelApi"><span
                            class="esri-icon esri-icon-close" aria-hidden="true"></span></a>
            </div>
        </div>
        <div id="collapseApi" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingApi">
            <div class="panel-body">
                <p>@lang('map.api_info')</p>
                <p>@lang('map.moduls'):</p>
                <li>@lang('map.factik')</li>
                <li>@lang('map.atmasphera')</li>
                <li>@lang('map.locator')</li>
                <li>@lang('map.aero')</li>
                <li>@lang('map.sputnik')</li>
                <li>@lang('map.water_kadster')</li>
                <li>@lang('map.aws')</li>
                <hr>
                <li style="list-style: none;"><p>@lang('map.email_push')</p></li>
            </div>


        </div>


    </div>


    <!-- Info Panel -->

    <div id="panelInfo" class="panel collapse">
        <div id="headingInfo" class="panel-heading" role="tab">
            <div class="panel-title">
                <a class="panel-toggle" role="button" data-toggle="collapse" href="#collapseInfo"
                   aria-expanded="true" aria-controls="collapseInfo"><span class="glyphicon glyphicon-info-sign"
                                                                           aria-hidden="true"></span><span
                            class="panel-label">@lang('map.portal_info')</span></a>
                <a class="panel-close" role="button" data-toggle="collapse" tabindex="0" href="#panelInfo"><span
                            class="esri-icon esri-icon-close" aria-hidden="true"></span></a>
            </div>
        </div>
        <div id="collapseInfo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingInfo">
            <div class="panel-body">
                <p>@lang('map.main_title')</p>
                <p>@lang('map.moduls'):</p>
                <li>@lang('map.factik')</li>
                <li>@lang('map.atmasphera')</li>
                <li>@lang('map.locator')</li>
                <li>@lang('map.aero')</li>
                <li>@lang('map.sputnik')</li>
                <li>@lang('map.water_kadster')</li>
                <li>@lang('map.aws')</li>
            </div>
        </div>
    </div>

    <!-- Search Panel -->

    <div id="panelSearch" class="panel collapse hidden-sm hidden-md hidden-lg">
        <div id="headingSearch" class="panel-heading" role="tab">
            <div class="panel-title">
                <a class="panel-toggle collapsed" role="button" data-toggle="collapse" href="#collapseSearch"
                   aria-expanded="false" aria-controls="collapseSearch"><span class="glyphicon glyphicon-search"
                                                                              aria-hidden="true"></span><span
                            class="panel-label">@lang('map.search')</span></a>
                <a class="panel-close" role="button" data-toggle="collapse" tabindex="0" href="#panelSearch"><span
                            class="esri-icon esri-icon-close" aria-hidden="true"></span></a>
            </div>
        </div>
        <div id="collapseSearch" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSearch">
            <div class="panel-body calcite-body-expander">
                <div id="geocodeMobile"></div>
            </div>
        </div>
    </div>

    <!-- Данные Panel -->

    <div id="panelMeteodata" class="panel collapse">
        <div id="headingMeteodata" class="panel-heading" role="tab">
            <div class="panel-title">
                <a class="panel-toggle collapsed" role="button" data-toggle="collapse" href="#collapseMeteodata"
                   aria-expanded="false" aria-controls="collapseMeteodata"><span
                            class="glyphicon glyphicon-th-large" aria-hidden="true"></span><span
                            class="panel-label">@lang('map.meteologik_info')</span></a>
                <a class="panel-close" role="button" data-toggle="collapse" tabindex="0"
                   href="#panelMeteodata"><span class="esri-icon esri-icon-close" aria-hidden="true"></span></a>
            </div>
        </div>
        <div id="collapseMeteodata" class="panel-collapse collapse" role="tabpanel"
             aria-labelledby="headingMeteodata">
            <div class="panel-body">
                <div class="form-group">
                    <select id="selectStandardMeteodata" class="form-control" @change="menuChange()" v-model="menu">
                        <option value="fakt">@lang('map.factik')</option>
                        <option value="atmosphere">@lang('map.atmasphera')</option>
                        <option value="forecast">@lang('map.weather')</option>
                        <option value="radiatsiya">@lang('map.solar_radiation')</option>
                        <option value="locator">@lang('map.locator')</option>
                        <option value="aero">@lang('map.aero')</option>
                        <option value="snow">@lang('map.snow')</option>
                        <option value="sputnik">@lang('map.metep_sputnik')</option>
                        <option value="water_cadastr">@lang('map.kadaster_water')</option>
                        <option value="sensitive_data">@lang('map.sensitive_data')</option>
                        <optgroup label="@lang('map.auto_meteo')">
                            <option value="mini">@lang('map.mini_station')</option>
                            <option value="awd">@lang('map.meteo_auto')</option>
                            <option value="meteo_agro">@lang('map.agro_auto')</option>
                            <option value="meteo_irrigation">Ирригация</option>
                        </optgroup>
                        <optgroup label="@lang('map.danger_zones_kadaster')">

                            <option value="AtmZasuha">@lang('map.AtmZasuha')</option>
                            <option value="dojd_30mm_12ches">@lang('map.dojd_30mm_12ches')
                            </option>
                            <option value="dojd_polusutkas">@lang('map.dojd_polusutkas')</option>
                            <option value="osen_zam_pochvas">@lang('map.osen_zam_pochvas')</option>
                            <option value="osen_zam_vozds">@lang('map.osen_zam_vozds')</option>
                            <option value="sneg20mm12ches">@lang('map.sneg20mm12ches')</option>
                            <option value="sneg_polusutkas">@lang('map.sneg_polusutkas')</option>
                            <option value="t40_s">@lang('map.t40_s')</option>
                            <option value="ves_zampochvas">@lang('map.ves_zampochvas')</option>
                            <option value="ves_zam_vozduhs">@lang('map.ves_zam_vozduhs')</option>
                            <option value="veter_razl_predelov2020s">@lang('map.veter_razl_predelov2020s')
                            </option>
                            <option value="veter15s">@lang('map.veter15s')</option>
                        </optgroup>
                        <option value="water_consumption">@lang('map.hydroposts')</option>
                        <option value="comfort_zones">@lang('map.comfort_zones')</option>
                    </select>
                </div>
                <div v-if="menu == 'fakt'" class="form-group">
                    <select class="form-control" @change="current" v-model="regionid">
                        <option value="1700">Узбекистан</option>
                        <option v-for="item in regions" :value="item.regionid">@{{ item.nameRu }}</option>
                    </select>
                </div>
                <div v-if="menu == 'atmosphere'" class="form-group">
                    <select class="form-control" @change="getAtmasfera" v-model="regionid">
                        <option value="1700">Узбекистан</option>
                        <option v-for="item in regions" :value="item.regionid">@{{ item.nameRu }}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Basemaps Panel -->

    <div id="panelBasemaps" class="panel collapse">
        <div id="headingBasemaps" class="panel-heading" role="tab">
            <div class="panel-title">
                <a class="panel-toggle collapsed" role="button" data-toggle="collapse" href="#collapseBasemaps"
                   aria-expanded="false" aria-controls="collapseBasemaps"><span class="glyphicon glyphicon-th-large"
                                                                                aria-hidden="true"></span><span
                            class="panel-label">@lang('map.geografik_map_type')</span></a>
                <a class="panel-close" role="button" data-toggle="collapse" tabindex="0" href="#panelBasemaps"><span
                            class="esri-icon esri-icon-close" aria-hidden="true"></span></a>
            </div>
        </div>
        <div id="collapseBasemaps" class="panel-collapse collapse" role="tabpanel"
             aria-labelledby="headingBasemaps">
            <div class="panel-body">
                <select id="selectStandardBasemap" class="form-control">
                    <option value="Streets">@lang('map.Streets')</option>
                    <option value="Imagery">@lang('map.Imagery')</option>
                    <option selected value="NationalGeographic">@lang('map.NationalGeographic')</option>
                    <option value="Topographic">@lang('map.Topographic')</option>
                    <option value="Gray">@lang('map.Gray')</option>
                    <option value="DarkGray">@lang('map.DarkGray')</option>
                    <option value="OpenStreetMap">Open Street Map</option>
                </select>
            </div>
        </div>


    </div>
</div>