<?php
class ApproveTeachingStudents extends Controller
{
    public function index()
    {
        $this->requireLogin();
        if ($_SESSION["student_rep"] != 1) {
            $action = "Unauthorized user tried to view Approve Teaching Students page";
            $status = "401";
            $this->model("createModel")->createLogEntry($action, $status);
            $this->redirect();
        }
        $data = [
            'title' => 'Teaching Student Approvals',
            'message' => 'Welcome to Aka Hub!'
        ];
        $data["approveRequests"] = $this->model('readModel')->getTeachingStudentsToApprove();
        $this->view->render('studentRep/approveTeachingStudents/index', $data);
    }

    public function previewRepresentative($id)
    {
        $this->requireLogin();
        if ($_SESSION["student_rep"] != 1) {
            $action = "Unauthorized user tried to preview Representatives page";
            $status = "401";
            $this->model("createModel")->createLogEntry($action, $status);
            $this->redirect();
        }
        $data = [
            'title' => 'Teaching Student Approvals',
            'message' => 'Welcome to Aka Hub!',
        ];
        $data["previewRepresentative"] = $this->model('readModel')->getPreviewRepresentative($id);
        $this->view->render('studentRep/approveTeachingStudents/previewRepresentatives', $data);
    }

    public function acceptRole($id, $role)
    {
        $this->requireLogin();
        if ($_SESSION["student_rep"] != 1) {
            $action = "Unauthorized user tried to accept teaching student Role";
            $status = "401";
            $this->model("createModel")->createLogEntry($action, $status);
            $this->redirect();
        }
        $result = $this->model('updateModel')->to_get_role(
            "user",
            $role,
            $id,
            1
        );
        if ($result) {
            $action = "Teaching Student Role accepted";
            $status = "200";
            $this->model("createModel")->createLogEntry($action, $status);
            die(json_encode(array("status" => "200", "desc" => "Accepting Successfull")));
        } else {
            die(json_encode(array("status" => "400", "desc" => "Accepting Unsuccessfull")));
        }
    }
    public function declineRole($id = 0, $role = 0)
    {
        $this->requireLogin();
        if ($_SESSION["student_rep"] != 1) {
            $action = "Unauthorized user tried to decline teaching student Role";
            $status = "401";
            $this->model("createModel")->createLogEntry($action, $status);
            $this->redirect();
        }
        $result = $this->model('updateModel')->to_get_role(
            "user",
            $role,
            $id,
            0
        );
        if ($result) {
            $action = "Teaching Student Role declined";
            $status = "200";
            $this->model("createModel")->createLogEntry($action, $status);
            die(json_encode(array("status" => "200", "desc" => "Denying Successfull")));
        } else {
            die(json_encode(array("status" => "400", "desc" => "Denying unsuccessfull")));
        }
    }

    public function studentRepAccessControlView()
    {
        $this->requireLogin();
        if ($_SESSION["student_rep"] != 1) {
            $action = "Unauthorized user tried to view Student Rep Access Control page";
            $status = "401";
            $this->model("createModel")->createLogEntry($action, $status);
            $this->redirect();
        }
        $data = [
            'title' => 'Admin Access Control',
            'message' => 'Welcome to Aka Hub!'
        ];
        $data["accessUsers"] = $this->model('readModel')->getTeachingStudentsToLimitAccess();
        // print_r($data["accessUsers"]);
        $this->view->render('studentRep/approveTeachingStudents/studentRepAccessControl', $data);
    }

    public function removeAccess($id = 0, $role = 0)
    {
        $this->requireLogin();
        if ($_SESSION["student_rep"] != 1) {
            $action = "Unauthorized user tried to remove access";
            $status = "401";
            $this->model("createModel")->createLogEntry($action, $status);
            $this->redirect();
        }
        $result1 = $this->model('updateModel')->to_get_role(
            "user",
            $role,
            $id,
            0
        );

        if ($result1) {
            $action = "Student Rep successfully removed access";
            $status = "200";
            $this->model("createModel")->createLogEntry($action, $status);
            die(json_encode(array("status" => "200", "desc" => "Denying Successfull")));
        } else {
            die(json_encode(array("status" => "400", "desc" => "Denying unsuccessfull")));
        }
    }
}
