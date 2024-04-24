<?php
class ViewLogs extends Controller{
    public function index()
    {
        $this->requireLogin();
        if ($_SESSION["user_role"] != 1 || $_SESSION["user_role"] != 3) {
            $action = "Unauthorized user tried to view Admin Profile and Settings";
            $status = "400";
            $this->model("createModel")->createLogEntry($action, $status);
            $this->redirect();
        }
        $data = [
            'title' => 'ViewLogs',
            'message' => 'Welcome to Aka Hub!'
        ];

        $this->view->render('admin/viewLogs/index', $data);
    }
}