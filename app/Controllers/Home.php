<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $details['page_title'] = 'Users';
        if ($this->request->is('get')) {
            $details['users'] = $user->findAll();
            return view('index', $details);
        } else if ($this->request->is('post')) {
            $data = [
                'name' => $this->request->getVar('name'),
                'phone' => $this->request->getVar('phone'),
                'email' => $this->request->getVar('email'),
                'address' => $this->request->getVar('address'),
                'state' => $this->request->getVar('state'),
                'city' => $this->request->getVar('city'),
            ];
            $output = new \stdClass();
            if ($user->insert($data)) {
                $output->status = 200;
                $output->users = $user->findAll();
                echo json_encode($output);
            } else {
                $output->status = 400;
                $output->users = $user->findAll();
                echo json_encode($output);
            }
        }
    }

    public function edit($id)
    {
        $user = new UserModel();
        $data['page_title'] = 'Edit';
        if ($this->request->is('post')) {
            $rules = [
                'unit_name' => 'required|alpha_space',
                'unit_status' => 'numeric',
            ];
            if ($this->validate($rules)) {
                $data = [
                    'unit_name' => $this->request->getVar('unit_name'),
                    'unit_status' => $this->request->getVar('unit_status'),
                ];
                if ($user->update($id, $data)) {
                    session()->setFlashdata('status', 'Data Updated Successfully!');
                    session()->setFlashdata('color', 'alert-success');
                    return redirect('/');
                } else {
                    session()->setFlashdata('status', 'Something Wrong!');
                    session()->setFlashdata('color', 'alert-danger');
                    return redirect('/');
                }
            } else {
                $data['unit'] = $user->find($id);
                $data['validation'] = $this->validator;
                return view('header', $data)
                    . view('edit_unit', $data)
                    . view('footer');
            }
        } else {
            $data['user'] = $user->find($id);
            return view('edit', $data);
        }
    }

    public function delete()
    {
        $output = new \stdClass();
        $user = new UserModel();
        $id = $this->request->getVar('id');
        if ($user->delete($id)) {
            $output->status = 200;
            $output->users = $user->findAll();
            echo json_encode($output);
        } else {
            $output->status = 400;
            $output->users = $user->findAll();
            echo json_encode($output);
        }
    }
}
