<div>
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
    <div id="addBookDiv" class="border border-secondary rounded" >

            <div class="container mt-2">
                <div class="d-flex justify-content-center">
                    <h5 class="" id="">Adicionar Livro</h5>
                </div>
                <div >
                    <form id="bookForm" action="{{ route('books.store') }}"
                          method="POST" class="m-3">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Título do Livro</label>
                            <input type="text" class="form-control" id="title" name="title" >
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Autor do Livro</label>
                            <input type="text" class="form-control" id="author" name="author" >
                        </div>
                        <div class="mb-3">
                            <label for="note" class="form-label">Notas</label>
                            <textarea name="note" class="form-control" id="note" cols="30" rows="5">
                            </textarea>
                        </div>
                        <div class="m-2">
                            @foreach($flags as $flag)
                                <input type="radio" class="btn-check" name="opt_flag" id="outlined-{{ $flag->id }}" value="{{ $flag->id }}" autocomplete="off" >
                                <label class="btn btn-outline-{{ $flag->color }}  m-1" for="outlined-{{ $flag->id }}">{{ $flag->flag }}</label>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="reset" id="btnCancel" class="btn btn-danger m-1">Cancela</button>
                            <button type="submit" class="btn btn-primary m-1">
                                Adicionar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

    </div>
</div>


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('btnCancel').addEventListener('click', () => {
                const modal = document.getElementById('addBookDiv');
                modal.style.display = 'none';
            })
        })
    </script>
@endpush
