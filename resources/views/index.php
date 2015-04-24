<?php
/**
 * Created by PhpStorm.
 * User: namma
 * Date: 25/04/2015
 * Time: 01:13
 */
?>
<!doctype html>
<html>
<head>
    <title>ACL Laravel Demo</title>
    <style>
        body {
            margin: 0;
        }
        #title {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

            padding: 20px;

            border-radius: 4px;

            background-color: #0088CC;
            color: #ffffff;
            font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
        }
        #title > h2 {
            margin-top: 0;
        }
        #title > a {
            padding: 5px 10px;
            border-radius: 4px;
            background-color: #ffffff;
            color: #0088CC;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <span id="title">
        <h2>See this article:</h2>
        <a href="http://ollieread.com/blog/2014/03/18/a-simplified-laravel-acl/">
            http://ollieread.com/blog/2014/03/18/a-simplified-laravel-acl/
        </a>
    </span>
</body>
</html>
