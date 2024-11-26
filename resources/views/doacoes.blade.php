@extends('layouts.app')

@section('title', 'Doações')

@section('content')
    <section class="container my-5 text-center">
        <div class="d-flex flex-column align-items-center justify-content-center" style="height: 50vh;">
            <h1 class="display-4" style="color: #a8a4ff;" data-aos="fade-down">Página em Desenvolvimento</h1>
            <p class="lead text-white mt-3" data-aos="fade-up">
                Estamos trabalhando duro para trazer novidades incríveis para você. Fique atento!
            </p>
            <a href="{{ route('index') }}" class="btn btn-outline-primary mt-4" data-aos="zoom-in">
                Voltar para Início
            </a>
        </div>
    </section>
@endsection
