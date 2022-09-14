<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title> Image Uploder </title>
    <meta name="viewport"
        content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        :root {
            --spacer: 10px;
        }
    </style>
</head>

<body>
    <div id="page">
        <x-header />
        <div class="pt-2 mb-2">
            <div class="container-fluid">
                <div class="row gap-2">
                    <nav id="sidebar" class="col-12 col-sm-auto row gy-2 m-0 p-0">
                        <div>
                            <div class="pb-3">
                                @guest
                                    <x-auth.login />
                                @endguest
                                @auth
                                    <x-user.menu />
                                @endauth
                            </div>
                            <x-user.list :users="$users" />
                        </div>
                    </nav>
                    <div id="main-contents" class="col-sm container-fluid p-0 pt-2 pe-3">
                        @hasSection('main-contents')
                            @yield('main-contents')
                        @else
                            <x-uploads :contents="$contents" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
