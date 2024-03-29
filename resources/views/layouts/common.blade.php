<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <title>@yield('title')</title>
    </head>
    <body class="bg-light-subtle">
        <header class="mx-auto m-1">
            <div class="container">
            <h1><a href="{{ route('search') }}" class="text-decoration-none link-dark">ここ近飲食店</a></h1>
            </div>
        </header>
        <div class="mx-auto m-1">
            <div class="container">
                @include('flash_message')
                @yield('content')
            </div>
        </div>
        <footer class="mx-auto m-1">
            <a href="http://webservice.recruit.co.jp/"><img src="http://webservice.recruit.co.jp/banner/hotpepper-s.gif" alt="ホットペッパーグルメ Webサービス" width="135" height="17" border="0" title="ホットペッパーグルメ Webサービス"></a>
        </footer>
    </body>
</html>
