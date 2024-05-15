@extends('app')

@section('command-section')
    <div id="new-register" class="container m-3 d-flex justify-content-end">
        <button class="btn btn-primary">Adicionar Livro</button>
    </div>

    <div id="flags" class="container m-3">
        @foreach($flags as $flag)
            <span class="btn text-bg-{{ $flag->color }} me-4">{{ $flag->flag }}</span>
        @endforeach
    </div>
@endsection

@section('table-section')

<!-- Order your soul. Reduce your wants. - Augustine -->
<div class="container-md mt-3">
    <table class="table">
        <thead>
        <th>Livro</th>
        <th>Autor</th>
        <th>Ação</th>
        </thead>

        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->flag->flag }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
