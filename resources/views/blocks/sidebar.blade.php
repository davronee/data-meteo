<div class="sidebar">
    <div class="sidebar-header"><a href="#" class="sidebar-logo"><img src="{{asset('template/assets/img/gidrometeo.svg')}}"></a></div><!-- sidebar-header -->
    <div id="dpSidebarBody" class="sidebar-body">
        <ul class="nav nav-sidebar">
            @includeWhen(auth()->user()->isAdmin(), 'blocks.menu.admin')
            @includeWhen(auth()->user()->isStationShiftAgent(), 'blocks.menu.station-shift-agent')
            @includeWhen(auth()->user()->isStationCentralAgent(), 'blocks.menu.station-central-agent')
            @includeWhen(auth()->user()->isStationControlAgent(), 'blocks.menu.station-control-agent')

            <li class="nav-item">
                <a href="http://217.30.161.60:8083" target="_blank" class="nav-link"><i class="fas fa-satellite"></i>Спутник Метеосат</a>
            </li>

            {{-- <li class="nav-label"><label class="content-label">Данные об условиях погоды</label></li>
            <li class="nav-item">
                <a href="#" class="nav-link with-sub"><i class="fas fa-cloud-sun-rain"></i> Прогноз погоды</a>
                <nav class="nav nav-sub">
                    <a href="#" class="nav-sub-link">Наукастинг(фактическая)</a>
                    <a href="#" class="nav-sub-link">Сверхкраткосрочный</a>
                    <a href="#" class="nav-sub-link">Краткосрочный</a>
                    <a href="#" class="nav-sub-link">Среднесрочный</a>
                    <a href="#" class="nav-sub-link">С расширенным сроком</a>
                    <a href="#" class="nav-sub-link">Долгосрочный</a>
                </nav>
            </li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-plane-departure"></i> Авиационные</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-tractor"></i> Агрометеорологические</a></li>
            <li class="nav-label"><label class="content-label">Наблюдения и мониторинг</label></li>
            <li class="nav-item">
                <a href="" class="nav-link with-sub"><i class="fas fa-temperature-high"></i> Температура</a>
                <nav class="nav nav-sub">
                    <a href="#" class="nav-sub-link">Min. С&deg; воздуха и почвы</a>
                    <a href="#" class="nav-sub-link">Max. С&deg; воздуха</a>
                </nav>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link with-sub"><i class="fas fa-cloud-rain"></i> Количество осадков</a>
                <nav class="nav nav-sub">
                    <a href="#" class="nav-sub-link">За прошедшие сутки</a>
                    <a href="#" class="nav-sub-link">За прошедший день</a>
                </nav>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link with-sub"><i class="fas fa-chart-area"></i> Визуализация</a>
                <nav class="nav nav-sub">
                    <a href="#" class="nav-sub-link">Метеограммы Европейского центра</a>
                    <a href="#" class="nav-sub-link">Спутниковые снимки</a>
                    <a href="#" class="nav-sub-link">МРЛ-снимки</a>
                </nav>
            </li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-cloud-showers-heavy"></i>Снежный покров</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-poo-storm"></i> Информация о штормовых явлениях</a></li>
            <li class="nav-label"><label class="content-label"></label></li>
            <li class="nav-item"><a href="#" class="nav-link text-danger"><i class="fas fa-exclamation-triangle"></i> Экстренная сообщения</a></li> --}}
        </ul>
        <hr class="mg-t-30 mg-b-25">
        <ul class="nav nav-sidebar">
            <li class="nav-item">
                <a href="#" class="nav-link with-sub"><i class="fas fa-info-circle"></i> Справочники</a>
                <nav class="nav nav-sub">
                    <a href="#" class="nav-sub-link">Норма и стандарты</a>
                </nav>
            </li>
            <li class="nav-item"><a href="#offCanvas3" class="nav-link off-canvas-menu"><i class="fas fa-question-circle"></i> О системе</a></li>
        </ul>
    </div><!-- sidebar-body -->
    <input type="hidden" id="user_id" value="{{ base64_encode(auth()->user()->id) }}">
</div><!-- sidebar -->
