@extends('layouts.app')

@section('title', 'Edit Contact')

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card shadow-lg border-0">
            <!-- Cabeçalho do Card -->
            <div class="card-header bg-primary text-white d-flex align-items-center">
                <i class="bi bi-pencil-fill me-2"></i>
                <h3 class="card-title mb-0 fs-5">Edit Contact</h3>
            </div>
            <!-- Corpo do Card -->
            <div class="card-body p-4">
                <form method="POST" action="{{ route('contacts.update', $_CONTACT->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold">
                            <i class="bi bi-person-fill me-1"></i> Name
                        </label>
                        <input 
                            id="name"
                            name="name"
                            type="text"
                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                            value="{{ old('name', $_CONTACT->name) }}"
                            required
                            placeholder="Enter full name"
                        >
                        @error('name')
                            <div class="invalid-feedback d-flex align-items-center">
                                <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Contact -->
                    <div class="mb-4">
                        <label for="contact" class="form-label fw-semibold">
                            <i class="bi bi-telephone-fill me-1"></i> Contact (9 digits)
                        </label>
                        <input 
                            id="contact"
                            name="contact"
                            type="text"
                            class="form-control form-control-lg @error('contact') is-invalid @enderror"
                            value="{{ old('contact', $_CONTACT->contact) }}"
                            required
                            placeholder="123456789"
                        >
                        @error('contact')
                            <div class="invalid-feedback d-flex align-items-center">
                                <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">
                            <i class="bi bi-envelope-fill me-1"></i> Email address
                        </label>
                        <input 
                            id="email"
                            name="email"
                            type="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                            value="{{ old('email', $_CONTACT->email) }}"
                            required
                            placeholder="example@domain.com"
                        >
                        @error('email')
                            <div class="invalid-feedback d-flex align-items-center">
                                <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Botões -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('contacts.index') }}"
                           class="btn btn-outline-secondary btn-lg"
                           title="Back to Contact List"
                           data-bs-toggle="tooltip"
                           data-bs-placement="top">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                        <button type="submit"
                                class="btn btn-primary btn-lg"
                                title="Save Changes"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top">
                            <i class="bi bi-save-fill"></i> Update Contact
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    // Inicializar tooltips
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
});
</script>
@endpush
