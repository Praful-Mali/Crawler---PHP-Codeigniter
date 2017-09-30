
<!DOCTYPE html>
<html>
<head>
<title>Web crawler</title>
<link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>
<form method="post" action="index.php">
<p style="text-align:center;"><input type="text" name="target" class="input" /></p>
<p style="text-align:center;"><input type="submit" name="crawl" class="button" value="Submit" /></p>
</form>
</body>
</html>



<?php
include_once('simple_html_dom.php');
$html = new simple_html_dom();
if(isset($_POST['crawl'])){

include_once('simple_html_dom.php');
	
	$target_url = "https://lallabi.com";
    $crawl = $_POST['target'];
    $http = "http://";
    $https = "https://";
    if(strpos($crawl,$http)!== false || strpos($crawl,$https)!== false){
		$html->load_file($crawl);
		foreach($html->find('a') as $link)
		{
			if(strpos($link,"$crawl")!==false){
				echo "<p class='links'>".$link->href."</p>";
			}
			else if(strpos($link,"http://")!==false || strpos($link,"https://")!==false){
				echo "<p class='links'>".$link->href."</p>";
			}
			else{
				echo "<p class='links'>"."$crawl/".$link->href."</p>";
			}
		}
		foreach($html->find('img') as $img)
		{
			echo $img->src."<br />";
			echo $img."<br/>";
		}
    }
    else{
        echo "Invalid URL";
    }
}
?>