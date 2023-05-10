<?php
include_once "read_file.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Document</title>
</head>
<body style=" display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 50%;
  margin: 0 auto;" >
    <h1 style="text-align: center;">Danh sách sinh viên</h1>
    <table  >
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Grade</th>
        </tr>
        <?php
        foreach( $students as $student){
        ?>
        <tr>
            <td style="width:100px; text-align: center;"><?=$student->getId()?></td>
            <td style="width:250px; text-align: center;"><?=$student->getName()?></td>
            <td style="width:150px; text-align: center;"><?=$student->getAge()?></td>
            <td style="width:150px; text-align: center;"><?=$student->getGrade()?></td>
        </tr>
        <?php 
        }
        ?>
    </table>
    <a style="margin :20px;padding: 0.5em;" href="add_student.php"><button >Add Student </button></a>
</body>
</html>