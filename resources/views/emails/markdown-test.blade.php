@component('mail::message')
# Introduction

Test body

@component('mail::button', ['url' => '$url'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
