<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use CodeIgniter\Files\File;

class EmployeeController extends BaseController
{
    public function index()
    {
        $model = new EmployeeModel();
        $data['employees'] = $model->findAll();
        return view('employee/index', $data);
    }

    public function create()
    {
        return view('employee/create');
    }

    public function store()
    {
        $model = new EmployeeModel();
        $file = $this->request->getFile('photo');

        // Validasi file foto
        if ($file->isValid() && !$file->hasMoved() && in_array($file->getExtension(), ['jpg', 'jpeg']) && $file->getSize() <= 300 * 1024) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName); // Pindahkan file ke public/uploads
            $photoPath = $newName; // Simpan nama file saja
        } else {
            return redirect()->back()->with('error', 'Invalid photo file. Ensure it is JPG/JPEG and less than 300KB.');
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'photo' => $photoPath,
        ];

        $model->save($data);
        return redirect()->to('/employees');
    }

    public function edit($id)
    {
        $model = new EmployeeModel();
        $data['employee'] = $model->find($id);
        return view('employee/edit', $data);
    }

    public function update($id)
    {
        $model = new EmployeeModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        $file = $this->request->getFile('photo');
        if ($file->isValid() && !$file->hasMoved() && in_array($file->getExtension(), ['jpg', 'jpeg']) && $file->getSize() <= 300 * 1024) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName); // Pindahkan file ke public/uploads
            $data['photo'] = $newName; // Simpan nama file saja
        }

        $model->update($id, $data);
        return redirect()->to('/employees');
    }

    public function delete($id)
    {
        $model = new EmployeeModel();
        $model->delete($id);
        return redirect()->to('/employees');
    }
}
