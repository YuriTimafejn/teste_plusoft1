<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\FlagBook;
use Illuminate\Http\Request;

class FlagBookController extends Controller
{
    public function flag($flag)
    {
        if($flag === '0'){
            return redirect()->route('books.index');
        }

        $flags = FlagBook::all();
        $books = Book::where('flag_id', $flag)->get();

        return view('library.index', [
            'flags' => $flags,
            'books' => $books,
        ]);
    }
}
