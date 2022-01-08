<?php
require_once 'controllers/main.php';
require_once 'methods/method.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .container {
            height: calc(100vh - 3px);
        }
        main {
            height: 100%;
        }
        .void {
            padding-bottom: 10vh;
        }
        .title {
            font-size: 9rem;
            height: 173px;
        }
        .form-text {
            display: none;
        }
    </style>
</head>
<body data-url="<?= MAIN_URL; ?>">
<main>
    <div class="container mh-100 d-flex align-items-center">
        <div class="inner w-100 overflow-hidden border-1">
            <div class="row">
                <div class="col-12">
                    <h1 align="center" class="display-1 title word-output"></h1>
                </div>
            </div>
            <div class="void"></div>
            <div class="row">
                <div class="col-12">
                    <form class="d-flex justify-content-center">
                        <div>
                            <div class="mb-3">
                                <label  for="exampleInputEmail1" class="form-label text-center">Enter words</label>
                                <input type="text" class="form-control word-input" maxlength="30"  name="word">
                                <div class="form-text" >Wrong text!</div>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="button" class="btn btn-success w-100 submit">CHECK TRANSLATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="/view/request.js"></script>
</body>
</html>
