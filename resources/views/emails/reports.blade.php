@component('mail::message')
# Monthly Summary!
Reports For The Past Month!
Click The Button Down Below To Access The Reports Of This Month!
@component('mail::button', ['url' => route('monthly-summary', ['month' => $month, 'year' => $year])])
    Reports
@endcomponent

Thanks,<br>
Diori Team!
@endcomponent
