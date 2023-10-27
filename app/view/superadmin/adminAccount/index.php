<?php
$HTMLHead = new HTMLHead($data['title']);
// $header = new header();
$sidebar = new Sidebar();
?>

<div id="sidebar-active">

    <div class="welcome-back">
        <div class="flex flex_container">
            <div class="flex_item">
                <div class="title pb-0-5">Welcome back</div>
                <div class="text-muted">Hi Saliya Bandara</div>
            </div>
            <div class="flex_item search_flex">
                <form class="flex w-100" action="" method="get">
                    <button class="btn" type="submit">
                        <i class='bx bx-search'></i>
                    </button>
                    <input class="form-group" type="text" name="q" id="" placeholder="Search" />
                </form>
            </div>
            <div class="flex_item">
                <div class="title">Notifications</div>
                <div class="text-muted">Hi Saliya Bandara</div>
            </div>
        </div>
    </div>

    <style>
        .welcome-back {
            width: 100%;
            padding: 0.5rem 1rem;
        }

        .welcome-back .flex_container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
        }

        .welcome-back .flex_item {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .welcome-back .flex_item.search_flex {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: 50%;
        }

        .welcome-back .flex_item.search_flex button {
            /* width: 20%; */
            padding: 1rem 1.25rem;
            padding-right: 0;
            margin: 0;

            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f5f5f5;
            border-radius: 10px 0 0 10px;
        }

        .welcome-back .flex_item.search_flex .form-group {
            width: 80%;
            /* margin-left: 1rem; */
            border: none;
            border-radius: 0 10px 10px 0;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            font-weight: 500;
            background-color: #f5f5f5;

            outline: none;
        }

        .welcome-back .flex_item .title {
            font-size: 1.5rem;
            font-weight: 600;
        }
    </style>


    <div class="main-grid flex">
        <div class="left">
            <div class="divExistingAdmin">
                <h3>Admin Account</h3>
                <div class="divAdminCards">
                    <div class="adminCardLine">
                        <div class="adminCard">
                            <div class="admin-image-containor">
                                <img src="<?= BASE_URL ?>/public/assets/img/counselors/Dr.Kasun Karunanayake.jpg" alt="" id = "adminPhoto">
                            </div>
                            <h5>A.H.T.N Thushanthika</h5>
                            <h5>a.h.t.n.thushanthika@gmail.com</h5>
                            <p>Senior Lecturer in Computer Science; Researcher in Extended Reality, Human Computer Interaction, User Experience Design, Haptics, Virtual Taste & Smell, and Magnetic User Interfaces</p>
                            <div class="edit-delete-containor">
                                <div class="iconContainor">
                                    <img src="<?= BASE_URL ?>/public/assets/img/icons/edit.png" alt="">
                                </div>
                                <div class="iconContainor">
                                    <img src="<?= BASE_URL ?>/public/assets/img/icons/rejected.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="buttonDivToAddAdmin">
                        <div class="gotoAddAdmin">
                            <div>
                                <a href="<?= BASE_URL ?>/addAdmin/index"  class="mwb-form-submit-btn">Create Account</a>
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
        .main-grid {}

        .mwb-form-submit-btn {
            background-color: #2684FF;
            border-radius: 4px;
            border: none;
            color: #ffffff;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            min-width: 200px;
            padding: 16px 10px;
        }
        .mwb-form-submit-btn :hover{
            background-color: white;
            border-radius: 4px;
            border: none;
            color: black;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            min-width: 200px;
            padding: 16px 10px;
        }
        .buttonDivToAddAdmin {
            width: 100%;
            height: 500px;
            display: flex;
            justify-content: right;
            margin-top: 50px;
            padding: 0 100px 20px 0;
        }

        .gotoAddAdmin {
            width: 120px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .gotoAddAdmin a {
            text-decoration: none;
        }

        .iconContainor {
            width: 30px;
            height: 30px;
            margin: 5px;
        }

        .edit-delete-containor {
            width: 100%;
            height: 50px;
            display: flex;
            justify-content: right;
            align-items: center;
            padding-right : 20px;
        }

        .iconContainor img {
            width: 30px;
            height: 30px;
        }

        .iconContainor img:hover {
            cursor: pointer;
        }

        .adminCard {
            width: 28%;
            height: 100%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            margin: 25px;
            padding: 25px;
        }

        .admin-image-containor {
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        #adminPhoto {
            width: 150px;
            height: 150px;
        }

        .adminCard h4 {
            text-align: center;
        }

        .adminCard h5 {
            text-align: center;
        }

        .adminCard p {
            text-align: justify;
            padding-left: 30px;
            padding-right: 30px;
        }

        .adminCardLine {
            width: 100%;
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .divAdminCards {
            width: 100%;
            height: 100%;
        }

        .divExistingAdmin h3 {
            text-align: center;
        }

        .divExistingAdmin {
            width: 100%;
            height: 100%;
        }

        .main-grid .left {
            width: 100%;
            height: 700px;
        }

        /* .main-grid .right{
            flex-grow: 1;
            height: 1000px;
        } */
    </style>

</div>

<style>
    #sidebar-active {

        margin: 1rem 1rem 1rem calc(var(--sidebar-width-actual) + 0.75rem);
        /* background-color: yellowgreen; */
        width: (100vw - var(--sidebar-width-actual));
        /* height: 50vh; */

        /* border: 2px solid red; */


        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        overflow: hidden;
    }
</style>