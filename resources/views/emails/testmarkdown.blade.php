@component('mail::message')
## Hi {{ $data['toName'] }}

你看到的是一封Markdown邮件。

他会随着窗口的改变而自动排版。

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

## About SEA LAND
SEA LAND 海岸顾问咨询公司
@endcomponent
