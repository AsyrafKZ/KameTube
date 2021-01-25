<!DOCTYPE HTML>
<html>
	<head>
		<title>KameTube - Upload</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/main.css" />

        <style>
            .thumbnail{
                width: 600px;
                min-height: 300px;
                border: 2px solid #dddddd;
                margin-top:15px;
                margin-bottom: 15px;

                display: flex;
                align-items:center;
                justify-content: center;
                font-weight: bold;
                color: #cccccc;
            }
            .thumbnail__image{
                display: none;
                width: 100%;
            }
        </style>
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

	<body id="top">
		<div id="main">
			<div class="inner">
				<div class="box">
					<div class="inner">
						<h2>動画投稿</h2><hr/>
						<div class="align-left">
							<!-- title -->
								<div class="form-group mb-3">
									<p class="h3">タイトル</p>
									<!--</form>-->
									<form action="upload.php" method="POST" enctype="multipart/form-data">
									<input name='title' type="text" class="form-control" aria-describedby="emailHelp" placeholder="動画タイトル入力">
									<small id="passwordHelpBlock" class="form-text text-muted">
										タイトルの長さは20文字以内にしてください。
									</small>
								</div>
								<!-- file selection -->
								<div class="input-group mb-3">
									<p class="h3">動画選択</p>
									<input type="file" name="file" class="form-control-file" id="file" accept="video/*">
								</div>
								<!-- thumbnail -->
								<div class="input-group mb-3">
									<p class="h3">サムネイル変更</p><br/>
									<input type="file" name="inpFile" id="inpFile" class="form-control-file" id="exampleFormControlFile1">
								</div>
								<div class="thumbnail" id="thumbnail">
									<img src="" alt="サムネイル" class="thumbnail__image">
									<span class="thumbnail__default-text">サムネイル</span>
								</div>
								<!-- video edit button -->
								<button class="btn btn-outline-success my-2 my-sm-0">動画編集</button>
								<!-- upload/cancel -->
								<div class="align-right">
									<a href="index.php">
										<button type="button" class="btn btn-outline-danger">キャンセル</button>
									</a>
									<button type="submit" name="submit" value="Upload" class="btn btn-primary">投稿</button>
								</form>	
								</div>
						</div>
					</div>		
				</div>
			</div>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
            <script>
				// user-input thumbnail
				const inpFile = document.getElementById("inpFile");
				// automatically generated thumbnail
				const generatedThumbnail = document.getElementById("file"); 

                const thumbnailContainer = document.getElementById("thumbnail");
                const thumbnail = thumbnailContainer.querySelector(".thumbnail__image");
                const thumbnailDefaultText = thumbnailContainer.querySelector(".thumbnail__default-text");

                inpFile.addEventListener("change", function()
                {
                    const file = this.files[0];

                    if (file)
                    {
                        const reader = new FileReader();

                        thumbnailDefaultText.style.display = "none";
                        thumbnail.style.display = "block"; // show the image
                        reader.addEventListener("load", function()
                        {
                            console.log(this);
                            thumbnail.setAttribute("src", this.result);
                        });

                        reader.readAsDataURL(file);
                    }
                    else
                    {
                        thumbnailDefaultText.style.display = null;
                        thumbnail.style.display = null; // back to css setting
                        thumbnail.setAttribute("src", "");
                    }
				});
            </script>
	</body>
</html>