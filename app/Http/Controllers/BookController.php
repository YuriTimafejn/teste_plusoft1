<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\FlagBook;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    public function index()
    {
        $flags = FlagBook::all();
        $books = Book::all();

        return view('library.index', [
            'flags' => $flags,
            'books' => $books,
        ]);
    }

    public function store(StoreBookRequest $request)
    {
        $data = [
            "title" => $request->title,
            "author" => ucwords($request->author),
            "note" => trim($request->note),
            "flag_id" => $request->flag,
        ];
        try {
            Book::create($data);
            Session::flash('success', "Livro '$request->title' cadastrado com sucesso!");
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            Session::flash('error', 'Erro ao cadastrar livro!');
        }

        return redirect()->route('books.index');
    }

    public function update(UpdateBookRequest $request, $id)
    {
        $data = [
            'title' => $request->title,
            'author' => ucwords($request->author),
            'note' => trim($request->note),
            'flag_id' => $request->opt_flag,
        ];
        try {
            $book = Book::findOrFail($id);
            $book->update($data);

            Session::flash('success', "Livro '$book->title' atualizado com sucesso!");

        } catch (\Exception $exception) {
            Session::flash('error', "Erro ao atualizar o livro $request->title");
        }

        return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $title = $book->title;
        $book->delete();
        Session::flash('error', "Livro '$title' removido com sucesso!");
        return redirect()->route('books.index');
    }
}
