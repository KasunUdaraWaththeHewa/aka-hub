<?php
$HTMLHead = new HTMLHead($data['title']);
// $header = new header();
$sidebar = new Sidebar("manageMaterials");
?>

<div id="sidebar-active" class="hideScrollbar">
    <?php $welcomeSearch = new WelcomeSearch(); ?>

    <div class="main-grid flex">
        <div class="left">

            <!-- section header -->
            <section>
                <div class="section_header mb-1 flex">
                    <h3 class="title font-1-5 font-semibold flex align-center text-muted">
                        &nbsp;<span class="text--black"> <?= $data["viewMaterial"][0]["course_name"] ?> - <?= $data["viewMaterial"][0]["course_code"] ?></span>
                    </h3>
                </div>

                <?php

                if (isset($data["viewMaterial"][0])) {
                    $course_material = (object) $data["viewMaterial"][0];
                    $video_links = json_decode($course_material->video_links);
                    $short_notes = json_decode($course_material->short_notes);
                    $reference_links = json_decode($course_material->reference_links);
                ?>

                    <div class="material-item mb-1">
                        <div class="desc flex justify-between align-center">
                            <div>
                                <?= $course_material->description ?>
                            </div>
                            <div>
                                <?php $date = new DateTime($course_material->updated_at);
                                $date = $date->format('Y F d - h:i A');
                                echo $date; ?>

                            </div>
                            <?php
                            if ($data["role"] == 1) {
                            ?>
                                <div class="todo_item_actions flex">
                                    <a href="<?= BASE_URL ?>/manageMaterials/material/add_edit/<?= $course_material->material_ID ?>/<?= $data["id"] ?>/edit" class="btn d-block m-1"> <i class='bx bx-edit'></i></a>
                                    <div class="btn delete-item" data-id="<?= $course_material->id ?>">
                                        <i class='bx bx-trash text-danger'></i>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                        <?php
                        if (is_array($video_links)) {
                            echo '<div class="links-wrapper mt-1"><div class="links-title">Kuppi Video Links</div>';
                            foreach ($video_links as $video_link) {
                                $module_name = $video_link[0];
                                $links = $video_link[1];

                        ?>
                                <div class="video_links">
                                    <div class="module_name text--secondary mb-0-5"><?= $video_link[0] ?></div>
                                    <div class="link-items ms-1">
                                        <?php
                                        foreach ($links as $link) {
                                        ?>
                                            <div class="link-item">
                                                <a href="<?= $link ?>" target="_blank" class="link">
                                                    Open <div class="yt-logo">
                                                        <img src="<?= ASSETS_PATH ?>img/common/youtube-logo.png" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                            <?php }
                            echo "</div>";
                        }

                        if (is_array($short_notes)) {
                            echo '<div class="links-wrapper mt-1"><div class="links-title">Notes</div><div class="notes-wrapper">';
                            foreach ($short_notes as $note) {
                                $img = ASSETS_PATH . "img/common/pdf.png";
                                $note = USER_PDF_PATH . $note;

                            ?>

                                <div class="note-item">
                                    <a href="<?= $note ?>" target="_blank">
                                        <img src="<?= $img ?>" alt="" class="img">
                                    </a>
                                </div>

                        <?php }
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>


                    </div>


                <?php
                } else {
                    echo "<div class='font-bold'>No Course Materials Found for this module</div>";
                }
                ?>
                <style>
                    .material-item {
                        /* border: 1px solid var(--secondary-color-faded); */
                        border-radius: 15px;
                        padding: 1.5rem;
                        max-width: 600px;
                        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
                        /* box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); */
                    }

                    .material-item .links-wrapper {
                        border: 1px solid grey;
                        border-radius: 7px;
                        /* padding-bottom: 1rem; */
                        /* box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); */
                    }

                    .material-item .links-title {
                        padding: 1rem;
                        border-bottom: 1px solid grey;
                        /* margin-bottom: 1rem; */
                    }

                    .material-item .video_links {
                        padding: 1rem;
                        padding-top: 1rem;
                        /* margin: 0.75rem; */
                        /* border-bottom: 1px solid var(--secondary-color-faded); */
                    }

                    /* first child */


                    .material-item .link-item {
                        /* padding: 0.75rem; */
                        margin-bottom: 0.25rem;
                    }

                    .material-item .link-items a {
                        background-color: #000;
                        color: #fff;
                        padding: 0.5rem;
                        width: 150px;
                        text-decoration: none;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 7px;
                    }

                    .material-item .link-items .yt-logo {
                        margin-left: 0.5rem;
                        width: 32px;
                        display: inline-block;
                    }

                    .material-item .notes-wrapper {
                        display: flex;
                        flex-wrap: wrap;
                    }

                    .material-item .note-item {
                        width: 100px;
                        height: 100px;
                        margin: 0.5rem;
                        border-radius: 7px;
                        overflow: hidden;
                        /* box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); */
                    }
                </style>

            </section>
        </div>
    </div>
</div>

<?php $HTMLFooter = new HTMLFooter(); ?>
<script>
    let BASE_URL = "<?= BASE_URL ?>";
</script>
<script>
    $(document).ready(function() {
        $(document).on("click", ".delete-item", function() {
            let id = $(this).attr("data-id");
            let $this = $(this);

            // confirm delete
            if (!confirm("Are you sure you want to delete this course?"))
                return;

            $.ajax({
                url: `${BASE_URL}/courses/delete_material/${id}`,
                type: 'post',
                data: {
                    delete: true
                },
                dataType: 'json',
                success: function(response) {
                    if (response['status'] == 200) {
                        alertUser("success", response['desc'])
                        $this.closest(".material-item").remove();
                    } else if (response['status'] == 403)
                        alertUser("danger", response['desc'])
                    else
                        alertUser("warning", response['desc'])
                },
                error: function(ajaxContext) {
                    alertUser("danger", "Something Went Wrong")
                }
            });
        });
    });
</script>