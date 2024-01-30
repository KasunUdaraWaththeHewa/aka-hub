<?php
$HTMLHead = new HTMLHead($data['title']);
// $header = new header();
$sidebar = new Sidebar("Settings");
?>

<div id="sidebar-active" class="hideScrollbar">
    <?php $welcomeSearch = new WelcomeSearch(); ?>

    <div class="main-grid flex">
        <div class="left">
            <div class = "counselorArticlesPanel">
                <div class = "panelTitle">
                    <h4 class = "text-center"> Published Articles </h4>
                </div>
                <div class = "articleCard">
                    <div class = "articleImage">
                        <img src= '<?= BASE_URL ?> /public/assets/img/counselors/counselorImage.jpg' alt='' id = 'counselorPhoto'>
                    </div>
                    <div class = "articleTitle">
                        How to maintain stress
                    </div> 
                </div>
                
            </div>
        </div>
        <div class = "right">
            <div class = "profileDescriptionPanel">
                <div class = "descriptionPanelLeft">
                    <div class = "profileImageContainor">
                        <img src= '<?= BASE_URL ?> /public/assets/img/counselors/counselorImage.jpg' alt='' id = 'counselorPhoto'>
                    </div>
                </div>
                <div class = "profileDetailsContainer">
                    <div class = "font-1-25 font-semibold ms-1 mt-2">Dr. Nimal Perera</div>
                    <div class = "font-1 font-meidum text-muted ms-1 mt-0-5">Professional Counselor</div>
                    <div class = "font-1 text-muted ms-1 mt-0-5">You can now talk with the professional counselors to reserve a date for your appointment</div>
                    <div href="#" class = "chatButtonContainer">
                        <div class = "btn btn-primary mb-1 form form-group chatButton justify-center align-center">
                            Chat Now
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .main-grid .left{
            width: 80% !important;
            height: 700px;
            /* border: 1px solid red; */
            justify-content: center;
            align-items:center;
        }

        .counselorArticlesPanel{
            width: 100%;
            /* border: 1px solid var(--secondary-color-faded); */
            /* box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); */
            /* height: 500px; */
            display: flex;
            flex-wrap: wrap;
            border-radius: 10px;
            /* border : 1px solid red; */

        }

        .panelTitle{
            width: 100%;
        }

        .articleCard {
            width: 30%;
            min-width: 150px;
            height: 100%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            margin: 25px;
            border-radius : 10px;
            /* border: 1px solid red; */
        }

        .articleImage {
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
        }
        
        .articleImage img{
            width: 150px;
            height: 150px;
            margin : 0.5rem;
        }

        .articleTitle{
            text-align : center;
            margin : 0.5rem;
            font-size: 12px;
            font-weight: bold;
            /* border: 1px solid red; */
        }

        .main-grid .right{
            margin-right:2rem;
            /* border: 1px solid red; */
            padding: 2rem;
        }

        .profileDescriptionPanel{
            width: 100%;
            /* border: 1px solid var(--secondary-color-faded); */
            /* box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); */
            /* height: 500px; */
            display: flex;
            flex-wrap: wrap;
            border-radius: 10px;
        }

        .descriptionPanelLeft{
            width:40%;
            display:flex;
            /* border: 1px solid red; */
            justify-content:center;
            align-items:center;
            /* margin: 2rem; */
        }

        .profileImageContainor{
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            border: 5px solid #bdd2f1;
            width: 8rem;
            height: 8rem;
            /* margin : 2rem; */
        }

        .profileImageContainor img{
            width: 7rem;
            height: 7rem;
            /* margin : 0.5rem; */
            border-radius: 50%;
        }

        .profileDetailsContainer{
            justify-content: center;
            align-items: center;
            /* border: 1px solid red; */
            width: 60%;
            /* margin: 2rem; */
        }

        /* .chatButton{
            border: 1px solid #2684ff;
            background-color: var(--secondary-color);
            color: white;
            width: 100%;
            text-align:center;
        } */

        .chatButtonContainer{
            width: 100%;
            /* border: 1px solid red; */
            justify-content: left ;
            align-items: left ;
            display:flex;
            margin: 1rem 0 0 1rem;
        }

    </style>


</div>

<?php $HTMLFooter = new HTMLFooter(); ?>
<script>
    let BASE_URL = "<?= BASE_URL ?>";
</script>
<script>
</script>