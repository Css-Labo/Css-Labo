<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/post.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
        integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">


    <script src="JS/post.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    require_once '../src/PHP/Ueda.php';
    session_start();
    $_SESSION['id']='1';
    $dbmng = new Ueda();
    if (isset($_POST["mode"]) && $_POST["mode"] == "encode" && $_FILES['image']['name']) {
        $uploadFile = "./" . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $image = file_get_contents($uploadFile);
            unlink($uploadFile);
        } else {
            echo "upload error.";
        }
        $base64Text = "data:image/png;base64,".base64_encode($image);
        $dbmng->InsertCss($_SESSION['id'],$_POST['name'],$base64Text,$_POST['Hcode'],$_POST['Ccode'],$_POST['tag'],$_POST['info']);
        $alert = "<script type='text/javascript'>alert('投稿しました！タイトル名：".$_POST["name"]."');</script>";
        echo $alert;
    }
    ?>
    <header>
        <div class="collapse bg-while" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-muted">CssLabo</h4>
                        <p class="text-muted">CssLaboの説明?</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <ul class="list-unstyled">
                            <!-- <li><a href="#" class="text-muted"><i class="bi bi-hand-thumbs-up"></i></a></li> -->
                            <li><a href="http://localhost/web/src/profile.php" class="text-muted"><i class="bi bi-person-circle"></i></a></li>
                            <li><a href="http://localhost/web/src/index.php" class="text-muted"><i class="bi bi-pencil-square"></i></a></li>
                            <!-- <li><a href="SignIn.php" class="text-muted"><i class="bi bi-person-plus"></i></a></li> -->
                            <li><a href="#" class="text-muted"><i class="bi bi-person-x" id="logout"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-while bg-while shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="http://localhost/web/src/home2.php" class="navbar-brand d-flex align-items-center">
                    <strong>CssLabo</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <form action="" method="post" enctype="multipart/form-data">

        <div>
            <label class="desc" id="title1" for="Field1">Title</label>
            <div>
                <input id="Field1" name="name" type="text" class="field text fn" value="" size="8" tabindex="1">
            </div>
        </div>

        <div>
            <label class="desc" id="title3" for="Field3">
                Comments
            </label>
            <div>
                <input id="Field3" name="info" type="text" spellcheck="false" value="" tabindex="3">
            </div>
        </div>

        <div>
            <label class="desc" id="title4" for="Field4">
                HTML
            </label>

            <div>
            <textarea  name="Hcode" spellcheck="true" rows="5" cols="50" tabindex="4"></textarea>
            </div>

        </div>

        <div>
            <label class="desc" id="title4" for="Field4">
                CSS
            </label>

            <div>
            <textarea  name="Ccode" spellcheck="true" rows="5" cols="50" tabindex="4"></textarea>
        </div>
            </div>

        </div>

        <div>
            <label class="desc" id="title5" for="Field4">
                Image
            </label>

            <!-- <legend id="title5" class="desc">
                    
                </legend> -->

            <div>
                <!-- <input id="radioDefault_5" name="Field5" type="hidden" value=""> -->
                <div>
                    <input type="hidden" name="mode" value="encode" />
                    <input type="file" name="image" class="form-control" id="Field6" value="First Choice" tabindex="8"/>
                </div>
            </div>

        </div>

        <!-- <div>
            <fieldset>
                <legend id="title6" class="desc">
                    Check All That Apply
                </legend>
                <div>
                    <div>
                        <input id="Field6" name="Field6" type="checkbox" value="First Choice" tabindex="8">
                        <label class="choice" for="Field6">First Choice</label>
                    </div>
                    <div>
                        <input id="Field7" name="Field7" type="checkbox" value="Second Choice" tabindex="9">
                        <label class="choice" for="Field7">Second Choice</label>
                    </div>
                    <div>
                        <input id="Field8" name="Field8" type="checkbox" value="Third Choice" tabindex="10">
                        <label class="choice" for="Field8">Third Choice</label>
                        </span>
                    </div>
            </fieldset>
        </div> -->

        <div>
            <label class="desc" id="title106" for="Field106">
                #Tag
            </label>
            <div>
            <select id="Field106" name="tag" class="field select medium" tabindex="11">
                <option value="春">#春</option>
                <option value="夏">#夏</option>
                <option value="秋">#秋</option>
                <option value="冬">#冬</option>
            </select>
            </div>
        </div>

        <div>
            <div>
            <input id="saveForm" name="saveForm" type="submit" value="投稿">
            </div>
        </div>

    </form>
    <!--  -->
    <script src="../../assets/js/vendor/holder.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="/docs/4.3/assets/js/vendor/anchor.min.js"></script>
    <script src="/docs/4.3/assets/js/vendor/clipboard.min.js"></script>
    <script src="/docs/4.3/assets/js/vendor/bs-custom-file-input.min.js"></script>
    <script src="/docs/4.3/assets/js/src/application.js"></script>
    <script src="/docs/4.3/assets/js/src/search.js"></script>
    <script src="/docs/4.3/assets/js/src/ie-emulation-modes-warning.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <!--  -->
</body>

</html>