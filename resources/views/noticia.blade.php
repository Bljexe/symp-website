@extends('layouts.app')

@section('title', $noticia->title)

@section('content')
    <section class="container my-5">
        <!-- Título da Notícia -->
        <div class="text-center mb-5">
            <h1 class="display-5" style="color: #a8a4ff;" data-aos="fade-down">{{ $noticia->title }}</h1>
            <p class="text-white" data-aos="fade-up">{{ $noticia->created_at->format('d M Y, H:i') }}</p>
        </div>

        <!-- Imagem da Notícia -->
        <div class="text-center mb-5" data-aos="zoom-in">
            <img src="{{ asset('storage/' . $noticia->image) }}" alt="{{ $noticia->title }}" class="img-fluid rounded shadow"
                style="max-height: 400px; object-fit: cover;">
        </div>

        <!-- Conteúdo da Notícia -->
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card bg-dark text-white shadow" style="border-radius: 15px;" data-aos="fade-up">
                    <div class="card-body">
                        <p class="card-text" style="line-height: 1.8;">
                            {!! nl2br(e($noticia->content)) !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botão Voltar -->
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('index') }}" class="btn btn-outline-primary btn-lg">Voltar</a>
        </div>
    </section>
@endsection
