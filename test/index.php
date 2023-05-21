<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysqli_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT `id`, `name`, `age`, `matricula` FROM `users` WHERE 1");
// using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Nome</td>
		<td>Idade</td>
		<td>Matricula</td>
		<td>Update</td>
	</tr>

	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['age']."</td>";
		echo "<td>".$res['matricula']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		
		echo "</tr>";
	}
	?>
	</table>
	<div>
			<button onclick="window.location.href='config.php?order=name'">Ordem de nome</button>
			<button onclick="window.location.href='config.php?order=matricula'">Ordem de matrícula</button>
			<button onclick="window.location.href='config.php?order=cadastro'">Ordem de chegada</button>
			<button onclick="window.location.href='config.php?order=sobrenome'">Sobrenome</button>
		</div>
	</form>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#sort-button").click(function(){
				$.ajax({
					url: "sort.php",
					type: "GET",
					success: function(data) {
						$("#data-table tbody").html(data);
					}
				});
			});
		});
	</script>
	</table>

			
</body>
</html>
