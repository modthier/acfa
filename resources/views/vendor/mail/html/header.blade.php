<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://i.ibb.co/LtqZH47/image-1.png" class="logo" alt="Acfa">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
