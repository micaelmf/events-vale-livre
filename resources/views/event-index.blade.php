<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{$event->name}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.3/css/line.css">
    <link rel="stylesheet" href="{{ asset('css/menu-flisol-vale.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flisol-vale.css') }}">
</head>

<body>
    <header id="header">
        <a id="logo" href="">Flisol Vale</a>
        <nav id="nav">
            <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu"
                aria-expanded="false">Menu
                <span id="hamburger"></span>
            </button>
            <ul id="menu" role="menu">
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Apoio</a></li>
                <li><a href="#">Palestrantes</a></li>
                <li><a href="#">Agenda</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="section about">
            <div class="brand">Flisol Vale 2022</div>
            <div class="text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quod quia quam recusandae, excepturi
                debitis minima voluptatum quisquam soluta dignissimos totam sed est eligendi eaque quo obcaecati hic
                porro quas.
            </div>
            <div class="buttons">
                <a class="btn line-blue" href="#">Inscreva-se</a>
            </div>
        </div>

        <div class="section-title">Apoio</div>
        <div class="section sponsors">
            <div class="sponsor">
                <a href="#">
                    <img src="{{ asset('images/brand-vale-livre.png') }}" alt="Patrocinador">
                </a>
                <div class="type">Realização</div>
            </div>
            <div class="sponsor">
                <img src="{{ asset('images/brand-vale-livre.png') }}" alt="Patrocinador">
                <div class="type">Apoio</div>
            </div>
            <div class="sponsor">
                <img src="{{ asset('images/brand-vale-livre.png') }}" alt="Patrocinador">
                <div class="type">Patrocinador Diamante</div>
            </div>
            <div class="sponsor">
                <img src="{{ asset('images/brand-vale-livre.png') }}" alt="Patrocinador">
                <div class="type">Patrocinador Ouro</div>
            </div>
        </div>

        <div class="section-title">Palestrantes</div>
        <div class="section speakers">
            @foreach ($speakers as $speaker)
                <div class="speaker">
                    <div>
                        <img src="{{ asset('images/speakers') }}/{{ $speaker->photo }}"
                            alt="Imagem do palestrante {{ $speaker->name }}">
                    </div>
                    <div class="name"><strong>{{ $speaker->name }}</strong></div>
                    <div class="bio">{{ $speaker->bio }}</div>
                    <div class="links">
                        @if ($speaker->link_github)
                            <a href="https://github.com/" {{ $speaker->link_github }}><i
                                    class="uil uil-github"></i></a>
                        @endif
                        @if ($speaker->link_linkedin)
                            <a href="https://www.linkedin.com/in/" {{ $speaker->link_linkedin }}><i
                                    class="uil uil-linkedin"></i></a>
                        @endif
                        @if ($speaker->link_instagram)
                            <a href="https://www.instagram.com/" {{ $speaker->link_instagram }}><i
                                    class="uil uil-instagram-alt"></i></a>
                        @endif
                        @if ($speaker->link_twitter)
                            <a href="https://twitter.com/" {{ $speaker->link_twitter }}><i
                                    class="uil uil-twitter"></i></a>
                        @endif
                        @if ($speaker->link_youtube)
                            <a href="https://www.youtube.com/c/" {{ $speaker->link_youtube }}><i
                                    class="uil uil-youtube"></i></a>
                        @endif
                        @if ($speaker->link_medium)
                            <a href="https://medium.com/" {{ $speaker->link_medium }}><i
                                    class="uil uil-medium-m"></i></a>
                        @endif
                        @if ($speaker->link_facebook)
                            <a href="https://www.facebook.com/" {{ $speaker->link_facebook }}><i
                                    class="uil uil-facebook"></i></a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="section-title">Agenda</div>
        <div class="section schedule">
            <div class="schedule-container">
                <div class="header">
                    <div class="hour">Horário</div>
                    <div class="hour">Duração</div>
                    <div class="speaker">Palestrate</div>
                    <div class="activity">Atividade</div>
                    <div class="local">Local</div>
                </div>
                @foreach ($activities as $activity)
                    <div class="line">
                        <div class="hour">{{ date('H:i', strtotime($activity->date)) }}</div>
                        <div class="duration">{{ date('H:i', strtotime($activity->duration)) }}</div>
                        <div class="speaker">{{ $activity->speaker_name }}</div>
                        <div class="activity">{{ $activity->name }}</div>
                        <div class="local">{{ $activity->space_name }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Desenvolvido por Vale Livre.</p>
            </div>
        </footer>
    </div>

    <script src="{{ asset('js/menu-flisol-vale.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
</body>

</html>
