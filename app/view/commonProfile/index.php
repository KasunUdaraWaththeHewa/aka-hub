<?php
$HTMLHead = new HTMLHead($data['title']);
// $header = new header();
$sidebar = new Sidebar();
$candidateCard = new CandidateCard();
?>

<div id="sidebar-active">

    <div class="welcome-back">
        <div class="flex flex_container">
            <div class="flex_item">
                <div class="title pb-0-5">Welcome back</div>
                <div class="text-muted">Hi Samudi Perera</div>
            </div>
            <div class="flex_item search_flex">
                <form class="flex w-100" action="" method="get">
                    <button class="btn" type="submit">
                        <i class='bx bx-search'></i>
                    </button>
                    <input class="form-group" type="text" name="q" id="" placeholder="Search" />
                </form>
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
            <div class ="profileHeading">Your Profile</div>
            <div class = "profileArea">
                <div class = "profileImageArea">
                    <div class = "profileImageContainer"><img class = "profileImage" src="<?= BASE_URL ?>/public/assets/img/common/candidateImage.jpg" alt=""></img></div>
                </div>
                <div class = "profileDetailArea">
                    <div class = "profileDetailRow"><div class = "profileDetailHeader">Name : </div><div class = "profileDetailCell">Samudi Perera</div></div>
                    <div class = "profileDetailRow"><div class = "profileDetailHeader">Email Address : </div><div class = "profileDetailCell">2021cs1234@ucsc.cmb.ac.lk</div></div>
                    <div class = "profileDetailRow"><div class = "profileDetailHeader">Alternative Email : </div><div class = "profileDetailCell">Samudi@gmail.com</div></div>
                    <div class = "profileDetailRow"><div class = "profileDetailHeader">NIC : </div><div class = "profileDetailCell">200256478654</div></div>
                    <div class = "profileDetailRow"><div class = "profileDetailHeader">Contact Number : </div><div class = "profileDetailCell">075984652</div></div>

                </div>
            </div>
            <div class ="profileButtons">
                <div class = "changePicture"><input type = "button" class = "profileButton" value = "Change Picture"/></div>
                <div class = "editDetailButton"><input type = "button" class = "profileButton" value = "Edit Profile"/></div>
                <div class = "changePasswordButton"><input type = "button" class = "profileButton" value = "Change Password"/></div>
            </div>

            </div>
        </div>
    </div>

    <style>
        .main-grid {}

        .main-grid .left {
            width: 100%;
            height: 90vh;
            margin: 20px;
        }

        .profileHeading {
            margin-left : 20px;
            font-weight : bold;
        }

        .notificationHeading{
            margin-top : 20px;
            margin-left : 20px;
            font-weight : bold;
        }

        .profileImage{
            border-radius: 100px;
            width: 200px;
            height: 200px;
            /* margin-left: 20px; */
            margin: 0 auto;
            margin-bottom: 20px;
            border : 5px solid rgba(38,132,255, 0.5)
        }

        .profileArea, .notificationDetailArea {
            display : flex;
            height : 45%;
        }

        .profileDetailArea{
            width : 50%;
            padding-top: 70px;
        }

        .profileImageArea{
            width : 50%;
            margin : 10px;
            padding : 4%;
            margin-top : 0px;
            padding-left : 15px;
        }

        .profileButtons{
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .profileButton{
            width: 150px;
            height: 30px;
            background-color: #2684FF;
            border-radius: 5px;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            border : none;
            margin-right: 10px;
        }

        .profileButton:hover {
            cursor: pointer;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        
        .profileDetailRow{
            display : flex;
            margin-top : 2%;
        }

        .profileDetailCell{
            justify-content: flex-start;
            margin-left : 5%;
        }

        .profileDetailHeader{
            width:30%;
        }

        .changePasswordButton input{
            width : 200px;
        }


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