<?php

class CounselorPanel extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'CounselorPanel',
            'message' => 'Welcome to Aka Hub!'
        ];

        $this->view->render('counselor/counselorpanel/index', $data);
    }
}