<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>KameTube - Delete</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>

	<body id="top">
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="index.php">
				<img src="images/kameTubeLogo.png" width="55" height="55" alt="">
			</a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<div class="navbar-nav mr-auto">
						<a class="nav-item nav-link" href="login.php">
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

		<div id="main">
			<div class="inner">
				<div class="box">
                    <h1><a href="index.php">Homepage</a></h1>
					<div class="align-center">
                        <?php
                            include ('db.php');

                            if(isset($_POST['delete']))
                            {
                                $id = $_SESSION['id'];
                                $inputKey = $_POST['deleteKey'];

                            $sql = "select * from videos where id='$id'";
                            $res = mysqli_query($con,$sql);

                            $row = mysqli_fetch_assoc($res);

                            $name = $row['fullname'];
                            $image = $row['image'];
                            $deleteKey = $row['deleteKey'];

                            if($inputKey == $deleteKey)
                            {
                                echo "$deleteKey<br/><br/>";
                                echo "$inputKey<br/><br/>";
                                $thumbnailPath = 'thumbnails/'.$image;
                                $videoPath = 'uploads/'.$name;
                                unlink($thumbnailPath);
                                unlink($videoPath);
                                $queryDelete = mysqli_query($con, "DELETE from videos where deleteKey='$deleteKey'");
                            ?>
                            <h2>動画削除完了！</h2><hr/>
                            <div class="inner">
                            <?php
                            echo "<h3>".$name."は削除されました</h3><br/>";
                            }
                            else
                            {
                                echo "<h2>動画削除完了しませんでした！</h2><hr/>";
                                echo "Your input: ".$inputKey."<br/><br/>";
                                echo "Delete key: ".$deleteKey."<br/><br/>";
                                echo "<h3>削除キーは間違っています！</h3><br/>";
                            }
                            }
                        ?>
                        </div>
                    </div>		
				</div>
			</div>
		</div>

		<?php
			// remove all session variables
			session_unset();

			// destroy the session
			session_destroy();
        ?>	
        
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
	</body>
</html>