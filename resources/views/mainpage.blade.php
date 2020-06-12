<!DOCTYPE html>
<html>
<head>
    <title>News Portal</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/design.css') }}" rel="stylesheet">
</head>
<body>

<header>
    <div id="nav-bar">
        <nav id = "fleks">
            <ul class="menu">
                <li class="inline left">Politika</li>
                <li class="inline left">Sports</li>
                <li class="inline left">Kriminals</li>
                @if (!Auth::guest())
                    <li class="inline right">Welcome</li>
                @else
                    <li class="inline right">Sign In</li>
                    <li class="inline right">Sign Up</li>
                @endif
            </ul>
        </nav>
    </div>
</header>

</body>
</html>
