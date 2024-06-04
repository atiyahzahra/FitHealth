@php
$color = $color ?? '#9055FD';
@endphp
<a href="/" class="navbar-brand">
  <span style="color:{{ $color }};">
    <img src="{{ asset('assets/img/favicon/favicon.ico') }}" alt="Logo" width="40" height="30" style="vertical-align: middle;">
  </span>
</a>
