@component('mail::message')

New Exam Request 

@component('mail::table')
| Request ID    | Exam Name                          | Student Name             |
| ------------------|:------------------------------------:| ------------------------:|
| {{ $subscription->id }} | {{ $subscription->subscriptionable->name }}| {{ $subscription->user->name }}|
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
