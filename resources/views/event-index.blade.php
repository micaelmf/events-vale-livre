<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Flisol Vale</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
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
                <!-- <a class="btn line-blue" href="#">Saiba Mais</a> -->
            </div>
        </div>

        <div class="section-title">Apoio</div>
        <div class="section sponsors">
            <div class="sponsor">
                <img src="{{ asset('images/brand-vale-livre.png') }}" alt="Patrocinador">
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
            <div class="speaker">
                <div>
                    <img src="{{ asset('images/brand-vale-livre.png') }}" alt="Patrocinador">
                </div>
                <div class="name">Name Speaker</div>
                <div class="bio">Biograph of speaker Biograph of speaker Biograph of speaker Biograph of
                    speaker Biograph of speaker Biograph of speaker Biograph of speaker</div>
                <div class="links">
                    <a href="#">Github</a>
                    <a href="#">Linkedin</a>
                    <a href="#">Instagram</a>
                    <a href="#">Facebook</a>
                    <a href="#">Twitter</a>
                    <a href="#">Youtube</a>
                    <a href="#">Medium</a>
                </div>
            </div>
            <div class="speaker">
                <div>
                    <img src="{{ asset('images/brand-vale-livre.png') }}" alt="Patrocinador">
                </div>
                <div class="name">Name Speaker</div>
                <div class="bio">Biograph of speaker Biograph of speaker Biograph of speaker Biograph of
                    speaker Biograph of speaker Biograph of speaker Biograph of speaker</div>
                <div class="links">
                    <a href="#">Github</a>
                    <a href="#">Linkedin</a>
                    <a href="#">Instagram</a>
                    <a href="#">Facebook</a>
                    <a href="#">Twitter</a>
                    <a href="#">Youtube</a>
                    <a href="#">Medium</a>
                </div>
            </div>
            <div class="speaker">
                <div>
                    <img src="{{ asset('images/brand-vale-livre.png') }}" alt="Patrocinador">
                </div>
                <div class="name">Name Speaker</div>
                <div class="bio">Biograph of speaker Biograph of speaker Biograph of speaker Biograph of
                    speaker Biograph of speaker Biograph of speaker Biograph of speaker Diamante</div>
                <div class="links">
                    <a href="#">Github</a>
                    <a href="#">Linkedin</a>
                    <a href="#">Instagram</a>
                    <a href="#">Facebook</a>
                    <a href="#">Twitter</a>
                    <a href="#">Youtube</a>
                    <a href="#">Medium</a>
                </div>
            </div>
            <div class="speaker">
                <div>
                    <img src="{{ asset('images/brand-vale-livre.png') }}" alt="Patrocinador">
                </div>
                <div class="name">Name Speaker</div>
                <div class="bio">Biograph of speaker Biograph of speaker Biograph of speaker Biograph of
                    speaker Biograph of speaker Biograph of speaker Biograph of speaker Ouro</div>
                <div class="links">
                    <a href="#">Github</a>
                    <a href="#">Linkedin</a>
                    <a href="#">Instagram</a>
                    <a href="#">Facebook</a>
                    <a href="#">Twitter</a>
                    <a href="#">Youtube</a>
                    <a href="#">Medium</a>
                </div>
            </div>
        </div>

        <div class="section-title">Agenda</div>
        <div class="section schedule">
            <div class="schedule-container">
                <div class="hour header">Horário</div>
                <div class="activity header">Atividade</div>
                <div class="speaker header">Palestrate</div>
                <div class="local header">Local</div>
                <div class="hour">08h - 8h30</div>
                <div class="activity">Abertura</div>
                <div class="speaker">Micael Ferreira</div>
                <div class="local">Auditório</div>
                <div class="hour">8h30 - 9h20</div>
                <div class="activity">Palestra: Seu site incrível com Wordpress</div>
                <div class="speaker">Micael Ferreira</div>
                <div class="local">Auditório</div>
                <div class="hour">8h30 - 12h</div>
                <div class="activity">Oficina: Css com Less</div>
                <div class="speaker">Micael Ferreira</div>
                <div class="local">Laboratório 1</div>
                <div class="hour">8h30 - 12h</div>
                <div class="activity">Oficina: Vamos Matar o Javacript</div>
                <div class="speaker">Hideljares Martins</div>
                <div class="local">Laboratório 2</div>
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
