<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\DependentModel;


class Main extends BaseController
{

    protected $studentModel;
    protected $dependentModel;

    protected $helpers = ['form'];

    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->dependentModel = new DependentModel();
    }

    public function index()
    {

        $data = [
            'title' => 'List',
            'student' => $this->studentModel->findAll(),
            'dependent' => $this->dependentModel->findAll()

        ];
        return view('main/index', $data);
    }

    public function detail($id = true)
    {
        $student =  $this->studentModel->where(['id' => $id])->first();
        $dependent = $this->dependentModel->find($student['dependent_data']);
        $data = [
            'title' => 'Detail',
            'student' => $student,
            'dependent' => $dependent['name']

        ];

        return view('main/detail', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Add a new Data',
            'student' => $this->studentModel->findAll(),
            'dependent' => $this->dependentModel->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('main/create', $data);
    }

    public function save()
    {

        $rules = [
            'student_id' => 'required|numeric',
            'name'    => 'required',
            'dependent_data' => 'required|min_length[6]',
            'gender' => 'required',
            'place_birth' => 'required',
            'date_birth' => 'required',
            'address' => 'required',
            'no_telp' => 'required|numeric',
        ];

        if (!$this->validate(
            $rules
        )) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        };


        $dependent = $this->request->getVar('dependent_data');
        $this->studentModel->save([
            'student_id' => $this->request->getVar('student_id'),
            'name' => $this->request->getVar('name'),
            'dependent_data' => $dependent,
            'gender' => $this->request->getVar('gender'),
            'place_birth' => $this->request->getVar('place_birth'),
            'date_birth' => $this->request->getVar('date_birth'),
            'address' => $this->request->getVar('address'),
            'no_telp' => $this->request->getVar('no_telp'),

        ]);


        session()->setFlashdata('msg', 'Data has been saved.');

        return redirect()->to('/main');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit',
            'student' => $this->studentModel->where(['id' => $id])->first(),
            'dependent' => $this->dependentModel->findAll()
        ];

        return view('main/edit', $data);
    }

    public function update($id)
    {
        $dependent = $this->request->getVar('dependent_data');

        $this->studentModel->save([
            'id' => $id,
            'student_id' => $this->request->getVar('student_id'),
            'name' => $this->request->getVar('name'),
            'dependent_data' => $dependent,
            'gender' => $this->request->getVar('gender'),
            'place_birth' => $this->request->getVar('place_birth'),
            'date_birth' => $this->request->getVar('date_birth'),
            'address' => $this->request->getVar('address'),
            'no_telp' => $this->request->getVar('no_telp'),
        ]);

        session()->setFlashdata('msg', 'Data has been updated.');

        return redirect()->to('/main');
    }



    public function delete($id)
    {
        $this->studentModel->delete($id);

        session()->setFlashdata('delete', 'Data has been deleted.');
        return redirect()->to('/main');
    }
}
