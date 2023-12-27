<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BookController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = 'Data Buku Perpustakaan';
        $data['q'] = $request->q;
        $data['rows'] = Book::where('nama_book', 'like', '%' . $request->q . '%')->get();
        return view('book.index', $data);
    }

    public function read()
    {
        $data = Book::all();
        return response()->json([
            'book' => $data
        ]);
    }

    public function create(Request $request)
    {
        $data['title'] = 'Tambah Buku';
        return view('book.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_book' => 'required',
            'nama_author' => 'required',
            'no_isbn' => 'required',
            'tahun_terbit' => 'required',
        ]);

        $book = new Book();
        $book->nama_book = $request->nama_book;
        $book->nama_author = $request->nama_author;
        $book->no_isbn = $request->no_isbn;
        $book->tahun_terbit = $request->tahun_terbit;
        $book->save();
        $book = Book::where('id','=', $book->id)->get();
        return redirect('book')->with('success', 'Tambah Data Berhasil');
    }

    public function show($id)
    {
        $book = Book::find($id);
            if (!$book) {
                return response()->json([
                    'message' => 'Buku tidak ditemukan'
        ], 404);
    }
        return response()->json([
            'book' => $book
        ]);
    }
    public function edit(Book $book)
    {
        $data['title'] = 'Ubah Data';
        $data['row'] = $book;
        return view('book.edit', $data);
    }

    public function update(Request $request, Book $book)
    {

        $request->validate([
            'nama_book' => 'required',
            'nama_author' => 'required',
            'no_isbn' => 'required',
            'tahun_terbit' => 'required',
        ]);

        $book->nama_book = $request->nama_book;
        $book->nama_author = $request->nama_author;
        $book->no_isbn = $request->no_isbn;
        $book->tahun_terbit = $request->tahun_terbit;
        $book->save();
        return redirect('book')->with('success', 'Ubah Data Berhasil');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('book')->with('success', 'Hapus Data Berhasil');
    }
}