<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
        integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/home.css">
    <title>home</title>
</head>
<script>

</script>

<body>


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
                            <li><a href="http://localhost/web/src/post.php" class="text-muted"><i class="bi bi-pencil-square"></i></a></li>
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

    <main role="main">
        <div class="container-fluid mt-4">
        <form action="" method="post">
            <div class="row">
                <div class="col-7 offset-2">
                        <input type="text" name="search" class="form-control" id="kensaku">
                </div>
                <div class="col-1 pt-2">
                    <button class="bi bi-search" type="submit" name="kensaku"></button>
                </div>
            </div>
        </form>
        </div>

        <div class="album py-5 bg-while">
            <div class="container">

                <div class="row">
                  <?php
                    require_once './PHP/Ueda.php';
                    session_start();
                    $_SESSION['id']='1';
                        $dbmng = new Ueda();
                        if(isset($_POST['haru'])==true){
                            $ps=$dbmng->GetTag($_POST['haru']);
                            echofunk($ps);
                        }else if(isset($_POST['natu'])==true){
                            $ps=$dbmng->GetTag($_POST['natu']);
                            echofunk($ps);
                        }else if(isset($_POST['aki'])==true){
                            $ps=$dbmng->GetTag($_POST['aki']);
                            echofunk($ps);
                        }else if(isset($_POST['huyu'])==true){
                            $ps=$dbmng->GetTag($_POST['huyu']);
                            echofunk($ps);
                        }else if(isset($_POST['all'])==true || isset($_POST['id'])==true){
                            $ps=$dbmng->GetTimeline();
                            echofunk($ps);
                            
                        }else if(isset($_POST['asc'])==true){
                            $ps=$dbmng->GetAsc();
                            echofunk($ps);
                        }else if(isset($_POST['desc'])==true){
                            $ps=$dbmng->GetDesc();
                            echofunk($ps);
                        }else if(isset($_POST['good'])==true){
                            $ps=$dbmng->UpdateGood($_POST['good']);
                            $ps=$dbmng->GetTimeline();
                            echofunk($ps);
                        }else if(isset($_POST['comment'])==true){
                            $ps=$dbmng->GetTimeline();
                            echofunk($ps);
                            $ps=$dbmng->GetComment($_POST['comment']);
                            foreach($ps->fetchAll() as $row){
                                echo '<div>'.$row['comment'].'</div>';
                            }
                        }else if(isset($_POST['kensaku'])==true){
                          $ps=$dbmng->GetSearch($_POST['search']);
                          echofunk($ps);
                        }else if(isset($_POST['star'])==true){
                          $ps=$dbmng->InsertStar($_POST['star'],$_POST['myid']);
                          $ps=$dbmng->GetTimeline();
                          echofunk($ps);
                        }else{
                            $ps=$dbmng->GetTimeline();
                            echofunk($ps);
                        }
                        function echofunk($echo){
                          $dbmng = new Ueda();
                            $sw=0;
                            // echo '<form action="" method="post">';
                            foreach($echo->fetchAll() as $row){
                              $res=$dbmng->GetUsername($row['creater_id']);
                              foreach($res->fetchAll() as $row2){
                                echo '<div class="col-md-6">
                                        <div class="card mb-5 shadow">
                                            <img class="card-img-top"
                                                data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                                alt="Thumbnail [100%x225]" src="'.$row['css_img'].'" data-holder-rendered="true"
                                                style="height: 370px; width: 100%; display: block;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>'.$row2['user_name'].'</h6>
                                                    </div>
                                                    <div class="col-4">
                                                        <h6>'.$row['css_name'].'</h6>
                                                    </div>
                                                    <div class="col-1">
                                                    '.$row['css_like'].'
                                                    </div>
                                                    <div class="col-1">
                                                      <form action="" method="post"><button type="submit" value="'.$row['css_id'].'" name="good" class="bi bi-hand-thumbs-up"></button></form>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="dropdown">
                                                            <button class="btn btn-while dropdown-toggle" type="button"
                                                                id="dropdownMenu2" data-bs-toggle="dropdown"
                                                                aria-expanded="false"></button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <li><button class="dropdown-item" type="button"><i
                                                                            class="bi bi-send"></i></button></li>
                                                                <li><form action="" method="post"><button class="dropdown-item" type="submit" value="'.$row['css_id'].'" name="star"><i
                                                                            class="bi bi-bookmark-star"></i></button><input type="hidden" name="myid" value="'.$_SESSION['id'].'"></form></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h6>説明</h6>
                                                    <div>'.$row['css_info'].'</div>
                                                    <h6>HTMLコード</h6>
                                                    <div>'.htmlspecialchars($row['css_Hcode']).'</div>
                                                    <h6>CSSコード</h6>
                                                    <div>'.$row['css_Ccode'].'</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                $sw++;
                              }
                            }
                            if($sw==0){
                                echo "そのタグはまだ投稿されていません";
                            }
                            // echo '</form>';
                        }
                        
                ?>
                </div>
            </div>
        </div>

    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#"><i class="bi bi-arrow-up-square" style="color: #bc8f8f;"></i></a>
            </p>
        </div>
    </footer>
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


    <svg xmlns="http://www.w3.org/2000/svg" width="208" height="225" viewBox="0 0 208 225" preserveAspectRatio="none"
        style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;">
        <defs>
            <style type="text/css"></style>
        </defs><text x="0" y="11"
            style="font-weight:bold;font-size:11pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text>
    </svg>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>