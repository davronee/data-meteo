<html>
<head>

</head>
<body>
<div>
    <h4>Отправка электронной заявки на оказание гидрометеорологических
        услуг</h4>
</div>
<p><b>тип пользователя :</b> {{$details['user_type'] == 'L' ? 'Юридическое лицо' : 'Физическое лицо'}}</p>
<p><b>@lang('messages.fio') :</b>{{$details['fio'] }}</p>
<p><b>Пинфл :</b> {{isset($details['pinfl']) ? $details['pinfl'] : '' }}</p>
<p><b>@lang('messages.tin') :</b> {{isset($details['tin']) ? $details['tin'] : '' }}</p>
<p><b>@lang('messages.email') :</b> {{isset($details['email']) ? $details['email'] : '' }}</p>
<p><b>@lang('messages.phone') :</b> {{isset($details['phone']) ? $details['phone'] : '' }}</p>
<p><b>Тип услуги :</b> {{isset($details['service']) ? $details['service'] : '' }}</p>
<p><b>>Регион :</b {{isset($details['region']) ? $details['region'] : '' }}</p>
<p><b>>id :</b {{isset($details['id_order']) }}</p>
</body>

</html>
