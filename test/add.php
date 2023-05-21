<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name1']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age1']);
	$matricula = mysqli_real_escape_string($mysqli, $_POST['matricula1']);
	$name2 = mysqli_real_escape_string($mysqli, $_POST['name2']);
	$age2 = mysqli_real_escape_string($mysqli, $_POST['age2']);
	$matricula2 = mysqli_real_escape_string($mysqli, $_POST['matricula2']);
	$name3 = mysqli_real_escape_string($mysqli, $_POST['name3']);
	$age3 = mysqli_real_escape_string($mysqli, $_POST['age3']);
	$matricula3 = mysqli_real_escape_string($mysqli, $_POST['matricula3']);
	$name4 = mysqli_real_escape_string($mysqli, $_POST['name4']);
	$age4 = mysqli_real_escape_string($mysqli, $_POST['age4']);
	$matricula4 = mysqli_real_escape_string($mysqli, $_POST['matricula4']);

		
	// checking empty fields
	if(empty($name) || empty($age) || empty($matricula)) {
				
		if(empty($name)) {
			echo "<font color='red'> Nome do aluno 1 esta vazio.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Idade do aluno 1 esta vazio.</font><br/>";
		}
		
		if(empty($matricula)) {
			echo "<font color='red'>Matriculado aluno 1 esta vazio.</font><br/>";
		}
			//link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}elseif(empty($name2) || empty($age2) || empty($matricula2)) {

		if(empty($name2)) {
			echo "<font color='red'> Nome do aluno 2 esta vazio.</font><br/>";
		}
		
		if(empty($age2)) {
			echo "<font color='red'>Idade do aluno 2 esta vazio.</font><br/>";
		}
		
		if(empty($matricula2)) {
			echo "<font color='red'>Matriculado aluno 2 esta vazio.</font><br/>";
		}
		
			//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}elseif(empty($name3) || empty($age3) || empty($matricula3)) {

	if(empty($name3)) {
		echo "<font color='red'> Nome do aluno 3 esta vazio.</font><br/>";
	}
	
	if(empty($age3)) {
		echo "<font color='red'>Idade do aluno 3 esta vazio.</font><br/>";
	}
	
	if(empty($matricula3)) {
		echo "<font color='red'>Matriculado aluno 3 esta vazio.</font><br/>";
	}
	
		//link to the previous page
	echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";

	}elseif(empty($name4) || empty($age4) || empty($matricula4)) {

		if(empty($name4)) {
			echo "<font color='red'> Nome do aluno 4 esta vazio.</font><br/>";
		}
		
		if(empty($age4)) {
			echo "<font color='red'>Idade do aluno 4 esta vazio.</font><br/>";
		}
		
		if(empty($matricula4)) {
			echo "<font color='red'>Matriculado aluno 4 esta vazio.</font><br/>";
		}
		
			//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";

	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,matricula) VALUES('$name','$age','$matricula')");
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,matricula) VALUES('$name2','$age2','$matricula2')");
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,matricula) VALUES('$name3','$age3','$matricula3')");
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,matricula) VALUES('$name4','$age4','$matricula4')");
		
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}

}
?>
</body>
</html>
