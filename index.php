<?php

include_once("connect.php");


$result = mysqli_query($mysqli, "SELECT * FROM datas ORDER BY id DESC"); 
?>

<html>
<head>	
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YDC</title>
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
</head>

<body>
<div class="container">
<h1 class="B">รถยนต์ในฝัน</h1>

	<table>
	<thead>
		<tr>
		<th>ชื่อยี่ห้อ</th>
		<th>ชื่อรุ่น</th>
		<th>เครื่องยนต์</th>
        <th>ระบบขับเคลื่อน</th>
        <th>สีรถ</th>
		<th>แก้ไขข้อมูล</th>
		</tr>
		</thead>
	
	<tbody>
	<?php 
	
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['car']."</td>";
		echo "<td>".$res['model']."</td>";
        echo "<td>".$res['engine']."</td>";	
        echo "<td>".$res['wheel']."</td>";

        echo "<td><div style='height: 15px; border-radius: 20px; border: 3px solid #ffffff; background-color: ".$res['color']."; '></div></td>";

		echo "<td><a class='b1' href=\"edit.php?id=$res[id]\">Edit</a> | <a class='b2' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</tbody>
	</table>
	<a class="A"  href="add.php">เพิ่มข้อมูล</a>
	</div>
</body>
</html>
