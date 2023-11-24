<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Books;
use CodeIgniter\API\ResponseTrait;
use App\Models\Transactions;
use App\Models\Users;
use Faker\Provider\Uuid;

class TransactionsController extends BaseController
{
  use ResponseTrait;

  public function index()
  {
    $model = new Transactions();
    $data['transactions'] = $model->findAll();
    return view('transaction/history', $data);
  }

  public function show($id)
  {
    $transaction = new Transactions();
    $data['transaction'] = $transaction->where('id', $id)->first();

    $book = new Books();
    $data['book'] = $book->where('id', $transaction->book_id)->first();

    return view('transaction/detail', $data);
  }

  public function create()
  {
    $data = [
      'id' => Uuid::uuid(),
      'user_id' => $this->request->getVar('user_id'),
      'book_id' => $this->request->getVar('book_id'),
      'total_price' => $this->request->getVar('total_price'),
      'count' => $this->request->getVar('count'),
    ];

    $user = new Users();
    if (!$user->find($data['user_id'])) {
      return redirect()->back()->with('error', 'ID Pengguna tidak valid');
    }

    $book = new Books();
    if (!$book->find($data['book_id'])) {
      return redirect()->back()->with('error', 'ID Buku tidak valid');
    }

    $model = new Transactions();
    $model->insert($data);

    // Redirect to Payment Confirmation page
    return redirect()->route('home.index');
  }

  public function update($id)
  {
    $model = new Transactions();
    $data = [
      'user_id' => $this->request->getVar('user_id'),
      'book_id' => $this->request->getVar('book_id'),
      'total_price' => $this->request->getVar('total_price'),
      'count' => $this->request->getVar('count'),
    ];

    $user = new Users();
    if (!$user->find($data['user_id'])) {
      return redirect()->back()->with('error', 'ID Pengguna tidak valid');
    }

    $book = new Books();
    if (!$book->find($data['book_id'])) {
      return redirect()->back()->with('error', 'ID Buku tidak valid');
    }

    $model->update($id, $data);
  }

  public function delete($id)
  {
    $model = new Transactions();
    $data = $model->find($id);

    if ($data) {
      $model->delete($id);
    } else {
      return redirect()->back()->with('error', 'Transaksi tidak ditemukan');
    }
  }
}
