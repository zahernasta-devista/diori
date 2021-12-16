@component('mail::message')
    #Weekly Summary!
Reports For This Current Week!<br>
Click The Button Down Below To Access The Reports Of This week!
@component('mail::button', ['url' => route('weekly-summary', ['startWeek' => $startWeek, 'endWeek' => $endWeek])])
    Reports
@endcomponent

Thanks,<br>
Devista Team!
@endcomponent