<?php
class ElectionsAndPolls extends Controller{
    public function index()
    {
        $data = [
            'title' => 'Elections and Polls',
            'message' => 'Welcome to Aka Hub!'
        ];

        $this->view->render('electionsAndPolls/index', $data);
    }

    public function test(){
        $data = [
            'title' => 'Elections and Polls',
            'message' => 'Welcome to Aka Hub!'
        ];

        $this->view->render('electionsAndPolls/test', $data);
    }

}