<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Uploader</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">

    <link rel="stylesheet" href="pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="css/drop_uploader.css">

    <!--script src="js/jquery-2.2.4.min.js"></script-->
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/drop_uploader.js"></script>

    <script>
        $(document).ready(function(){
            $('input[type=file]').drop_uploader({
                uploader_text: 'Drop files to upload, or',
                browse_text: 'Browse',
                only_one_error_text: 'Only one file allowed',
                not_allowed_error_text: 'File type is not allowed',
                big_file_before_error_text: 'Files, bigger than',
                big_file_after_error_text: 'is not allowed',
                allowed_before_error_text: 'Only',
                allowed_after_error_text: 'files allowed',
                browse_css_class: 'button button-primary',
                browse_css_selector: 'file_browse',
                uploader_icon: '<i class="pe-7s-cloud-upload"></i>',
                file_icon: '<i class="pe-7s-file"></i>',
                time_show_errors: 5,
                layout: 'thumbnails',
                method: 'normal',
                url: 'ajax_upload.php',
                delete_url: 'ajax_delete.php',
            });
        });
    </script>

</head>
<body style="background: #fff;">
    <div class="container">
        <div class="row">
            <div class="twelve column" style="margin-top: 5%">
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <h4>Multiple File Upload Form</h4>
                <form method="POST" action="upload.php" enctype="multipart/form-data">
                    <input type="file" name="file[]" multiple>
                    <input class="button-primary" type="submit" value="Submit">
                </form>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <h4>AJAX Upload Form</h4>
                <form method="POST" action="upload.php" enctype="multipart/form-data">
                    <input type="file" name="file[]" data-method="ajax" multiple>
                    <input class="button-primary" type="submit" value="Submit">
                </form>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <h4>Single File Upload Form</h4>
                <form method="POST" action="upload.php" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <input class="button-primary" type="submit" value="Submit">
                </form>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <h4>Only Images Upload Form</h4>
                <form method="POST" action="upload.php" enctype="multipart/form-data">
                    <input type="file" multiple name="file[]" accept="image/*">
                    <input class="button-primary" type="submit" value="Submit">
                </form>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <h4>Only PDF Upload Form</h4>
                <form method="POST" action="upload.php" enctype="multipart/form-data">
                    <input type="file" multiple name="file[]" accept="application/pdf">
                    <input class="button-primary" type="submit" value="Submit">
                </form>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <h4>Only Files Less than 1 Mb</h4>
                <form method="POST" action="upload.php" enctype="multipart/form-data">
                    <input type="file" multiple name="file[]" data-maxfilesize="1000000">
                    <input class="button-primary" type="submit" value="Submit">
                </form>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <h4>File List Layout</h4>
                <form method="POST" action="upload.php" enctype="multipart/form-data">
                    <input type="file" name="file[]" multiple data-layout="list">
                    <input class="button-primary" type="submit" value="Submit">
                </form>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <h4>AJAX Single File Upload with List Layout</h4>
                <form method="POST" action="upload.php" enctype="multipart/form-data">
                    <input type="file" name="file" data-layout="list" data-method="ajax">
                    <input class="button-primary" type="submit" value="Submit">
                </form>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <h4>AJAX Multiple File Upload with List Layout</h4>
                <form method="POST" action="upload.php" enctype="multipart/form-data">
                    <input type="file" name="file" multiple data-layout="list" data-method="ajax">
                    <input class="button-primary" type="submit" value="Submit">
                </form>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <h4>Three File Upload Form</h4>
                <form method="POST" action="upload.php" enctype="multipart/form-data">
                    <input type="file" name="file[]" multiple data-count="3">
                    <input class="button-primary" type="submit" value="Submit">
                </form>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <h4>Three File Upload Form AJAX</h4>
                <form method="POST" action="upload.php" enctype="multipart/form-data">
                    <input type="file" name="file[]" data-method="ajax" multiple data-count="3">
                    <input class="button-primary" type="submit" value="Submit">
                </form>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</body>
</html>
