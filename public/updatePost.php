<?php

// Load all application files and configurations

require($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');

// Include the HTML layout class

require_once(FS_TEMPLATES . 'mainHeaderTemplate.php');
require_once(FS_TEMPLATES . 'mainFooterTemplate.php');

// Include the Post class
require_once(FS_INCLUDES . 'posts.php');

// Initialize variables

$requestType = $_SERVER['REQUEST_METHOD'];

// Generate the HTML for the top of the page

$header = new mainHeaderTemplate();
echo $header->renderStatic();

// Page content goes here

?>

    <div class="container top25">

        <div class="col-md-8">

            <section class="content">



                <?php

                if ($requestType == 'GET') {

//

                    $sql = 'select * from stories where id = ' . $_GET['id'];

                    $result = $db->query($sql);

                    $row = $result->fetch();

                    //showUpdateForm($row);

                    $id = $row['id'];

                    $title = $row['title'];

                    $content = $row['content'];

                    $startDate = $row['startDate'];

                    $endDate = $row['endDate'];

                    echo <<<postform

                <form id="createPostForm" action='updatePost.php' method="POST" class="form-horizontal">

        <fieldset>


            <!-- Form Name -->

            <legend>Update Post</legend>

  <input type="hidden" name="id" value=$id>

            <!-- Text input-->

            <div class="form-group">

                <label class="col-md-3 control-label" for="title">Title</label>

                <div class="col-md-8">

                    <input id="title" name="title" type="text" placeholder="post title" value="$title" class="form-control input-md" required="">

                </div>

            </div>


            <!-- Textarea -->

            <div class="form-group">

                <label class="col-md-3 control-label" for="content">Content</label>

                <div class="col-md-8">

                    <textarea class="form-control" id="content" name="content">$content</textarea>

                </div>

            </div>

            <!-- Text input-->

            <div class="form-group">

                <label class="col-md-3 control-label" for="startDate">Effective Date</label>

                <div class="col-md-8">

                    <input id="startDate" name="startDate" type="text" placeholder="effective date" value="$startDate" class="form-control input-md" required="">

                </div>

            </div>


            <!-- Text input-->

            <div class="form-group">

                <label class="col-md-3 control-label" for="endDate">End Date</label>

                <div class="col-md-8">

                    <input id="endDate" name="endDate" type="text" placeholder="end date" value="$endDate" class="form-control input-md">

                </div>

            </div>


            <!-- Button -->

            <div class="form-group">

                <label class="col-md-3 control-label" for="submit"></label>

                <div class="col-md-8">

                    <button id="submit" name="submit" value="Submit" class="btn btn-success">Update</button>
                    <a id="delete" name="delete" href="deletePost.php?id=$id" value ="delete" class="btn btn-info">Delete</a>

                    <a id="cancel" name="cancel" href="index.php" value ="Cancel" class="btn btn-info">Cancel</a>

                </div>

            </div>



        </fieldset>

    </form>

postform;





                } elseif ($requestType == 'POST') {

                    $id = $_POST['id'];

                    $title = htmlspecialchars($_POST['title'], ENT_QUOTES);

                    $content = htmlspecialchars($_POST['content'], ENT_QUOTES);

                    $startDate = htmlspecialchars($_POST['startDate'], ENT_QUOTES);

                    $endDate = htmlspecialchars($_POST['endDate'], ENT_QUOTES);


                    //echo '<pre>' . print_r($_POST) . '</pre>';



                    $sql = "update stories set startDate = '$startDate', endDate = '$endDate', title = '$title', content = '$content' where id = $id;";

                    $result = $db->query($sql);

                    header('Location: index.php');

                }

                ?>
            </section>
        </div>
    </div>





<?php

// Generate the page footer

$footer = new mainFooterTemplate();
echo $footer->renderStatic();