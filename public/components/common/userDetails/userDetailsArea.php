<?php

class UserDetailsArea
{

    public function render()
    {
        $userDetailsCard = new UserDetailsCards();
?> <div class="containorForcardArea">
            <div class="tableContainor">
                <div class="cardContainor">
                <h3 class="h3-RepApprove">User Distribution in the System</h3>
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
                            Index Number
                        </div>
                        <div id="roleHeader" class="tableHeaderItem">
                            Role
                        </div>
                    </div>
                    <?php echo $userDetailsCard->render(); ?>
                    <?php echo $userDetailsCard->render(); ?>
                    <?php echo $userDetailsCard->render(); ?>
                    <?php echo $userDetailsCard->render(); ?>
                    <?php echo $userDetailsCard->render(); ?>
                    <?php echo $userDetailsCard->render(); ?>
                    <?php echo $userDetailsCard->render(); ?>
                    <?php echo $userDetailsCard->render(); ?>
                    <?php echo $userDetailsCard->render(); ?>
                    <?php echo $userDetailsCard->render(); ?>
                </div>
            </div>

        </div>

        <style>

            .h3-RepApprove{
                text-align: center;
                margin-bottom: 20px;
                width: 100%;
            }
            #nameHeader {
                width: 25%;
                height: 55px;
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #mailHeader {
                width: 25%;
                height: 55px;
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #indexNumberHeader {
                width: 25%;
                height: 55px;
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #roleHeader {
                width: 25%;
                height: 55px;
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .tableContainor {
                width: 100%;
                height: 90%;
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
                justify-content: center;
                align-items: center;
                padding: 30px;
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
        </style>

        <script>

        </script>

<?php

    }
}
