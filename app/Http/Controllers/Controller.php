<?php

namespace App\Http\Controllers;

abstract class Controller
{
// AdminBorrowingController.php
public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'book_id' => 'required|exists:books,id',
        'borrow_date' => 'required|date|after_or_equal:today',
        'return_date' => 'required|date|after:borrow_date',
    ]);

    $book = Book::findOrFail($request->book_id);

    if ($book->stock < 1) {
        return back()->withErrors(['book_id' => 'Stok buku habis']);
    }

    // Kurangi stok
    $book->decrement('stock');

    Borrowing::create([
        'user_id' => $request->user_id,
        'book_id' => $book->id,
        'borrow_date' => $request->borrow_date,
        'return_date' => $request->return_date,
    ]);

    return redirect()->back()->with('success', 'Peminjaman berhasil dicatat');
}

}
