@component('mail::message')
# Reports For This Current Month!<br>
Click The Button Down Below To Access The Reports Of This Month!
@component('mail::button', ['url' => route('monthly-summary', ['month' => $month, 'year' => $year])])
    Reports
@endcomponent

Thanks,<br>
Devista Team!
@endcomponent
