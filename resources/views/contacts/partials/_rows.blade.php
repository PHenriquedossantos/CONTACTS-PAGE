@forelse($_CONTACTS as $_CONTACT)
    <tr>
        <td class="align-middle">{{ $_CONTACT->id }}</td>
        <td class="align-middle">{{ $_CONTACT->name }}</td>
        <td class="align-middle">{{ $_CONTACT->contact }}</td>
        <td class="align-middle">{{ $_CONTACT->email }}</td>
        <td class="text-end align-middle">
            <a href="{{ route('contacts.show', $_CONTACT->id) }}"
               class="btn btn-sm btn-outline-primary me-1"
               title="Visualizar Detalhes"
               data-bs-toggle="tooltip"
               data-bs-placement="top">
                <i class="bi bi-eye-fill"></i> Ver
            </a>
            <a href="{{ route('contacts.edit', $_CONTACT->id) }}"
               class="btn btn-sm btn-outline-warning me-1"
               title="Editar Contato"
               data-bs-toggle="tooltip"
               data-bs-placement="top">
                <i class="bi bi-pencil-fill"></i> Editar
            </a>
            <form action="{{ route('contacts.destroy', $_CONTACT->id) }}"
                  method="POST"
                  class="d-inline"
                  onsubmit="return confirm('Tem certeza que deseja excluir este contato?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="btn btn-sm btn-outline-danger"
                        title="Excluir Contato"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top">
                    <i class="bi bi-trash-fill"></i> Excluir
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="text-center py-3">
            <span class="text-muted">Nenhum contato encontrado.</span>
        </td>
    </tr>
@endforelse