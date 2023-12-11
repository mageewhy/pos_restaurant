

<div id="loading">
    @include('partials.dashboard._body_loader')
</div>
<div>
    {{ $slot }}
</div>
@include('partials.dashboard._body_footer')
@include('partials.dashboard._scripts')
