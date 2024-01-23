<?php
class Courses extends Controller
{

    public function redirect($redirect = "")
    {
        header("Location: " . BASE_URL . "/courses");
        die();
    }

    public function index()
    {
        $this->requireLogin();

        $data = [
            'title' => 'Courses',
            'message' => 'Welcome to Aka Hub!'
        ];

        $data["teaching_student"] = $_SESSION["teaching_student"];
        $data["courses"] = $this->model('readModel')->getAll("courses");
        $this->view->render('student/courses/index', $data);
    }

    public function view($id = 0)
    {
        $this->requireLogin();

        // if ($id == 0)
        //     $this->redirect();

        $data = [
            'title' => 'Course',
            'message' => 'Welcome to Aka Hub!'
        ];

        $data["teaching_student"] = $_SESSION["teaching_student"];
        $data["id"] = $id;
        $data["course"] = $this->model('readModel')->getOne("courses", $id);
        if (!$data["course"])
            $this->redirect();

        $data["material"] = $this->model('readModel')->getCourseMaterial($id);
        $data["teaching_student"] = $_SESSION["teaching_student"];

        // print_r($data["material"]);

        // $data["course"] = $this->model('readModel')->getOne("courses", $id);
        // if (!$data["course"])
        //     $this->redirect();

        $this->view->render('student/courses/view', $data);
    }

    public function material($action = "add_edit", $course_id = 0, $id = 0)
    {
        $this->requireLogin();
        if ($_SESSION["teaching_student"] != 1)
            $this->redirect();

        if ($course_id == 0)
            $this->redirect();

        $data = [
            'title' => $id == 0 ? 'Add Course Material' : 'Edit Course Material',
            'message' => 'Welcome to Aka Hub!'
        ];

        $data["course"] = $this->model('readModel')->getOne("courses", $course_id);
        if (!$data["course"])
            $this->redirect();

        $data["data_template"] = $this->model('readModel')->getEmptyCourseMaterial();
        $data["material"] = $data["data_template"]["empty"];
        $data["data_template"] = $data["data_template"]["template"];

        if (isset($_POST['add_edit'])) {
            $values = $_POST["add_edit"];

            $values["course_id"] = $course_id;
            $values["user_id"] = $_SESSION["user_id"];
            // $values["reference_links"] = json_encode($values["reference_links"]);
            if (isset($values["kuppi_video"]))
                $values["video_links"] = json_encode($values["kuppi_video"]);
            if (isset($values["course_materials"]))
                $values["short_notes"] = json_encode($values["course_materials"]);

            $this->validate_template($values, $data["data_template"]);

            if ($id == 0)
                $result = $this->model('createModel')->insert_db("course_materials", $values, $data["data_template"]);
            else
                $result = $this->model('updateModel')->update_one("course_materials", $values, $data["data_template"], "id", $id, "i");

            if ($result)
                die(json_encode(array("status" => "200", "desc" => "Operation successful")));

            die(json_encode(array("status" => "400", "desc" => "Error while " . $action . "ing course")));
        }

        if ($id != 0) {
            $data["material"] = $this->model('readModel')->getOne("course_materials", $id);
            if (!$data["material"])
                $this->redirect();
        }

        // print_r($data["material"]);

        $data["id"] = $id;
        $data["action"] = $action;

        $data["teaching_student"] = $_SESSION["teaching_student"];
        $this->view->render('student/courses/add_edit_material', $data);
    }

    // delete material
    public function delete_material($id = 0)
    {
        $this->requireLogin();
        if ($_SESSION["teaching_student"] != 1)
            $this->redirect();

        if ($id == 0)
            die(json_encode(array("status" => "400", "desc" => "Please provide a valid course material id")));

        $result = $this->model('deleteModel')->deleteOne("course_materials", $id);
        if ($result)
            die(json_encode(array("status" => "200", "desc" => "Operation successful")));

        die(json_encode(array("status" => "400", "desc" => "Error while deleting course material")));
    }

    public function add_edit($id = 0, $action = "create")
    {
        $this->requireLogin();
        if ($_SESSION["teaching_student"] != 1)
            $this->redirect();

        $data = [
            'title' => ($action == "create") ? 'Create Course' : 'Edit Course',
            'message' => 'Welcome to Aka Hub!'
        ];

        $data["course_template"] = $this->model('readModel')->getEmptyCourse();
        $data["course"] = $data["course_template"]["empty"];
        $data["course_template"] = $data["course_template"]["template"];

        if (isset($_POST['add_edit'])) {
            $values = $_POST["add_edit"];
            $this->validate_template($values, $data["course_template"]);

            if ($id == 0)
                $result = $this->model('createModel')->insert_db("courses", $values, $data["course_template"]);
            else
                $result = $this->model('updateModel')->update_one("courses", $values, $data["course_template"], "id", $id, "i");

            if ($result)
                die(json_encode(array("status" => "200", "desc" => "Operation successful")));

            die(json_encode(array("status" => "400", "desc" => "Error while " . $action . "ing course")));
        }

        $data["id"] = $id;
        $data["action"] = $action;

        if ($id != 0) {
            $data["course"] = $this->model('readModel')->getOne("courses", $id);
            if (!$data["course"])
                $this->redirect();
        }

        // print params
        // print_r($id);
        // print_r($action);

        $this->view->render('student/courses/add_edit', $data);
    }

    public function delete($id = 0)
    {

        $this->requireLogin();
        if ($_SESSION["teaching_student"] != 1)
            $this->redirect();

        if ($id == 0)
            die(json_encode(array("status" => "400", "desc" => "Please provide a valid course id")));

        $result = $this->model('deleteModel')->deleteOne("courses", $id);
        if ($result)
            die(json_encode(array("status" => "200", "desc" => "Operation successful")));

        die(json_encode(array("status" => "400", "desc" => "Error while deleting course")));
    }

    public function clickToBeRole($role)
    {
        $this->requireLogin();
        if ($_SESSION["$role"] == 1) {
            die(json_encode(array("status" => "400", "desc" => "You are already a $role")));
        } else if ($_SESSION["$role"] == 2) {
            die(json_encode(array("status" => "400", "desc" => "You are already requested to be a $role")));
        } else if ($_SESSION["$role"] == 0) {

            $result = $this->model('updateModel')->to_get_role(
                "user",
                $role,
                $_SESSION["user_id"],
                2
            );
            if ($result)
                die(json_encode(array("status" => "200", "desc" => "Successfully requested to be a $role")));
            else {
                die(json_encode(array("status" => "400", "desc" => "Requested to be a $role is unsuccessfull")));
            }
        }
    }
}
