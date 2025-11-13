@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('svgs/my-logo-mini.svg') }}" class="logo" alt="John Florentino D. Dunglao Logo">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
