<?php
class CounselorFeed extends Controller
{

    public function redirect($redirect = "")
    {
        header("Location: " . BASE_URL . "/counselorFeed");
        die();
    }

    public function index()
    {
        $this->requireLogin();
        $data = [
            'title' => 'Counselor Feed',
            'message' => 'Welcome to Aka Hub!'
        ];

        if ($_SESSION["user_role"] != 5) {
            $data["posts"] = $this->model('readModel')->getAllCounselorPosts(1);
        } else {
            $data["posts"] = $this->model('readModel')->getCounselorPosts(1, $_SESSION["user_id"]);
        }

        $data["comments"] = [];
        $data["liked"] = [];

        foreach ($data["posts"] as $post) {

            $commentsForPost = $this->model('readModel')->getPostComments($post['id']);
            $liked = $this->model('readModel')->getPostLikes($post['id'], $_SESSION['user_id']);

            if (!empty($commentsForPost)) {
                // print_r($commentsForPost);
                $data['comments'] = array_merge($data['comments'], $commentsForPost);
            }

            if (!empty($liked)) {
                $data['liked'] = array_merge($data['liked'], $liked);
            }
        }

        // print_r($data["comments"]);
        // $data["user"] = $this->model('readModel')->getOne("user", $_SESSION["user_id"]);
        // $data["comments"] = $this->model('readModel')->getPostComments($post_id);
        // print_r($data["liked"]);

        $this->view->render('counselor/counselorFeed/index', $data);
    }

    public function add_edit($id = 0)
    {
        $this->requireLogin();
        if ((!($_SESSION["user_role"] == 5 || $_SESSION["user_role"] == 1))) {
            $action = "User tried to add edit post without permission";
            $status = "400";
            $this->model("createModel")->createLogEntry($action, $status);
            $this->redirect();
        }
        $data = [
            'title' => ($id == 0) ? 'Create Post' : 'Edit Post',
            'message' => 'Welcome to Aka Hub!'
        ];

        $data["post_template"] = $this->model('readModel')->getEmptyCounselorPost();
        $data["post"] = $data["post_template"]["empty"];
        $data["post_template"] = $data["post_template"]["template"];

        if (isset($_POST['add_edit'])) {
            $values = $_POST["add_edit"];

            $values["posted_by"] = $_SESSION["user_id"];
            $values["post_image"] = $values["post_image"];
            $values["type"] = '1';

            $this->validate_template($values, $data["post_template"]);

            if ($id == 0) {
                $result = $this->model('createModel')->insert_db("posts", $values, $data["post_template"]);
                if ($result) {
                    $action  = "Post created by counselor";
                    $status = "201";
                    $this->model("createModel")->createLogEntry($action, $status);
                }
            } else {
                $result = $this->model('updateModel')->update_one("posts", $values, $data["post_template"], "id", $id, "i");
                if ($result) {
                    $action  = "Post updated by counselor";
                    $status = "200";
                    $this->model("createModel")->createLogEntry($action, $status);
                }
            }
            if ($result) {
                die(json_encode(array("status" => "200", "desc" => "Operation successful")));
            } else {
                die(json_encode(array("status" => "400", "desc" => "Something went wrong")));
            }
        }

        $data["id"] = $id;
        // $data["action"] = $action;

        if ($id != 0) {
            $data["post"] = $this->model('readModel')->getOne("posts", $id);
            if (!$data["post"])
                $this->redirect();
        }

        $this->view->render('counselor/counselorFeed/add_edit', $data);


        // getEmptyCounselorPost
    }

    public function delete($id = 0)
    {

        $this->requireLogin();
        if ((!($_SESSION["user_role"] == 5 || $_SESSION["user_role"] == 1))){
            $action = "User tried to delete post without permission";
            $status = "400";
            $this->model("createModel")->createLogEntry($action, $status);
            $this->redirect();
        }
        if ($id == 0)
            die(json_encode(array("status" => "400", "desc" => "Invalid post id")));

        // $result = $this->model('deleteModel')->deleteOne("courses", $id);
        $result = $this->model('deleteModel')->deleteOne("posts", $id);

        if ($result){
            $action = "Post deleted";
            $status = "200";
            $this->model("createModel")->createLogEntry($action, $status);
            die(json_encode(array("status" => "200", "desc" => "Operation successful")));
        }
        die(json_encode(array("status" => "400", "desc" => "Error while deleting post")));
    }

