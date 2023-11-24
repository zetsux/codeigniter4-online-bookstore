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
        $data = $model->findAll();
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => 'Data Found',
            'data' => $data
        ];

        return $this->respond($response);    
    }

    public function show($id)
    {
        $model = new Books();
        $data = $model->where('id', $id)->first();
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => 'Data Found',
            'data' => $data
        ];

        return $this->respond($response);
    }

    public function create()
    {
        $data = [
            'id' => Uuid::uuid(),
            'user_id' => $this->request->getVar('user_id'),
            'title' => $this->request->getVar('title'),
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $this->request->getVar('cover'),
        ];

        $user = new Users();
        if(!$user->find($data['user_id'])) {
            return $this->fail('error', 404, null);
        }

        $model = new Books();
        $model->insert($data);

        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => 'Data Saved',
            'data' => $data
        ];
        
        return $this->respondCreated($response);
    }

    public function update($id)
    {
        $model = new Books();
        $data = [
            'user_id' => $this->request->getVar('user_id'),
            'title' => $this->request->getVar('title'),
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $this->request->getVar('cover'),
        ];

        $user = new Users();
        if(!$user->find($data['user_id'])) {
            return $this->fail('error', 404, null);
        }

        $model->update($id, $data);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => 'Data Updated',
            'data' => $data
        ];
        
        return $this->respond($response);
    }

    public function delete($id)
    {
        $model = new Books();
        $data = $model->find($id);

        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => 'Data Deleted',
                'data' => $data
            ];
            
            return $this->respondDeleted($response);
        } else {
            $response = [
                'status'   => 404,
                'error'    => null,
                'messages' => 'No Data Found',
                'data' => $data
            ];
            
            return $this->respondDeleted($response);
        }
    }
}
