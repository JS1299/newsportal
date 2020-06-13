<!DOCTYPE html>
<html>
<head>
    <title>News Portal</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/design.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

<header>
    <div id="nav-bar">
        <nav id = "fleks">
            <ul class="menu">
                <li class="inline left">Politika</li>
                <li class="inline left">Sports</li>
                <li class="inline left">Kriminals</li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown inline right">
                            <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="inline right"><a href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))
                            <li class="inline right"> <a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </nav>
    </div>
</header>

</body>
</html>
