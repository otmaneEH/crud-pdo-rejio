<?php 
  	// Includs database connection
	include "db.php";
	//get PERSONNEs:
	$res = $db->prepare("SELECT * FROM article order by `date` desc");
	$res->execute();
	$results = $res->fetchAll();

	// check for last visit
	$last_visit = 0;
	if(isset($_COOKIE['last_visit'])){
		$last_visit = $_COOKIE['last_visit'];
	}
	// get readed list
	if(isset($_COOKIE['readed_list'])) {
		$r_list = unserialize($_COOKIE['readed_list']);
	}
	else
		$r_list = array();

	// define style for articles
	foreach ($results as $key => $item) {
		// check for new
		if(strtotime($item['date']) > $last_visit)
			$results[$key]['style'] = 'new';
		// is already readed
		else if(in_array($item['id'], $r_list))
			$results[$key]['style'] = 'readed';
		// not new and not readed
		else
			$results[$key]['style'] = 'default';
	}

	
	// set last visit cookie
	setcookie('last_visit', time(), time()+3600*24*60);

?>
<html>
<head>
	<title></title>
	<style>
		.readed {
			background: #8080809c;
			border-radius: 1em;
		}
		.new {
			background: yellow;
			border-radius: 1em;
		}
		.default {
			color: red;

		}
		ul{
			list-style: none;
		}
	</style>
</head>
<body>
	<h1 style="text-align: center; background-color: #dcedc8; padding: 50px;">
		Site des news articles
	</h1>
	<h2 style="text-align: center; color: #78909C;">Les articles :</h2>
	<hr style="width: 120px;">
	<ul>
		<?php foreach ($results as $article) { ?>
			<li style="padding: 15px; margin-bottom: 5px"  class="<?php echo $article['style'] ?>">
				<a href="articleView.php?id=<?php echo $article['id'] ?>">
					<h2 style=""><?php echo $article['titre'] ?></h2>
				</a>
				
				<span><?php echo $article['contenue'] ?></span>
				<span><?php echo $article['date'] ?></span>
			</li>
		<?php } ?>
	</ul>
	<hr>
	<h2 >
		<a href="insertNews.php"> Creé un nouvel article now!</a>
	</h2>
</body>
</html>