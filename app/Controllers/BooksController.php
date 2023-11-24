<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Books;
use App\Models\Users;
use Faker\Provider\Uuid;

class BooksController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $model = new Books();
        $data['books'] = $model->findAll();
        // $response = [
        //     'status'   => 200,
        //     'error'    => null,
        //     'messages' => 'Data Found',
        //     'data' => $data
        // ];

        // return $this->respond($response);
        return view('welcome_message', $data);
    }

    public function show($id)
    {
        $model = new Books();
        $data['book'] = $model->where('id', $id)->first();
        // $response = [
        //     'status'   => 200,
        //     'error'    => null,
        //     'messages' => 'Data Found',
        //     'data' => $data
        // ];

        // return $this->respond($response);
        return view('book/detail', $data);
    }

    public function create()
    {
        $data = [
            'id' => Uuid::uuid(),
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price'),
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'genre' => $this->request->getVar('genre'),
            'cover' => $this->request->getVar('cover'),
        ];

        $model = new Books();
        $model->insert($data);

        // $response = [
        //     'status'   => 201,
        //     'error'    => null,
        //     'messages' => 'Data Saved',
        //     'data' => $data
        // ];

        // return $this->respondCreated($response);

    }

    public function update($id)
    {
        $model = new Books();
        $data = [
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price'),
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'genre' => $this->request->getVar('genre'),
            'cover' => $this->request->getVar('cover'),
        ];

        $model->update($id, $data);

        // $response = [
        //     'status'   => 200,
        //     'error'    => null,
        //     'messages' => 'Data Updated',
        //     'data' => $data
        // ];

        // return $this->respond($response);
    }

    public function delete($id)
    {
        $model = new Books();
        $data = $model->find($id);

        if ($data) {
            $model->delete($id);
            // $response = [
            //     'status'   => 200,
            //     'error'    => null,
            //     'messages' => 'Data Deleted',
            //     'data' => $data
            // ];

            // return $this->respondDeleted($response);
        } else {
            // $response = [
            //     'status'   => 404,
            //     'error'    => null,
            //     'messages' => 'No Data Found',
            //     'data' => $data
            // ];

            // return $this->respondDeleted($response);
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }
    }
}
