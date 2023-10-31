<?php

class Dashboard extends Controller
{
    public function index()
    {
        $this->requireLogin();

        $data = [
            'title' => 'Dashboard',
            'message' => 'Welcome to Aka Hub!'
        ];

        $this->view->render('dashboard/index', $data);
    }

    public function test()
    {
        $this->requireLogin();
        $data = [
            'title' => 'Login',
            'message' => 'Welcome to Aka Hub!'
        ];

        $this->view->render('dashboard/index', $data);
    }
}
