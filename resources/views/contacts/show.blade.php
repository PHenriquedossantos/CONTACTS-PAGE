@extends('layouts.app')

@section('title', 'Detalhes do Contato')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card border-0 shadow rounded-3">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="mb-0">
                        <i class="bi bi-person-lines-fill me-2"></i>
                        Detalhes do Contato
                    </h4>
                </div>

                <div class="card-body bg-light px-5 py-4">

                    <div class="mb-4 pb-2 border-bottom">
                        <span class="text-muted small">Nome</span>
                        <h5 class="fw-bold mb-0">{{ $_CONTACT->name }}</h5>
                    </div>

                    <div class="mb-4 pb-2 border-bottom">
                        <span class="text-muted small">Contato</span>
                        <h5 class="fw-bold mb-0">{{ $_CONTACT->contact }}</h5>
                    </div>

                    <div class="mb-2">
                        <span class="text-muted small">Email</span>
                        <h5 class="fw-bold mb-0">{{ $_CONTACT->email }}</h5>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between bg-white border-top py-3 px-4">
                    <a href="{{ route('contacts.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Voltar à lista
                    </a>
                    <div>
                        <a href="{{ route('contacts.edit', $_CONTACT->id) }}" class="btn btn-sm btn-warning me-2">
                            <i class="bi bi-pencil-fill"></i> Editar
                        </a>
                        <form action="{{ route('contacts.destroy', $_CONTACT->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Tem certeza que deseja excluir este contato?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash-fill"></i> Excluir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
