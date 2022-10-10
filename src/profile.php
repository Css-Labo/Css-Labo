<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
    <script src="JS/profile.js"></script>
    <title>Document</title>
    <script>
        window.onload = function() {
            switchTab(event, 'tb_1');
        }
    </script>
</head>

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
                        <h4 class="text-muted">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-muted"><i class="bi bi-hand-thumbs-up"></i></a></li>
                            <li><a href="Post.php" class="text-muted"><i class="bi bi-pencil-square"></i></a></li>
                            <li><a href="#" class="text-muted"><i class="bi bi-person-plus"></i></a></li>
                            <li><a href="#" class="text-muted"><i class="bi bi-person-x"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-while bg-while shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="home2.php" class="navbar-brand d-flex align-items-center">
                    <strong>CssLabo</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <section class="profile_area">
        <div class="container1">
            <div class="profile">
                <div class="profile_image">
                    <img src="https://instagram.fbkk5-7.fna.fbcdn.net/vp/2fa552a0f36c0957a6562ce60bd942ba/5D2AE9DA/t51.2885-19/s150x150/47020328_2224611101145707_7384891889729667072_n.jpg?_nc_ht=instagram.fbkk5-7.fna.fbcdn.net" alt="">
                </div>
                <div class="profile_info">
                    <div class="profile_info--top">
                        <h1>ac name</h1>
                        <a href="#" class="edit">Edit Profile</a>
                        <a href="#" class="gear"><i class="fas fa-cog"></i></a>
                    </div>
                    <div class="profile_info--center">
                        <span><strong>402</strong> Posts</span>
                        <span><strong>146</strong> Followers</span>
                        <span><strong>83</strong> Following</span>
                    </div>
                    <div class="profile_info--bottom">
                        <strong>Miler</strong>
                        <br>
                        <p>Youtuber & Freelance Web Developer</p>
                        <a href="milerdev.com">milerdev.com</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tabs_area">
        <div class="container1">
            <div class="tabs">
                <div onclick="switchTab(event, 'tb_1')" class="tab-item active"><i class="fas fa-th"></i> Posts</div>
                <div onclick="switchTab(event, 'tb_4')" class="tab-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                    </svg>&nbsp;Favorite</div>
            </div>

            <div class="tabs_content">
                <div id="tb_1" class="tabs_content--item">
                    <div class="gallery_grid">
                        <?php
                        require "./PHP/Miyagawa.php";
                        // session_start();

                        $_SESSION['id'] = '1';
                        
                        $dbmng = new Profile();
                        $sq = $dbmng->Getsubtimeline2($_SESSION['id']);
                        if ($sq == null) {
                            echofunk1($sq);
                        } else {
                            echo 'お気に入りはありません';
                        }
                        function echofunk1($sq)
                        {
                            $dbmng = new Profile();
                            $row3 = $dbmng->GetUsername($_SESSION['user_id']);
                            foreach ($sq as $row2) {
                                echo '<div class="col-md-6">
                                        <div class="card mb-5 shadow">
                                            <img class="card-img-top"
                                                data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                                alt="Thumbnail [100%x225]" src="' . $row2['css_img'] . '" data-holder-rendered="true"
                                                style="height: 370px; width: 100%; display: block;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>' . $row3 . '</h6>
                                                    </div>
                                                    <div class="col-4">
                                                        <h6>' . $row2['css_name'] . '</h6>
                                                    </div>
                                                    <div class="col-1">
                                                    ' . $row2['css_like'] . '
                                                    </div>
                                                    <div class="col-1">
                                                      <form action="" method="post"><button type="submit" value="' . $row2['css_id'] . '" name="good" class="bi bi-hand-thumbs-up"></button></form>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="dropdown">
                                                            <button class="btn btn-while dropdown-toggle" type="button"
                                                                id="dropdownMenu2" data-bs-toggle="dropdown"
                                                                aria-expanded="false"></button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <li><button class="dropdown-item" type="button"><i
                                                                            class="bi bi-send"></i></button></li>
                                                                <li><form action="" method="post"><button class="dropdown-item" type="submit" value="' . $row2['css_id'] . '" name="star"><i
                                                                            class="bi bi-bookmark-star"></i></button><input type="hidden" name="myid" value="' . $_SESSION['id'] . '"></form></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h6>説明</h6>
                                                    <div>' . $row2['css_info'] . '</div>
                                                    <h6>HTMLコード</h6>
                                                    <div>' . htmlspecialchars($row2['css_Hcode']) . '</div>
                                                    <h6>CSSコード</h6>
                                                    <div>' . $row2['css_Ccode'] . '</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        }
                        ?>
                        <div class="grid-img">
                            <img src="https://images.unsplash.com/photo-1554166693-4518329faec1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1534&q=80" alt="">
                        </div>

                        <div class="grid-img">
                            <img src="https://images.unsplash.com/photo-1554166693-4518329faec1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1534&q=80" alt="">
                        </div>

                        <div class="grid-img">
                            <img src="https://images.unsplash.com/photo-1554166693-4518329faec1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1534&q=80" alt="">
                        </div>

                        <div class="grid-img">
                            <img src="https://images.unsplash.com/photo-1554166693-4518329faec1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1534&q=80" alt="">
                        </div>

                        <div class="grid-img">
                            <img src="https://images.unsplash.com/photo-1554166693-4518329faec1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1534&q=80" alt="">
                        </div>

                        <div class="grid-img">
                            <img src="https://images.unsplash.com/photo-1554166693-4518329faec1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1534&q=80" alt="">
                        </div>

                        <div class="grid-img">
                            <img src="https://images.unsplash.com/photo-1554166693-4518329faec1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1534&q=80" alt="">
                        </div>

                        <div class="grid-img">
                            <img src="https://images.unsplash.com/photo-1554166693-4518329faec1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1534&q=80" alt="">
                        </div>

                        <div class="grid-img">
                            <img src="https://images.unsplash.com/photo-1554166693-4518329faec1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1534&q=80" alt="">
                        </div>
                    </div>
                </div>
                <div id="tb_4" class="tabs_content--item tb_4">
                    <div class="gallery_grid-4">
                        <?php
                        $_SESSION['id'] = '1';
                        $dbmng = new Profile();
                        $sq = $dbmng->GetTimeline2($_SESSION['id']);
                        if ($sq == null) {
                            echo 'お気に入りはありません';
                        } else {
                            echofunk($sq);
                        }
                        function echofunk($sq)
                        {
                            $dbmng = new Profile();
                            foreach ($sq->fetchAll() as $row) {
                                $sq2 = $dbmng->Getsubtimeline($row['css_id']);
                                $row3 = $dbmng->GetUsername($row['user_id']);
                                foreach ($sq2->fetchAll() as $row2) {
                                    echo '<div class="col-md-6">
                                        <div class="card mb-5 shadow">
                                            <img class="card-img-top"
                                                data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                                alt="Thumbnail [100%x225]" src="' . $row2['css_img'] . '" data-holder-rendered="true"
                                                style="height: 370px; width: 100%; display: block;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>' . $row3 . '</h6>
                                                    </div>
                                                    <div class="col-4">
                                                        <h6>' . $row2['css_name'] . '</h6>
                                                    </div>
                                                    <div class="col-1">
                                                    ' . $row2['css_like'] . '
                                                    </div>
                                                    <div class="col-1">
                                                      <form action="" method="post"><button type="submit" value="' . $row2['css_id'] . '" name="good" class="bi bi-hand-thumbs-up"></button></form>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="dropdown">
                                                            <button class="btn btn-while dropdown-toggle" type="button"
                                                                id="dropdownMenu2" data-bs-toggle="dropdown"
                                                                aria-expanded="false"></button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <li><button class="dropdown-item" type="button"><i
                                                                            class="bi bi-send"></i></button></li>
                                                                <li><form action="" method="post"><button class="dropdown-item" type="submit" value="' . $row2['css_id'] . '" name="star"><i
                                                                            class="bi bi-bookmark-star"></i></button><input type="hidden" name="myid" value="' . $_SESSION['id'] . '"></form></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h6>説明</h6>
                                                    <div>' . $row2['css_info'] . '</div>
                                                    <h6>HTMLコード</h6>
                                                    <div>' . htmlspecialchars($row2['css_Hcode']) . '</div>
                                                    <h6>CSSコード</h6>
                                                    <div>' . $row2['css_Ccode'] . '</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../../assets/js/vendor/holder.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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


    <svg xmlns="http://www.w3.org/2000/svg" width="208" height="225" viewBox="0 0 208 225" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;">
        <defs>
            <style type="text/css"></style>
        </defs><text x="0" y="11" style="font-weight:bold;font-size:11pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text>
    </svg>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>