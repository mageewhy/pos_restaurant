@props(['dir'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ $dir ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }} | Responsive Bootstrap 5 Admin Dashboard Template</title>
    <!-- Google Tag Manager -->

    {{-- <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WNGH9RL');
        window.tag_manager_event = 'dashboard-free-preview';
        window.tag_manager_product = 'POSTAURANT';
    </script>
    <!-- End Google Tag Manager --> --}}
    @include('partials.dashboard._head')
    <style>
        .sidebar-billing {
            /* position: fixed; */
            top: 0;
            left: 0;
            height: 100vh;
        }
    </style>
</head>

<body>

    @if (auth()->guest())
        @include('partials.dashboard._body7')
    @else
        @include('partials.dashboard._billing')
    @endif
</body>

</html>
