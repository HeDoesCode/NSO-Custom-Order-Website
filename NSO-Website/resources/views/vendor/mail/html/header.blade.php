@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Not So Ordinary')
<img src="{{asset('images/Logo.png')}}" class="logo" alt="Not So Ordinary" >
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
