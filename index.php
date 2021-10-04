<!DOCTYPE HTML>
<html>
    <head>
        <title id="t2">伺服器狀態</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <noscript>
            <link rel="stylesheet" href="assets/css/noscript.css" />
        </noscript>
		<script>

		function list_player() {
			Swal.fire({
			  title: '線上玩家清單',
			  html:
				'<?php $status = json_decode(file_get_contents('https://api.mcsrvstat.us/2/highschoolSMP.club')); foreach ($status->players->list as $player) {echo $player.'<br />';}?>',
				confirmButtonText: '關掉吧'
			  
			})
		}
		</script>
        <script>
            window.onload=function(){
				$('#status').load('status.php');
				$('#t').load('title.php');
				$('#t2').load('title.php');
            }
            
            var auto_refresh = setInterval(
            function()
            {
				$('#status').load('status.php');
				$('#t').load('title.php');
            	$('#t2').load('title.php');
            }, 10000);
            
        </script>
    </head>
    <body class="is-preload">
        <div id="wrapper">
            <header id="header">
                <div class="content">
                    <div class="inner">
                        <h1 id="t">資料獲取中，請稍候...</h1>
                        <p id="status">資料獲取中，請稍候...</p>
                    </div>
                </div>
            </header>
            <footer id="footer">
            </footer>
        </div>
        <div id="bg"></div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/browser.min.js"></script>
        <script src="assets/js/breakpoints.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>