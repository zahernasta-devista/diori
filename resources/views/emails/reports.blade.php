@component('mail::message')
# Reports For This Current Month!<br>
Click The Button Down Below To Access The Reports Of This Month!
@component('mail::button', ['url' => 'http://127.0.0.1:8000/summary?month=12&year=2021&example_length=10'])
    Reports
@endcomponent

Thanks,<br>
Devista Team!
@endcomponent
