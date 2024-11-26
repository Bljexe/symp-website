@extends('layouts.app')

@section('title', 'Início')

@section('content')

    <!-- Seção: Jogar Agora -->
    <section class="hero-section">
        <div class="content d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="display-4" data-aos="fade-down">Comece sua aventura no universo de Symphonia</h1>
            <p class="lead mt-3" data-aos="fade-up">A jornada começa aqui!</p>
            <a href="{{ env('GAME_DOWNLOAD_URL') }}" target="_blank" class="btn btn-primary btn-lg mt-4"
                data-aos="zoom-in">Jogar Agora</a>
        </div>
    </section>

    <!-- Seção: Atualizações e Novidades -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Atualizações e Novidades</h2>
        <div class="row gx-3 gy-4">
            @foreach (App\Models\News::latest()->take(3)->get() as $index => $news)
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                    <div class="card shadow-sm" style="border-radius: 15px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $news->image) }}" class="card-img-top" alt="{{ $news->title }}"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $news->title }}</h5>
                            <p class="card-text">{{ Str::limit($news->content, 100) }}</p>
                            <a href="{{ route('news.show', $news->id) }}" class="btn btn-outline-primary btn-sm">Leia
                                mais</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="/noticias" class="btn btn-outline-primary">Ver todas as notícias</a>
        </div>
    </section>

@endsection
