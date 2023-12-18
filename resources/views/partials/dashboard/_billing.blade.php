

<div id="loading">
    @include('partials.dashboard._body_loader')
</div>
<div style="width: 100%">
    {{ $slot }}
</div>
@include('partials.dashboard._body_footer')
@include('partials.dashboard._scripts')
