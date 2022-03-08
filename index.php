<?php
    if (!empty($_FILES['file'])) {
        var_dump($_FILES['file']);
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Text to send if user hits Cancel button';
        exit;
    } else {
        if ($_SERVER['PHP_AUTH_USER'] != 'admin' && $_SERVER['PHP_AUTH_PW'] != 'Aa111111') {
?>
            <form action="" enctype="multipart/form-data">
                <input type="file" name="file">
                <input type="submit" value="提交">
            </form>
<?php
        } else {
?>
            <p>认证失败</p>
<?php
        }
    }
?>
</body>
</html>