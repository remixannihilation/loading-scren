<html>
  <head>
    <title> Loading... </title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script type="text/javascript" src="config/config.js"></script>
    
<?php
		require 'config/config.php';
		
		if(isset($_GET["id"])) {
	    $apikey = $config["steaminfo"]["apikey"];
		$steamid = $_GET["id"];
		$response = file_get_contents("http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=A377E5C2A556E4FDB059D470825CCD8F".$apikey."&steamids=".$steamid);
		$json = json_decode($response, true);
		$avatarurl = $json["response"]["players"][0]["avatarfull"];
		$playername = $json["response"]["players"][0]["personaname"];


		$alpha = bcsub($steamid, '76561197960265728') & 1;
		$steamid2 = (bcsub($steamid, '76561197960265728')-$alpha)/2;
		$steamid3 = "STEAM_0:$alpha:$steamid2";}
		
		if($config["themecolour"] == 1) {
			$headerimage = "images/b_bar1.png";
			$footerimage = "images/b_bar2.png";
			$loadingimage = "images/loader_blue.gif";
			echo '<style> #header { background-image: url('.$headerimage.'); }</style>';
			echo '<style> #footer { background-image: url('.$footerimage.'); }</style>';
			echo '<style> #headertext { color:3492CE; text-shadow:0 0 10px 3492CE; }</style>';
			echo '<style> .usertext { color:3492CE; text-shadow:0 0 10px 3492CE; }</style>';
			echo '<style> .meter > span {
			background-color: #3492CE;
			background-image: -moz-linear-gradient(top, #3492CE, #207EBA);
			background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #3492CE),color-stop(1, #207EBA));
			background-image: -webkit-linear-gradient(#3492CE, #207EBAA);
		}</style>';
		}elseif($config["themecolour"] == 2) {
			$headerimage = "images/g_bar1.png";
			$footerimage = "images/g_bar2.png";
			$loadingimage = "images/loader_green.gif";
			echo '<style> #header { background-image: url('.$headerimage.'); }</style>';
			echo '<style> #footer { background-image: url('.$footerimage.'); }</style>';
			echo '<style> #headertext { color:6FDA4A; text-shadow:0 0 10px 6FDA4A; }</style>';
			echo '<style> .usertext { color:6FDA4A; text-shadow:0 0 10px 6FDA4A; }</style>';
		}elseif($config["themecolour"] == 3) {
			$headerimage = "images/p_bar1.png";
			$footerimage = "images/p_bar2.png";
			$loadingimage = "images/loader_pink.gif";
			echo '<style> #header { background-image: url('.$headerimage.'); }</style>';
			echo '<style> #footer { background-image: url('.$footerimage.'); }</style>';
			echo '<style> #headertext { color:#ED97DE; text-shadow:0 0 10px #ED97DE; }</style>';
			echo '<style> .usertext { color:#ED97DE; text-shadow:0 0 10px #ED97DE; }</style>';
			echo '<style> .meter > span {
			background-color: #ED97DE;
			background-image: -moz-linear-gradient(top, #ED97DE, #D983CA);
			background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #ED97DE),color-stop(1, #D983CA));
			background-image: -webkit-linear-gradient(#ED97DE, #D983CA);
		}</style>';
		}elseif($config["themecolour"] == 4) {
			$headerimage = "images/r_bar1.png";
			$footerimage = "images/r_bar2.png";
			$loadingimage = "images/loader_red.gif";
			echo '<style> #header { background-image: url('.$headerimage.'); }</style>';
			echo '<style> #footer { background-image: url('.$footerimage.'); }</style>';
			echo '<style> #headertext { color:CE3434; text-shadow:0 0 10px CE3434; }</style>';
			echo '<style> .usertext { color:CE3434; text-shadow:0 0 10px CE3434; }</style>';
			echo '<style> .meter > span {
			background-color: #f0a3a3;
			background-image: -moz-linear-gradient(top, #f0a3a3, #f42323);
			background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #f0a3a3),color-stop(1, #f42323));
			background-image: -webkit-linear-gradient(#f0a3a3, #f42323);
		}</style>';
		}elseif($config["themecolour"] == 5) {
			$headerimage = "images/o_bar1.png";
			$footerimage = "images/o_bar2.png";
			$loadingimage = "images/loader_orange.gif";
			echo '<style> #header { background-image: url('.$headerimage.'); }</style>';
			echo '<style> #footer { background-image: url('.$footerimage.'); }</style>';
			echo '<style> #headertext { color:FF9000; text-shadow:0 0 10px FF9000; }</style>';
			echo '<style> .usertext { color:FF9000; text-shadow:0 0 10px FF9000; }</style>';
			echo '<style> .meter > span {
			background-color: #f1a165;
			background-image: -moz-linear-gradient(top, #f1a165, #f36d0a);
			background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #f1a165),color-stop(1, #f36d0a));
			background-image: -webkit-linear-gradient(#f1a165, #f36d0a); 
		}</style';
		}
?>

  </head>
  
  <body>
  <img id="background" src="images/image_background.png" />
    <div id="header">
      <p id="headertext"><?php echo $config["headertext"]["text"]; ?></p>
    </div>
    <br>
    <div id="vid">
      <iframe style="margin:0;" id="video" src="" frameborder="0" allowfullscreen></iframe>
    </div>
    <div id="logocontainer" class="fadeIn">
      <img id="logo" src="<?php echo $config["logo"]; ?>" />
      <p id="hint">
      </span>
  </div>
</div>
<div id="mainfooter">
  <div id="footer2" class="fadeIn">
    <div id="pavatarbox">
      <img id="pavatar" src="<?php if(isset($_GET["id"])){ echo htmlspecialchars($avatarurl); }?>">
                  </div>
                  <span id="welcome">
                    Welcome, 
                    <span class="usertext">
                      <?php if(isset($_GET["id"])){ echo htmlspecialchars($playername); } else { echo "Unknown Guy"; } ?>
                    </span>
                  </span>
                  <div id="filescontainer">
                  <span id="downloaded"></span>
                  <span id="todownload"></span>
                  <div id="files">
                    <div class="meter">
						<span style="width: 100%"></span>
					</div>
                  </div>
                  <div id="loadingtextcontainer">
                  	<span id="loadingtext" align="center"></span>
                  </div>
                  </div>
              </div>
              <div id="footer">
                <p id="footertext"><?php echo $config["footertext"]["text"]; ?></p>
              </div>
</body>
</html>