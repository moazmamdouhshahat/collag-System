<?php

include('../shared/head.php');
include('../general/connectDB.php');

// edite   

// select all doctor
$SelectD = "SELECT *FROM doctor";
$AllDoctor = mysqli_query ($connect ,$SelectD);

// select all course
$Selectc = "SELECT *FROM coures";
$AlLCourse = mysqli_query ($connect , $Selectc);

if(isset($_GET['edite'])){

    $id = $_GET['edite'];

    $Selectall="SELECT
    student.id,
    student.Name AS sname,
    student.level,
    student.GPA,
    doctor.Name AS dname,
    coures.Name AS cname
    FROM student JOIN doctor JOIN coures
    ON
    student.couresid =coures.id AND 
    student.Doctorid=doctor.id
    where student.id = $id;
    ORDER BY student.id;";
 $oneStudent = mysqli_query($connect , $Selectall);
 $row = msyqli_fetch_assoc($Studenton);
 print_r($row);
 
//     if($Studenton){

//  echo "true";

//  }

//  else{

//      echo"fales";
//  }
}

// insert new student

if (isset($_POST['Submit'])){

$sname = $_POST ['sname'];
$phone = $_POST ['phone'];
$level = $_POST ['level'];
$GPA = $_POST ['GPA'];
$Age = $_POST ['Age'];
$doctorid = $_POST ['doctorid'];
$Courseid = $_POST ['Courseid'];


// insert
$insert = "INSERT INTO student VALUES (NULL ,'$sname', $phone,'$level', $GPA, $Age, $doctorid, $Courseid)";

    $insertstudent = mysqli_query($connect , $insert); 

//  if($insertstudent){

//  echo "true";

//  }

//  else{

//      echo"fales";
//  }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/footer.css">
</head>
<body>
    
</body>
</html>


<h1 class =" text-center text-info my-4"> Add New Student </h1>
<div class="container col-6 my-5"style ="background-color:gray; color:white;">
<form method ="POST" >
  <div class="form-group">
    <label>Student Name</label>
    <input name="sname" type="text" class="form-control" >
  </div>


  <div class="form-group">
    <label>phone</label>
    <input name="phone" type="number" class="form-control" >
  </div>


  <div class="form-group">
    <label>level</label>
    <input name="level" type="text" class="form-control" >
  </div>


  <div class="form-group">
    <label>GPA</label>
    <input name="GPA" type="number" class="form-control" >
  </div>


  <div class="form-group">
    <label>Age</label>
    <input name="Age"  type="number" class="form-control" >
  </div>


  <div class="form-group">
    <label>Doctor Name</label>
    <select name="doctorid" class="form-control"> 
        <?php foreach($AllDoctor as $doctor)  {?>
     <option value="<?php echo $doctor['id']?>"> <?php echo $doctor['Name'] ?> </option>

      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label>Course Name</label>
    <select name="Courseid" class="form-control">
        <?php foreach ($AlLCourse as $cores) {?>
        <option value="<?php  echo $cores ['id'] ?>">  <?php echo $cores['Name'] ?></option>
        <?php }?>
    </select>
  </div>


  <button name="Update" type="submit" class="btn btn-primary">Update</button>
</form>





</div>




<?php


include('../shared/footer.php');
?>