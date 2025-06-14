@extends('layouts.app')

@section('title', 'Entrar')

@section('content')
<div class="row justify-content-center align-items-center vh-100">
  <div class="col-12 col-sm-8 col-md-6 col-lg-4">
    <div class="card shadow">
      <div class="card-body">
        <h3 class="card-title text-center mb-4">
          <i class="bi bi-person-circle"></i> Login
        </h3>
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input
              id="email"
              type="email"
              name="email"
              value="{{ old('email') }}"
              required
              autofocus
              class="form-control @error('email') is-invalid @enderror"
            >
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input
              id="password"
              type="password"
              name="password"
              required
              class="form-control @error('password') is-invalid @enderror"
            >
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-box-arrow-in-right"></i> Entrar
            </button>
          </div>
        </form>
      </div>
      <div class="card-footer text-center text-muted">
        © {{ date('Y') }} Minha Empresa
      </div>
    </div>
  </div>
</div>
@endsection
