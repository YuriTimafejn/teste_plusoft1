@extends('app')

@section('command-section')
    <div id="new-register" class="container m-3 d-flex justify-content-end">
        <button class="btn btn-primary" id="openAddBookDiv">Adicionar Livro</button>
    </div>

    <div id="flags" class="container m-3">
        <a href="{{ route('flag.flag', 0) }}" class="btn text-bg-dark m-2">Todos</a>
        @foreach($flags as $flag)
            <a href="{{ route('flag.flag', $flag->id) }}" class="btn text-bg-{{ $flag->color }} m-2">{{ $flag->flag }}</a>
        @endforeach
    </div>
@endsection

@section('table-section')

<!-- Order your soul. Reduce your wants. - Augustine -->
<div class="container-md mt-3">
    <table class="table">
        <thead>
        <th>Livro</th>
        <th colspan="2">Autor</th>
        </thead>

        <tbody>
        @foreach($books as $book)
            <tr>
                <td>
                    {{ $book->title }}
                    <span class="badge text-bg-{{ $book->flag->color }}">{{ $book->flag->flag }}</span>
                    <input type="hidden" name="flag" value="{{ $book->flag }}">
                </td>
                <td>{{ $book->author }}</td>
                <td>
                    <div class="d-flex gap-4">
                        <img src="{{ asset('assets/images/editar.png') }}" width="32px" height="32px" alt="Editar livro {{ $book->title }}" onclick="editBook({{ json_encode($book) }})">
                        <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este livro?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link" style="padding: 0; border: none; background: none;">
                                <img src="{{ asset('assets/images/excluir.png') }}" width="32px" height="32px" alt="Excluir livro {{ $book->title }}">
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('openAddBookDiv').addEventListener('click', () => {
                const modal = document.getElementById('addBookDiv');
                modal.style.display = 'block';
            })
        })

        function editBook(book) {
            console.log(book);
            document.getElementById('title').value = book.title;
            document.getElementById('author').value = book.author;
            document.getElementById('note').value = book.note;

            const flagRadioButtons = document.getElementsByName('opt-flag');
            console.log(flagRadioButtons);
            flagRadioButtons.forEach(radioButton => {
                radioButton.checked = radioButton.value == book.flag_id;
            });

            const form = document.getElementById('bookForm');
            form.action = book.id;
            form.querySelector('button[type="submit"]').textContent = 'Atualizar';

            const modal = document.getElementById('addBookDiv');
            modal.style.display = 'block';
        }
    </script>
@endpush
