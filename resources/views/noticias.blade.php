@extends('layouts.app')

@section('title', 'Notícias')

@section('content')

    <section class="container my-5">
        <div class="text-center mb-5">
            <h1 class="display-5" style="color: #a8a4ff;" data-aos="fade-down">Notícias</h1>
        </div>

        <div class="row justify-content-center">
            @foreach ($noticias as $noticia)
                <div class="col-md-6 col-lg-4 mb-5" data-aos="zoom-in">
                    <div class="card bg-dark text-white shadow" style="border-radius: 15px;">
                        <img src="{{ asset('storage/' . $noticia->image) }}" alt="{{ $noticia->title }}"
                            class="card-img-top"
                            style="border-top-left-radius: 15px; border-top-right-radius: 15px; object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #a8a4ff;">{{ $noticia->title }}</h5>
                            <p class="card-text" style="line-height: 1.8;">
                                {{ Str::limit($noticia->content, 100) }}
                            </p>
                            <a href="{{ route('news.show', $noticia->id) }}" class="btn btn-outline-primary">Ler mais</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            {{ $noticias->links() }}
        </div>

    </section>

@endsection