    public function like($id = 0)
    {

        $this->requireLogin();
        // if ($_SESSION["user_role"] != 5)
        //     $this->redirect();
        $data["likes_template"] = $this->model('readModel')->getEmptyPostLikes();
        $data["likes"] = $data["likes_template"]["empty"];
        $data["likes_template"] = $data["likes_template"]["template"];
        // print_r($data["likes_template"]);
        // if ( isset($_POST['like'])) {

        // $values = $_POST["like"];
        // print_r($values);

        $values["user_id"] = $_SESSION["user_id"];
        $values["post_id"] = $id;

        $existingLike = $this->model('readModel')->getPostLikes($id, $_SESSION["user_id"]);

        if ($existingLike) {
            $action = "User tried to like post multiple times";
            $status = "400";
            $this->model("createModel")->createLogEntry($action, $status);
            die(json_encode(array("status" => "400", "desc" => "You have already liked this post")));
        }

        $this->validate_template($values, $data["likes_template"]);

        $result = $this->model('createModel')->insert_db("post_likes", $values, $data["likes_template"]);

        if ($result){
            $action = "Post liked";
            $status = "200";
            $this->model("createModel")->createLogEntry($action, $status);
            die(json_encode(array("status" => "200", "desc" => "Liked")));
        }
        die(json_encode(array("status" => "400", "desc" => "Something went wrong")));
        // }

    }

    public function postComment($post_id, $comment)
    {
        $this->requireLogin();

        $data["comment_template"] = $this->model('readModel')->getEmptyPostComments();
        $data["commentContent"] = $data["comment_template"]["empty"];
        $data["comment_template"] = $data["comment_template"]["template"];

        $comment = str_replace('%20', ' ', $comment);

        $values['post_id'] = $post_id;
        $values['user_id'] = $_SESSION["user_id"];
        $values['comment'] = $comment;

        // print_r($comment);

        $result = $this->model('createModel')->insert_db("post_comments", $values, $data["comment_template"]);

        if ($result){
            $action = "Comment posted";
            $status = "201";
            $this->model("createModel")->createLogEntry($action, $status);
            die(json_encode(array("status" => "200", "desc" => "Comment Posted")));
        }else {
            die(json_encode(array("status" => "400", "desc" => "Failed to post the comment")));
        }
    }

    public function deleteComment($id = 0)
    {

        $this->requireLogin();
        // if ($_SESSION["user_role"] != 1)
        //     $this->redirect();

        if ($id == 0)
            die(json_encode(array("status" => "400", "desc" => "Invalid comment id")));

        // $result = $this->model('deleteModel')->deleteOne("courses", $id);
        $result = $this->model('deleteModel')->deleteOne("post_comments", $id);
        // print_r($result);

        if ($result){
            $action = "Comment deleted";
            $status = "200";
            $this->model("createModel")->createLogEntry($action, $status);
            die(json_encode(array("status" => "200", "desc" => "Operation successful")));
        }
        die(json_encode(array("status" => "400", "desc" => "Error while deleting the comment")));
    }

    public function postView($id)
    {

        $this->requireLogin();

        $data = [
            'title' => 'Counselor Feed',
            'message' => 'Welcome to Aka Hub!'
        ];

        if ($id == 0)
            die(json_encode(array("status" => "400", "desc" => "Invalid post id")));

        $data["postDetails"] = $this->model('readModel')->getOnePost($id);
        $data["liked"] = $this->model('readModel')->getPostLikes($id, $_SESSION['user_id']);
        // print_r($data["postDetails"]);

        $this->view->render('counselor/counselorFeed/postView', $data);
    }
}
