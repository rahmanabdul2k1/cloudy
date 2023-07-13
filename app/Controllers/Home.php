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
                'name' => 'required',
                'phone' => 'required|numeric|min_length[10]|max_length[10]',
                'email' => 'required|valid_email',
                'address' => 'required',
                'state' => 'required|alpha_space',
                'city' => 'required|alpha_space',
            ];
            if ($this->validate($rules)) {
                $data = [
                    'name' => $this->request->getVar('name'),
                    'phone' => $this->request->getVar('phone'),
                    'email' => $this->request->getVar('email'),
                    'address' => $this->request->getVar('address'),
                    'state' => $this->request->getVar('state'),
                    'city' => $this->request->getVar('city'),
                ];
                $user->update($id, $data);
                return redirect("/");
            } else {
                $data['user'] = $user->find($id);
                $data['validation'] = $this->validator;
                return view('edit', $data);
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
