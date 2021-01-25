<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>KameTube Watch</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/main.css" />
        <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/videoPlayer.css" />
	</head>

	<body id="top">
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="index.php">
				<img src="images/kameTubeLogo.png" width="55" height="55" alt="">
			</a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<div class="navbar-nav mr-auto">
						<a class="nav-item nav-link active" href="login.php">
							<button class="btn btn-outline-success my-2 my-sm-0">ログイン</button>
						</a>
						<a class="nav-item nav-link" href="createAccount.php">
							<button class="btn btn-outline-success my-2 my-sm-0">アカウント登録</button>
						</a>
						<a class="nav-item nav-link" href="uploadPage.php">
							<button class="btn btn-outline-success my-2 my-sm-0">動画投稿</button>
						</a>
						<a class="nav-item nav-link" href="live.php">
							<button class="btn btn-outline-success my-2 my-sm-0">配信</button>
						</a>
				</div>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2 bg-secondary" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">探索</button>
				</form>
			</div>
        </nav>
        
        <!-- Main -->
			<div id="main">
				<div class="inner">
                    <div class="box">
                        <div class="inner">
                            <?php
                                include ('db.php');

                                if(isset($_GET['id']))
                                {
                                    $id = $_GET['id'];

                                $sql = "select * from videos where id='$id'";
                                $res = mysqli_query($con,$sql);

                                $row = mysqli_fetch_assoc($res);

                                $name = $row['fullname'];
                                $title = $row['title'];
                                $_SESSION['id']=$id;

                                echo "<p class='h3'>You are watching:<br/>".$title."</p>";

                            ?>

                                <video class="video-js vjs-default-skin" width="1280" height="720" controls autoplay data-setup='{}'>
                                    <source src="uploads/<?php echo $name; ?>" type="video/webm">
                                    <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a
                                    web browser that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank"
                                        >supports HTML5 video</a>
                                    </p>
                                </video>

                            <?php
                            }
                            ?>
                            <div class="align-left">
                                <!-- Delete form and button -->
                                <div class="form-group mb-3">
                                    <br/><p class="h4">削除・Delete video</p>
                                    <!--</form>-->
                                    <form action="delete.php" method="POST" enctype="multipart/form-data">
                                    <input name='deleteKey' type="text" class="form-control" aria-describedby="emailHelp" placeholder="削除キー入力・Enter delete key">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        削除キーは13桁の文字列
                                    </small>
                                    <input type="submit" name="delete" value="delete" class="btn btn-outline-danger">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="mailto:kisopbli6@gmail.com" class="icon fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<p class="copyright">&copy; 2020後期基礎PBLIの6班. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com/">Unsplash</a>. Videos: <a href="http://coverr.co/">Coverr</a>.</p>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
            <script src="https://vjs.zencdn.net/7.10.2/video.min.js"></script>
	</body>
</html>