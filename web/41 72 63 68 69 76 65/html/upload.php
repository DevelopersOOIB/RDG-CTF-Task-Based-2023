<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.muicss.com/mui-latest/js/mui.min.js"></script>
    <title>injection</title>
</head>
<body>
<div id="content" class="mui-container-fluid">
    <div class="mui-row">
        <div class="mui-col-sm-10 mui-col-sm-offset-1">
            <br>
            <br>
            <div class="mui--text-black-54 mui--text-body2"><h1>Come on, take a chance to upload your file! I'll arrange such a "penetration test" for you!</h1>
        </div>
    </div>
</div>
<form action="" enctype="multipart/form-data" method="post" 
name="upload">file:<input type="file" name="file" /><br> 
<input type="submit" value="upload" /></form>
</body>
</html>

<?php
if(!empty($_FILES["file"]))
{
    echo $_FILES["file"];
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    @$temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);
    if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
    || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
    || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
    && (@$_FILES["file"]["size"] < 102400) && in_array($extension, $allowedExts))
    {
        copy($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
        echo "file upload successful!Save in:  " . "upload/" . $_FILES["file"]["name"];
    }
    else
    {
        echo "upload failed!";
    }
}
?>
