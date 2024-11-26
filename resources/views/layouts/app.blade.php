<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ env('APP_NAME') }} - @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modals.css') }}">
    @stack('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
            </a>

            <!-- Botão Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                            href="/">Início</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('download') ? 'active' : '' }}"
                            href="{{ env('GAME_DOWNLOAD_URL') }}" target="_blank">Download</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="/classificacoes">Classificações</a></li> --}}
                    <li class="nav-item"><a class="nav-link {{ request()->is('discord') ? 'active' : '' }}"
                            href="{{ env('DISCORD_URL') }}" target="_blank">Discord</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('doacoes') ? 'active' : '' }}"
                            href="/doacoes">Doações</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('votar') ? 'active' : '' }}"
                            href="{{ env('VOTE_URL') }}" target="_blank">Votar</a></li>
                </ul>
                <!-- Botões -->
                @auth
                    <div class="d-flex align-items-center">
                        <a href="{{ route('painel') }}" class="btn btn-outline-light me-2">Painel</a>
                        <a href="{{ route('logout') }}" class="btn btn-jogar">Sair</a>
                    </div>
                @else
                    <div class="d-flex align-items-center">
                        <a href="#" class="btn btn-outline-light me-2" data-bs-toggle="modal"
                            data-bs-target="#loginModal">Conexão</a>
                        <a href="/jogar" class="btn btn-jogar" data-bs-toggle="modal"
                            data-bs-target="#registerModal">Registrar</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <!-- Footer -->
    <footer class="footer text-white pt-5 pb-4">
        <div class="container text-md-left">
            <div class="row text-md-left">
                <!-- Sobre -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Sobre Nós</h5>
                    <p>
                        {{ env('APP_NAME') }} Servidor Privado de Dofus 1.29 com as melhores experiencias já vistas no
                        mundo dos doze!
                    </p>
                </div>

                <!-- Links Úteis -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Links Úteis</h5>
                    <p><a href="/" class="text-white text-decoration-none">Início</a></p>
                    <p><a href="/downloads" class="text-white text-decoration-none">Downloads</a></p>
                    <p><a href="/classificacoes" class="text-white text-decoration-none">Classificações</a></p>
                    <p><a href="/doacoes" class="text-white text-decoration-none">Doações</a></p>
                    <p><a href="/votar" class="text-white text-decoration-none">Votar</a></p>
                </div>

                <!-- Contato -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Contato</h5>
                    <p><i class="fas fa-envelope mr-3"></i> suporte@symphonia.com</p>
                    <p><i class="fas fa-phone mr-3"></i> +55 (XX) XXXXX-XXXX</p>
                </div>

                <!-- Redes Sociais -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Redes Sociais</h5>
                    <a href="{{ env('DISCORD_URL') }}" target="_blank" class="text-white me-4">
                        <i class="fab fa-discord fa-2x"></i>
                    </a>
                    @if (env('INSTAGRAM_URL'))
                        <a href="{{ env('INSTAGRAM_URL') }}" target="_blank" class="text-white me-4">
                            <i class="fab fa-instagram fa-2x"></i>
                        </a>
                    @endif
                    @if (env('FACEBOOK_URL'))
                        <a href="{{ env('FACEBOOK_URL') }}" target="_blank" class="text-white me-4">
                            <i class="fab fa-facebook fa-2x"></i>
                        </a>
                    @endif
                    @if (env('TWITTER_URL'))
                        <a href="{{ env('TWITTER_URL') }}" target="_blank" class="text-white me-4">
                            <i class="fab fa-twitter fa-2x"></i>
                        </a>
                    @endif
                    @if (env('YOUTUBE_URL'))
                        <a href="{{ env('YOUTUBE_URL') }}" target="_blank" class="text-white me-4">
                            <i class="fab fa-youtube fa-2x"></i>
                        </a>
                    @endif
                </div>
            </div>

            <hr class="mb-4">

            <div class="row align-items-center">
                <div class="col-md-7 col-lg-8">
                    <p> &copy; 2024 - {{ env('APP_NAME') }}. Todos os direitos reservados.</p>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="text-center text-md-right">
                        <p>Desenvolvido por <a href="https://github.com/Bljexe" class="text-white">{Evoke} </a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    @include('modals.login')
    @include('modals.register ')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @stack('scripts')
</body>

</html>
