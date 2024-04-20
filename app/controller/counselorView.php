<?php

class CounselorView extends Controller
{
    public function index($id = 0)
    {
        $this->requireLogin();
        // if ($_SESSION["user_role"] != 1)
        //     $this->redirect();

        $data = [
            'title' => 'Counselor Details',
            'message' => 'Welcome to Aka Hub!'
        ];


        // if (!$data["counselor"])
        //     $this->redirect();
        $data["counselor"] = $this->model('readModel')->getOneCounselor($id);
        $data["posts"] = $this->model('readModel')->getCounselorPosts(1,$id);
        $this->view->render('student/counselor/view', $data);
    }
}