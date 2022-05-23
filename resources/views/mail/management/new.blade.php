@component('mail::message')

New Course Subscription 

@component('mail::table')
| Subscription      | Course Name                          | Student Name             |
| ------------------|:------------------------------------:| ------------------------:|
| {{ $subscription->id }} | {{ $subscription->subscriptionable->name }}| {{ $subscription->user->name }}|
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
