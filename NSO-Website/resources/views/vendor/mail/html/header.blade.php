@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://scontent.fmnl8-1.fna.fbcdn.net/v/t1.15752-9/423221285_916548886467307_4904752016661260543_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeFiIpKS4gtk7_VSjWL6iheA32bBdZyq2vHfZsF1nKra8WAMOnI4NHf2s0TT0RGXfptzMxP4MaIrAPmVwzueeCe_&_nc_ohc=DDHWz-Z5Vl8AX-4bwpZ&_nc_ht=scontent.fmnl8-1.fna&oh=03_AdRhRROMwexDdIEvm0uSM8i023jglrTbQ6SyN6ebRqEpbA&oe=65F047AF" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
