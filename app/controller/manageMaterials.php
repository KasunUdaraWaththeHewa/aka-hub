<?php
class ManageMaterials extends Controller{
    public function index()
    {
        $data = [
            'title' => 'Manage Materials',
            'message' => 'Welcome to Aka Hub!'
        ];

        $this->view->render('studentRep/manageMaterials/index', $data);
    }

}