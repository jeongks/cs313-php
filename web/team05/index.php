<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="UTF-8">
	<title>Connecting to db practice</title>
</head>
<body>


	<form method="post" action="#">
		Book: <input type="text" name="book">
		<input type="submit" name="submit">
	</form>

	<?php
	try
	{
		$book = $_POST['book'];
		$user = 'postgres';
		$password = 'password';
		$db = new PDO('pgsql:host=localhost;dbname=mydb', $user, $password);

		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $ex)
	{
		echo 'ERROR!: ' . $ex->getMessage();
		die();
	}

	$stmt = $db->prepare('SELECT * FROM scriptures WHERE book = :book');
	$stmt->bindValue(':book', $book, PDO::PARAM_STR);
	$stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$scriptureIds = array();
	
	foreach ($rows as $row)
	{
		array_push($scriptureIds, $row['id']);
		
		echo '<p><a href="scriptureDetails.php" id="' . $row['id'] . '"><strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong>' . '</a></p>';

	}

	$_SESSION['scriptures'] = '<script>elementId</script>';
	$_SESSION['rows'] = $rows;

	echo $_SESSION['scriptures'];


	

	// / while ($row = $rows = $stmt->fetchAll(PDO::FETCH_ASSOC))
	// // {

	// // 	echo '<p><strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong>—' . $row['content'] . '</p>';
	// // }
	// // foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
	// // {
	// // 	echo '<p><strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong>—' . $row['content'] . '</p>';
	// // } /
		
	?>

	<script>
		$("a").on("click", function (e) {

		    // Id of the element that was clicked
		    var elementId = $(this).attr("id");
		    <?php $_SESSION['scriptures'] = '<script>elementId</script>'; ?>
		});
	</script>

</body>
</html>