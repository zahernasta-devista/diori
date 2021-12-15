@component('mail::message')
# Reports For This Current Month!<br>
Click The Button Down Below To Access The Reports Of This week!
{{-- .'&month1='.$month1.'&year='.$year --}}
@component('mail::button', ['url' => route('weekly-summary', ['startWeek' => $startWeek, 'endWeek' => $endWeek])])
    Reports
@endcomponent

Thanks,<br>
Devista Team!
@endcomponent