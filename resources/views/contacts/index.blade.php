@extends('layouts.app')

@section('title', 'Contacts')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3">Contacts</h1>
  @auth
    <a href="{{ route('contacts.create') }}" class="btn btn-success">
      <i class="bi bi-plus-lg"></i> New Contact
    </a>
  @endauth
</div>

<!-- Search Input -->
<div class="mb-3">
  <input id="search" type="text" class="form-control" placeholder="Search by name, contact or email...">
</div>

<!-- Contacts Table -->
<div class="table-responsive">
  <table class="table table-striped table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th class="text-end">Actions</th>
      </tr>
    </thead>
    <tbody id="contacts-body">
      @include('contacts.partials._rows', ['_CONTACTS' => $_CONTACTS])
    </tbody>
  </table>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center">
  {{ $_CONTACTS->links('pagination::bootstrap-5') }}
</div>
@endsection

@push('scripts')
<script>
$(function() {
  let timer;
  $('#search').on('input', function() {
    clearTimeout(timer);
    const query = $(this).val();
    timer = setTimeout(function() {
      $.ajax({
        url: '{{ route('contacts.index') }}',
        data: { search: query },
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        success: function(html) {
          $('#contacts-body').html(html);
        },
        error: function() {
          console.error('Error fetching contacts');
        }
      });
    }, 300);
  });
});
</script>
@endpush