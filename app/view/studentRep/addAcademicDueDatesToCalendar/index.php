<?php
$HTMLHead = new HTMLHead($data['title']);
// $header = new header();
$sidebar = new Sidebar("manageMaterials");
?>


<div id="sidebar-active" class="hideScrollbar">
    <?php $welcomeSearch = new WelcomeSearch("Saliya", "Bandara"); ?>


    <div class="main-grid flex">
        <div class="left">
            <div class="divAddCounselors">
                <h3>Add Academic DueDates to Calendar</h3>
                <div class="divCounselorDetails">
                    <div class="divFormContainor">
                        <div class="mwb-form-main-wrapper">
                            <div class="mwb-form-main-container">
                                <form action="#">
                                    <div class="mwb-form-group">
                                        <input type="text" class="mwb-form-control" value="" id="name" placeholder="Due Event Title*">
                                        <div class="mwb-form-error">This Field Required*</div>
                                    </div>
                                    <div class="mwb-form-group">
                                        <input type="text" class="mwb-form-control" value="" id="name" placeholder="Module Name*">
                                        <div class="mwb-form-error">This Field Required*</div>
                                    </div>
                                    <div class="mwb-form-group">
                                        <input type="text" class="mwb-form-control" value="" id="name" placeholder="More Details on Event*">
                                        <div class="mwb-form-error">This Field Required*</div>
                                    </div>
                                    <div class="mwb-form-group" id="dateAndTimeContainor">
                                        <div>
                                            <label for="Club">Due Event Type: </label>
                                            <select>
                                                <option value="option1">Examination</option>
                                                <option value="option2">Assignment</option>
                                            </select>

                                        </div>
                                        <div>
                                            <label for="date">Due Date:</label>
                                            <input type="date" id="birthday" name="date" placeholder="Date">
                                        </div>
                                        <div>
                                            <label for="appt">Due time: </label>
                                            <input type="time" id="appt" name="appt">
                                        </div>

                                    </div>
                                    <div class="mwb-form-group" id="targetAudience">
                                        <div>
                                            <label for="Club">Targeted Batch: </label>
                                            <select>
                                                <option value="option1">First Year</option>
                                                <option value="option2">Second Year</option>
                                                <option value="option1">Third Year</option>
                                                <option value="option2">Fourth Year</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="Club">Targeted Degree: </label>
                                            <select>
                                                <option value="option1">Computer Science</option>
                                                <option value="option2">Information Systems</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mwb-form-group">
                                        <input type="Submit" class="mwb-form-submit-btn" value="Add Events to Calendar">
                                    </div>
                                </form>
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

        #targetAudience {
            display: flex;
            flex-direction: row;
            align-items: center;
        }
        #targetAudience div{
            width: 39.5%;
        }
        #dateAndTimeContainor {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .mwb-form-main-wrapper {
            font-family: 'Lato', sans-serif;
            line-height: 1.5;
            padding: 20px;
            width: 100%;
        }

        .mwb-form-main-container {
            background-color: #fff;
            color: #7b7878;
            margin: 0 auto;
            max-width: 85%;
        }

        .mwb-form-main-container form {
            padding: 20px;
        }

        .mwb-form-main-container h1 {
            background-color: #26A69A;
            color: #ffffff;
            font-size: 30px;
            font-weight: 500;
            margin: 0 0 10px 0;
            padding: 22px 15px;
            text-align: center;
        }

        .mwb-form-group {
            font-size: 14px;
            margin-bottom: 30px;
            position: relative;
        }

        .mwb-form-text-label {
            left: 10px;
            position: absolute;
            top: 12px;
            transition: 0.2s linear all;
        }

        .mwb-form-group.focus-input .mwb-form-text-label {
            background-color: #ffffff;
            padding: 0 2px;
            top: -11px;
            transition: 0.2s linear all;
        }

        .mwb-form-control {
            background-color: #ffffff;
            border-radius: 4px;
            border: 2px solid #dddddd;
            font-size: 14px;
            padding: 13px;
            width: 100%;
        }

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

        .mwb-form-submit-btn :hover {
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

        .mwb-form-radio {
            display: inline-block;
            margin-right: 15px;
            position: relative;
        }

        .mwb-form-radio input[type="radio"]~label {
            padding-left: 10px;
            cursor: pointer;
        }

        .mwb-form-radio input[type="radio"] {
            margin: 0;
            cursor: pointer;
            width: 20px;
            height: 20px;
            opacity: 0;
        }

        .mwb-form-radio input[type="radio"]+label::before {
            background-color: #dddddd;
            border-radius: 50%;
            content: "";
            cursor: pointer;
            height: 20px;
            left: 0;
            position: absolute;
            top: 6px;
            width: 20px;
        }

        .mwb-form-radio input[type="radio"]+label::after {
            background-color: #2684FF;
            border-radius: 50%;
            content: "";
            height: 10px;
            left: 5px;
            opacity: 0;
            position: absolute;
            top: 11px;
            transform: scale(0);
            transition: 0.3s linear all;
            visibility: hidden;
            width: 10px;
        }

        .mwb-form-radio input[type="radio"]:checked+label::after {
            opacity: 1;
            transform: scale(1);
            transition: 0.3s linear all;
            visibility: visible;
        }

        .mwb-form-error {
            color: #f52626;
            display: none;
            font-size: 12px;
            padding-top: 2px;
        }


        .divFormContainor {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
        }

        .divCounselorDetails {
            width: 100%;
            height: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .divAddCounselors h3 {
            text-align: center;
        }

        .divAddCounselors {
            width: 100%;
            height: 100%;
        }

        .main-grid .left {
            width: 100%;
            height: 900px;
        }

        /* .main-grid .right{
            flex-grow: 1;
            height: 1000px;
        } */
    </style>

</div>

<script>
    jQuery(document).ready(function($) {
        $(".mwb-form-control").focus(function() {
            var tmpThis = $(this).val();
            if (tmpThis == '') {
                $(this).parent(".mwb-form-group").addClass("focus-input");
            } else if (tmpThis != '') {
                $(this).parent(".mwb-form-group").addClass("focus-input");
            }
        });
        $(".mwb-form-control").blur(function() {
            var tmpThis = $(this).val();
            if (tmpThis == '') {
                $(this).parent(".mwb-form-group").removeClass("focus-input");
                $(this).siblings('.mwb-form-error').slideDown("3000");
            } else if (tmpThis != '') {
                $(this).parent(".mwb-form-group").addClass("focus-input");
                $(this).siblings('.mwb-form-error').slideUp("3000");

            }
        });

    });
</script>
