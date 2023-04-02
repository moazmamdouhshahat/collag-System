<?php

include('../shared/head.php');
include('../general/connectDB.php');


// select
$Select="SELECT
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
           ORDER BY student.id;
           ";
$allStudent=mysqli_query($connect , $Select);

// =============================== delete student ============

if (isset($_GET['delete'])){
  $id = $_GET['delete'];
  $delete = " DELETE FROM student WHERE id = $id";
  $deleteStatus = mysqli_query($connect , $delete);
  header("location:http://localhost/projectall/system_colleg/student/list.php");
//    if($deleteStatus){

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


<table class="table" style="background-color:gray; color-white">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">level</th>
      <th scope="col">GPA</th>
      <th scope="col">Doctor Name</th>
      <th scope="col">Coures Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($allStudent as $key => $student){ ?>
    <tr>
      <th scope="row"><?php  echo $key+1 ?></th>
      <td><?php   echo $student ['sname'] ?></td>
      <td><?php echo $student ['level'] ?></td>
      <td><?php echo $student ['GPA']?></td>
      <td><?php echo $student ['dname']?></td>
      <td><?php echo $student ['cname']?></td>
      <td>
        <a href="http://localhost/projectall/system_colleg/student/list.php/?delete=<?php echo $student['id'] ?>"> <button class="" style="border-radius: 3px solid black;">Delete</button></a>
        <a href="http://localhost/projectall/system_colleg/student/edite.php/?edite=<?php echo $student['id'] ?>"> <button class="" style="border-radius: 3px solid black;">Edite</button></a>
      </td>
    </tr>  
    <?php }?>
  </tbody>
</table>




















<?php


include('../shared/footer.php');
?>