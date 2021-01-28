@component('mail::message')

<h3 style="text-align:center; font-weight: bold; font-size: 18px">
مرحبـاً سـيـد/ة {{$poster->name}}
<br>
{{-- covid-19-ly فريق عمل --}}
</h3>

<br>

<div style="text-align: right">
{{$text_replay}}
</div>

<br>

{{-- @component('mail::button', ['url' => url('/')])
إذهـب للموقع
@endcomponent --}}

<div style="text-align:center; font-weight: bold; font-size: 18px">
تحياتنا لك ,<br>
{{ config('app.name') }}
</div>

@endcomponent
