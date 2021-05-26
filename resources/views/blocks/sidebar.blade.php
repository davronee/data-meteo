<div class="sidebar">
    <div class="sidebar-header"><a href="#" class="sidebar-logo"><img src="{{asset('template/assets/img/gidrometeo.svg')}}"></a></div><!-- sidebar-header -->
    <div id="dpSidebarBody" class="sidebar-body">
        <ul class="nav nav-sidebar">
            @includeWhen(auth()->user()->isAdmin(), 'blocks.menu.admin')
            @includeWhen(auth()->user()->isStationShiftAgent(), 'blocks.menu.station-shift-agent')
            @includeWhen(auth()->user()->isStationCentralAgent(), 'blocks.menu.station-central-agent')
            @includeWhen(auth()->user()->isStationControlAgent(), 'blocks.menu.station-control-agent')

            <li class="nav-label"><label class="content-label">Прогноз погоды</label></li>
                <li class="nav-item">
                    <a href="#" class="nav-link with-sub"><i class="fas fa-cloud-sun-rain"></i> Общего пользования</a>
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
                @if (auth()->user()->isQuickInfoEditor())
                    <li class="nav-item">
                        <a href="#" class="nav-link with-sub"><i class="fas fa-exclamation-triangle text-danger"></i> Экстренное сообщение</a>
                        <nav class="nav nav-sub">
                            <a href="{{ route('quick-info.create') }}" class="nav-sub-link">Создать новый</a>
                            <a href="{{ route('quick-info.index') }}" class="nav-sub-link">Список сообщений</a>
                        </nav>
                    </li>
                @endif

                <li class="nav-label"><label class="content-label">Наблюдения и мониторинг</label></li>


                <li class="nav-item">
                    <a href="http://217.30.161.60:8083/meteo-data/meteosat?id={{ base64_encode('data_meteo_meteosat') }}&from={{ base64_encode('data.meteo.uz') }}&username={{ base64_encode('sinoptika') }}&time={{ time() }}&token={{ uniqid() }}" target="_blank" class="nav-link"><i class="fas fa-satellite"></i>Зондирование</a>
                </li>
                @if (auth()->user()->canSeeMonitoringMenu())
                    <li class="nav-item">
                        <a href="{{ route('aws-monitoring.create') }}" class="nav-link"><i class="fas fa-eye"></i> Мониторинг</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="" class="nav-link with-sub"><i class="fas fa-database"></i> Сбор данных</a>
                    <nav class="nav nav-sub">
                        <a href="#" class="nav-sub-link">Источники</a>
                        <a href="#" class="nav-sub-link">Метеостанции</a>
                        <a href="#" class="nav-sub-link">Метео карты</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link with-sub"><i class="fas fa-chart-line"></i> Анализ</a>
                    <nav class="nav nav-sub">
                        <a href="sinoptik.html" class="nav-sub-link">Синоптический анализ</a>
                        <a href="#" class="nav-sub-link">Анализ и объяснение</a>
                        <a href="#" class="nav-sub-link">Фактическая погода</a>
                        <a href="#" class="nav-sub-link">Данные об условиях погоды</a>
                    </nav>
                </li>
                <li class="nav-label"><label class="content-label">Визуализация данных</label></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-chart-area"></i> Визуализация данных</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-layer-group"></i> Виджеты</a></li>
                <li class="nav-label"><label class="content-label">Интеграция</label></li>
                <li class="nav-item">
                    <a href="" class="nav-link with-sub"><i class="fas fa-code"></i> Обмен данными</a>
                    <nav class="nav nav-sub">
                        <a href="#" class="nav-sub-link">В виде таблиц</a>
                        <a href="#" class="nav-sub-link">Экспорт на Excel</a>
                        <a href="#" class="nav-sub-link">Экспорт на XML</a>
                    </nav>
                </li>
                <li class="nav-label"><label class="content-label">Справочники и классификаторы</label></li>
                <li class="nav-item">
                    <a href="#" class="nav-link with-sub"><i class="fas fa-cogs"></i> Справочники</a>
                    <nav class="nav nav-sub">
                        <a href="#" class="nav-sub-link">Прогнозы погоды</a>
                        <a href="#" class="nav-sub-link">Метеостанции</a>
                        <a href="#" class="nav-sub-link">Пункты назначений</a>
                    </nav>
                </li>

                <li class="nav-label"><label class="content-label">Персональные данные</label></li>
                <li class="nav-item"><a href="#" class="nav-link with-sub"><i class="fas fa-user"></i> Кабинет пользователя</a>
                    <nav class="nav nav-sub">
                        <a href="#" class="nav-sub-link">Почта</a>
                        <a href="#" class="nav-sub-link">Чат</a>
                        <a href="{{ route('user-profile.edit', auth()->user()->id) }}" class="nav-sub-link">Настройка</a>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-sub-link">Выход</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </nav>
                </li>
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
