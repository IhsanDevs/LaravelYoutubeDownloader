<nav class="navbar navbar-dark navbar-expand-md fixed-top bg-primary" id="top">
    <div class="container-fluid"><a class="navbar-brand" href="{{ route('index') }}"><img
                src="assets/img/icons/android-chrome-512x512.png" width="30"
                height="30">{{ config('app.name') }}</a><button data-bs-toggle="collapse" class="navbar-toggler"
            data-bs-target="#navigation"><span class="visually-hidden">Toggle
                navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item"><a
                        class="nav-link @if ($title == config('app.name') . ' Downloader')
                      active
                    @endif"
                        href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" target="_blank"
                        href="https://dbapi.org/register">Register</a>
                </li>
                <li class="nav-item"><a class="nav-link" target="_blank"
                        href="https://dbapi.org/login">Login</a>
                </li>
                <li class="nav-item"><a
                        class="nav-link @if ($title == 'Terms')
                      active
                    @endif"
                        href="{{ route('terms') }}">Terms</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
