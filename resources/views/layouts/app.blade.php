<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ config('blog.meta.keywords') }}">
    <meta name="description" content="{{ config('blog.meta.description') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ config('blog.default_icon') }}">

    <title>@yield('title', config('app.name'))</title>

    <link rel="stylesheet" href="{{ config('blog.cdn_url') }}{{ mix('css/home.css') }}">
    <link rel="stylesheet" href="{{ config('blog.cdn_url') }}{{ mix('css/themes/' . config('blog.color_theme') . '.css') }}">

    <!-- Scripts -->
    <script>
        window.Language = '{{ config('app.locale') }}';

        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    @yield('styles')
</head>
<body>
<div id="app">
    @include('particals.navbar')

    <div class="main">
        @yield('content')
    </div>

    @include('particals.footer')
</div>

<!-- Scripts -->
<script src="{{ config('blog.cdn_url')  }}{{ mix('js/home.js') }}"></script>

@yield('scripts')

<script>
    $(function () {
        $("[data-toggle='tooltip']").tooltip();
    });
</script>

@if(config('blog.google.open'))
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', '{{ config('blog.google.id') }}', 'auto');
        ga('send', 'pageview');
    </script>
@endif

<script>
    //baidu 统计
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?293cc3cc9d70a71abc90fc68c473d2f0";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

<script>
    //百度链接自动提交
    (function () {
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        } else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>

</body>
</html>
