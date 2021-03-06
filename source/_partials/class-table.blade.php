@php
  $scroll = isset($scroll) ? $scroll : true;
  $scroll = (count($rows) > 12 && ($scroll !== false));
@endphp

<div class="border-t border-b border-grey-light overflow-hidden relative">
  <div class="{{ $scroll ? 'lg:max-h-sm' : '' }} overflow-y-auto scrollbar-w-2 scrollbar-track-grey-lighter scrollbar-thumb-rounded scrollbar-thumb-grey scrolling-touch">
    <table class="w-full text-left table-collapse">
      <thead>
        <tr>
          <th class="text-sm font-semibold text-grey-darker p-2 bg-grey-lightest">{!! $headers[0] !!}</th>
          <th class="text-sm font-semibold text-grey-darker p-2 bg-grey-lightest">{!! $headers[1] !!}</th>
          @if (isset($headers[2]))
          <th class="text-sm font-semibold text-grey-darker p-2 bg-grey-lightest">{!! $headers[2] !!}</th>
          @endif
        </tr>
      </thead>
      <tbody class="align-baseline">
        @foreach ($rows as $row)
        <tr>
          <td class="p-2 border-t {{ $loop->first ? 'border-grey-light' : 'border-grey-lighter' }} font-mono text-xs text-green-dark whitespace-no-wrap">{!! $row[0] !!}</td>
          <td class="p-2 border-t {{ $loop->first ? 'border-grey-light' : 'border-grey-lighter' }} font-mono text-xs text-blue-dark">{!! $row[1] !!}</td>
          @if (isset($row[2]))
          <td class="p-2 border-t {{ $loop->first ? 'border-grey-light' : 'border-grey-lighter' }} font-mono text-xs text-blue-dark">{!! $row[2] !!}</td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>