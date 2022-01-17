<?php
require_once 'app.php';
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
        .outside {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #173416a6;
            height: 100%;
            z-index: 11111;
            visibility: hidden;
            opacity: 0;

            transition: .4s ease;
        }

        .inside {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            transition: .4s ease;
            overflow-y: scroll;
        }


        .custom-modal {
            padding: 30px;
            background: white;
            max-width: 1200px;
            position: relative;
            top: 25%;
            transform: translate(-50%, 0);
            left: 50%;



            /*visibility: hidden;*/
            /*opacity: 0;*/

            /*transition: visibility 0.25s linear 0.33s, opacity 0.33s linear;*/
        }

        .show {
            visibility: visible;
            opacity: 1;
        }

        .show-top {
            top: -5%;
            height: 105%;
        }


        .table th {
            vertical-align: middle;
        }
        .mr-1 {
            margin-right: 1rem;
        }
        .pc-0-5 {
            padding: 0.5rem;
        }
        .exit {
            width: 40px;
            height: 40px;
            position: absolute;
            left: 50%;
            top: -60px;
            transform: translateX(-50%);
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
                <div class="col-lg-2 col-md-6">
                    <div class="border border-success rounded h-100 w-100">
                        <button class="btn btn-primary open-modal">Add words</button>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <form class=" needs-validation d-flex justify-content-center" novalidate>
                        <div>
                            <div class="mb-3">
                                <label  for="exampleInputEmail1" class="form-label text-center">Enter words</label>
                                <input type="text" class="form-control word-input" maxlength="30"  name="word" required>
                                <div class="form-text" ></div>
                            </div>
<!--                            <div class="mb-3 form-check">-->
<!--                                <input type="checkbox" class="form-check-input">-->
<!--                                <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
<!--                            </div>-->
                            <button type="button" class="btn btn-success w-100 submit">CHECK TRANSLATE</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2 col-md-6">
<!--                    <div class="border border-danger rounded h-100 w-100"></div>-->
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once 'modal.php'?>
<script type="module" src="/view/js/App.js"></script>
<script type="module" src="/view/js/Exercise.js"></script>
<script type="module" src="/view/js/Aggregate.js"></script>

<script type="module" src="/view/js/main.js"></script>
</body>
</html>
