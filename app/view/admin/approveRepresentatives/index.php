<?php
$HTMLHead = new HTMLHead($data['title']);
// $header = new header();
$sidebar = new Sidebar("approveRepresentatives");
?>

<div id="sidebar-active" class="hideScrollbar">
    <?php $welcomeSearch = new WelcomeSearch(); ?>


    <div class="main-grid flex">
        <div class="left">
            <div class="approveDivContainor">
                <div class="containorForcardArea">
                    <div class="tableContainor">
                        <div class="cardContainor">
                            <h3 class="h3-RepApprove">Representatives Approving Area</h3>
                            <div class="searchBarContainor">
                                <label>Search</label>
                                <div class="searchBar">
                                    <input class="searchText" type="text" name="search" id="search">
                                </div>
                            </div>
                            <div class="div-tableHeader">
                                <div id="nameHeader" class="tableHeaderItem">
                                    Student Name
                                </div>
                                <div id="mailHeader" class="tableHeaderItem">
                                    University Email
                                </div>
                                <div id="indexNumberHeader" class="tableHeaderItem">
                                    Reg Number
                                </div>
                                <div id="repTypeHeader" class="tableHeaderItem">
                                    Rep Type
                                </div>
                                <div id="actionHeader" class="tableHeaderItem">
                                    Action to Perform
                                </div>
                            </div>
                            <div class="scrollableContainer">
                                <?php

                                if (is_array($data["approveRequests"])) {
                                    foreach ($data["approveRequests"] as $card) {
                                        if ($card['student_rep'] == 2 && $card['club_rep'] == 2) {
                                ?>
                                            <div class="approve-card">
                                                <div class="approve-card-div">
                                                    <div id="repName">
                                                        <?php echo isset($card['name']) ? $card['name'] : ''; ?>
                                                    </div>
                                                    <div id="repMail">
                                                        <?php echo isset($card['email']) ? $card['email'] : ''; ?>
                                                    </div>
                                                    <div id="repIndex">
                                                        <?php echo isset($card['student_id']) ? $card['student_id'] : ''; ?>
                                                    </div>
                                                    <div id="repType">
                                                        <?php
                                                        echo 'Student Rep';
                                                        ?>
                                                    </div>
                                                    <div class="repAccept">
                                                        <a href="<?php echo BASE_URL; ?>/approveRepresentatives/acceptRole/<?php echo urlencode($card['id']); ?>/student_rep" class="repAcceptButon" data-role="representativeAccept">
                                                            <div class="acceptButton">Accept</div>
                                                        </a>
                                                    </div>
                                                    <div class="repDecline">
                                                        <a href="<?php echo BASE_URL; ?>/approveRepresentatives/declineRole/<?php echo urlencode($card['id']); ?>/student_rep" class="repAcceptButon" data-role="representativeAccept">
                                                            <div class="declineButton">Decline</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="approve-card">
                                                <div class="approve-card-div">
                                                    <div id="repName">
                                                        <?php echo isset($card['name']) ? $card['name'] : ''; ?>
                                                    </div>
                                                    <div id="repMail">
                                                        <?php echo isset($card['email']) ? $card['email'] : ''; ?>
                                                    </div>
                                                    <div id="repIndex">
                                                        <?php echo isset($card['student_id']) ? $card['student_id'] : ''; ?>
                                                    </div>
                                                    <div id="repType">
                                                        <?php
                                                        echo 'Club Rep';
                                                        ?>
                                                    </div>
                                                    <div class="repAccept">
                                                        <a href="<?php echo BASE_URL; ?>/approveRepresentatives/acceptRole/<?php echo urlencode($card['id']); ?>/club_rep" class="repAcceptButon" data-role="representativeAccept">
                                                            <div class="acceptButton">Accept</div>
                                                        </a>
                                                    </div>
                                                    <div class="repDecline">
                                                        <a href="<?php echo BASE_URL; ?>/approveRepresentatives/declineRole/<?php echo urlencode($card['id']); ?>/club_rep" class="repAcceptButon" data-role="representativeAccept">
                                                            <div class="declineButton">Decline</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="approve-card">
                                                <div class="approve-card-div">
                                                    <div id="repName">
                                                        <?php echo isset($card['name']) ? $card['name'] : ''; ?>
                                                    </div>
                                                    <div id="repMail">
                                                        <?php echo isset($card['email']) ? $card['email'] : ''; ?>
                                                    </div>
                                                    <div id="repIndex">
                                                        <?php echo isset($card['student_id']) ? $card['student_id'] : ''; ?>
                                                    </div>
                                                    <div id="repType">
                                                        <?php
                                                        if (isset($card['student_rep']) && $card['student_rep'] == 2) {
                                                            echo 'Student Rep';
                                                        } else if (isset($card['club_rep']) && $card['club_rep'] == 2) {
                                                            echo 'Club Rep';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="repAccept">
                                                        <?php
                                                        if (isset($card['student_rep']) && $card['student_rep'] == 2) {
                                                            echo '<a href="' . BASE_URL . '/approveRepresentatives/acceptRole/' . urlencode($card['id']) . '/student_rep" class="repAcceptButon" data-role="representativeAccept">';
                                                            echo '<div class="acceptButton">Accept</div>';
                                                            echo '</a>';
                                                        } elseif (isset($card['club_rep']) && $card['club_rep'] == 2) {
                                                            echo '<a href="' . BASE_URL . '/approveRepresentatives/acceptRole/' . urlencode($card['id']) . '/club_rep" class="repAcceptButon" data-role="representativeAccept">';
                                                            echo '<div class="acceptButton">Accept</div>';
                                                            echo '</a>';
                                                        } else {
                                                            echo '<a href="' . BASE_URL . '/approveRepresentatives/acceptStudentRep" class="repAcceptButon" data-role="representativeAccept">';
                                                            echo '<div class="acceptButton">Accept</div>';
                                                            echo '</a>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="repDecline">
                                                        <?php
                                                        if (isset($card['student_rep']) && $card['student_rep'] == 2) {
                                                            echo '<a href="' . BASE_URL . '/approveRepresentatives/declineRole/' . urlencode($card['id']) . '/student_rep" class="repAcceptButon" data-role="representativeAccept">';
                                                            echo '<div class="declineButton">Decline</div>';
                                                            echo '</a>';
                                                        } elseif (isset($card['club_rep']) && $card['club_rep'] == 2) {
                                                            echo '<a href="' . BASE_URL . '/approveRepresentatives/declineRole/' . urlencode($card['id']) . '/club_rep" class="repAcceptButon" data-role="representativeAccept">';
                                                            echo '<div class="declineButton">Decline</div>';
                                                            echo '</a>';
                                                        } else {
                                                            echo '<a href="' . BASE_URL . '/approveRepresentatives/acceptStudentRep" class="repAcceptButon" data-role="representativeAccept">';
                                                            echo '<div class="declineButton">Decline</div>';
                                                            echo '</a>';
                                                        }
                                                        ?>
                                                    </div>

                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="right">
            
        </div> -->
    </div>

    <style>
        .approveDivContainor {
            width: 100%;
            height: 100vh;
        }

        .approveDivContainor h3 {
            text-align: center;
        }

        .main-grid {}

        .main-grid .left {
            width: 100% !important;
            height: 1350px;
            padding: 0 150px 0 150px;
        }

        .scrollableContainer {
            height: 430px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .h3-RepApprove {
            text-align: center;
            margin-bottom: 20px;
            width: 100%;
        }

        #nameHeader {
            width: 18%;
            height: 65px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #mailHeader {
            width: 25%;
            height: 65px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #indexNumberHeader {
            width: 25%;
            height: 65px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #repTypeHeader {
            width: 18%;
            height: 65px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #actionHeader {
            width: 30%;
            height: 65px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tableContainor {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .searchText {
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            border-radius: 10px;
            padding: 1rem 1.25rem;
            font-size: 0.6rem;
            font-weight: 500;
            background-color: #f1f1f1;
        }

        .searchBar {
            height: 30px;
            margin-left: 5px;
        }

        .searchBarContainor {
            width: 100%;
            height: 30px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 15px;
            padding-right: 95px;
        }

        .div-tableHeader {
            width: 100%;
            height: 65px;
            background-color: #2684FF;
            opacity: 1;
            display: flex;
        }

        .cardContainor {
            width: 100%;
            height: 100%;
            /* padding-left: 100px; */
            justify-content: center;
            align-items: center;
        }

        .containorForcardArea {
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        .notificationContainor h3 {
            text-align: center;
            width: 92%;
        }

        #repName {
            width: 16%;
            height: 20%;
        }

        #repMail {
            width: 25%;
            height: 20%;
        }

        #repIndex {
            width: 25%;
            height: 20%;
        }

        #repType {
            width: 20%;
            height: 20%;
        }

        .repAccept {
            width: 15%;
            height: 65px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .repAccept a {
            text-decoration: none;
            color: black;
            border: 1px solid #2684FF;
            width: 65%;
            height: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 0px 5px 0px #2684FF;
            border-radius: 5px;
        }

        .repAccept a:hover {
            background-color: #2684FF;
            color: white;
            cursor: pointer;
        }

        .repDecline {
            width: 15%;
            height: 38px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .repDecline a {
            text-decoration: none;
            color: black;
            border: 1px solid #ff9b2d;
            width: 65%;
            height: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 0px 5px 0px #ff9b2d;
            border-radius: 5px;
        }

        .repDecline a:hover {
            background-color: #ff9b2d;
            color: white;
            cursor: pointer;
        }

        .acceptIcon {
            width: 65px;
            height: 65px;
        }

        .declineIcon {
            width: 35px;
            height: 35px;
        }

        .acceptIcon:hover {
            width: 67px;
            height: 67px;
            cursor: pointer;
        }

        .declineIcon:hover {
            width: 37px;
            height: 37px;
            cursor: pointer;
        }

        .approve-card {
            background-color: white;
            width: 100%;
            height: 55px;
            justify-content: space-between;
            align-items: center;
            margin: 0px 0 0 3px;
            display: flex;
        }

        .approve-card-div {
            text-align: center;
            align-items: center;
            display: flex;
            width: 100%;
        }

        /* .main-grid .right{
            flex-grow: 1;
            height: 1000px;
        } */
    </style>
    <script>
        $(document).ready(function() {
            $(document).on("click", ".repAcceptButon", function(event) {
                event.preventDefault();
                let role = $(this).data("role");
                let action = $(this).attr("href").includes("accept") ? "accepted" : "declined";

                $.ajax({
                    url: $(this).attr("href"),
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {
                        if (response['status'] == 200) {
                            alertUser("success", `Representative ${action} successfully.`);
                        } else {
                            alertUser("warning", response['desc']);
                        }
                    },
                    error: function(ajaxContext) {
                        alertUser("danger", "Something Went Wrong");
                    }
                });
            });
        });
    </script>
</div>