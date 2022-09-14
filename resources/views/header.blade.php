<header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
        <div class="container-fluid">
            <a class="navbar-brand" id="logo" href="{{ route('home') }}">
                Laravel Demo
            </a>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => request()->is('/')]) href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => request()->is('*image*')]) href="{{ route('image.index') }}">
                        Image
                    </a>
                </li>
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => request()->is('*video*')]) href="{{ route('video.index') }}">
                        Video
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
