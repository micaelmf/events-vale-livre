<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $event->name }}</title>

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
        <img src="{{ asset('images/flisol-horizontal.svg') }}" alt="">
        {{-- <a id="logo" href=""></a> --}}
        <nav id="nav">
            <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu"
                aria-expanded="false">Menu
                <span id="hamburger"></span>
            </button>
            <ul id="menu" role="menu">
                <li><a href="#">Sobre</a></li>
                <li><a href="#sponsors">Apoio</a></li>
                <li><a href="#speakers">Palestrantes</a></li>
                <li><a href="#schedule">Agenda</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="section about">
            <div class="brand"><img src="{{ asset('images/flisol-quadrado.svg') }}" alt=""></div>
            {{-- <div class="event-name">{{ $event->name }}</div> --}}
            <div class="text">
                {{ $event->about }}
            </div>
            <div class="buttons">
                @if (
                    date('d-m-Y H:i:s') >= $event->subscription_issuance_start_date
                    && date('d-m-Y H:i:s') <= $event->subscription_issuance_end_date
                    && !empty($event->link_registrations)
                )
                    <a class="btn solid-blue" href="{{ $event->link_registrations }}">Inscreva-se</a>
                @endif
                @if (
                    date('d-m-Y H:i:s') >= $event->certificates_issuance_start_date 
                    && !empty($event->link_certificates)
                )
                    <a class="btn line-black" href="{{ $event->link_certificates }}">Emitir certificar</a>
                @endif
                @if (
                    date('d-m-Y H:i:s') >= $event->certificates_issuance_start_date 
                    && date('d-m-Y H:i:s') <= $event->certificates_issuance_end_date
                    && !empty($event->link_certificates)
                )
                    <a class="btn line-black" href="{{ $event->link_certificates }}">Emitir certificar</a>
                @endif

                @if (!empty($event->link_photos))
                    <a class="btn solid-blue" href="{{ $event->link_photos }}">Ver fotos</a>
                @endif
            </div>
        </div>

        <div id="sponsors" class="section-title">Apoio</div>
        <div class="section sponsors">
            @foreach ($event->sponsors as $sponsor)
                @if ($sponsor->type == 'Realização' || $sponsor->type == 'Apoio')
                    <div class="sponsor">
                        <img src="{{ asset('images/sponsors') }}/{{ $sponsor->image }}" alt="">
                        <div class="type">{{ $sponsor->type }}</div>
                    </div>
                @endif
            @endforeach

            @foreach ($event->sponsors as $sponsor)
                @if ($sponsor->type != 'Realização' && $sponsor->type != 'Apoio')
                    <div class="sponsor">
                        <img src="{{ asset('images/sponsors') }}/{{ $sponsor->image }}" alt="">
                        <div class="type">{{ $sponsor->type }}</div>
                    </div>
                @endif
            @endforeach
        </div>

        <div id="speakers" class="section-title">Palestrantes</div>
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
                            <a href="https://github.com/{{ $speaker->link_github }}" ><i
                                    class="uil uil-github"></i></a>
                        @endif
                        @if ($speaker->link_linkedin)
                            <a href="https://www.linkedin.com/in/{{ $speaker->link_linkedin }}" ><i
                                    class="uil uil-linkedin"></i></a>
                        @endif
                        @if ($speaker->link_instagram)
                            <a href="https://www.instagram.com/{{ $speaker->link_instagram }}" ><i
                                    class="uil uil-instagram-alt"></i></a>
                        @endif
                        @if ($speaker->link_twitter)
                            <a href="https://twitter.com/{{ $speaker->link_twitter }}" ><i
                                    class="uil uil-twitter"></i></a>
                        @endif
                        @if ($speaker->link_youtube)
                            <a href="https://www.youtube.com/c/{{ $speaker->link_youtube }}" ><i
                                    class="uil uil-youtube"></i></a>
                        @endif
                        @if ($speaker->link_medium)
                            <a href="https://medium.com/{{ $speaker->link_medium }}" ><i
                                    class="uil uil-medium-m"></i></a>
                        @endif
                        @if ($speaker->link_facebook)
                            <a href="https://www.facebook.com/{{ $speaker->link_facebook }}" ><i
                                    class="uil uil-facebook"></i></a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div id="schedule" class="section-title">Agenda</div>
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
                        <div class="activity">{{ $activity->activity_name }}</div>
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
