<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('assets/icons/apple-icon-114x114.png') }}" class="logo" alt="Acfa">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
