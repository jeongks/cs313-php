<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body>



	<?php

	$stmt = $db->prepare('SELECT * FROM scriptures WHERE book = :book');
	$stmt->bindValue(':book', $book, PDO::PARAM_STR);
	$stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

	echo $_SESSION['scriptures'];

	?>

</body>
</html>