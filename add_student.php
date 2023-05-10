<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên mới</title>
   
</head>
<body>
<?php
    if(isset($_COOKIE['validate']) && $_COOKIE['validate'] == 'exists') {
       $validate = true;
       $id = isset($_COOKIE['id']) ? $_COOKIE['id'] : '' ;
       $name = isset($_COOKIE['name']) ? $_COOKIE['name'] : '' ;
       $age = isset($_COOKIE['age']) ? $_COOKIE['age'] : '' ;
       $grade = isset($_COOKIE['grade']) ? $_COOKIE['grade'] : '' ;
    } else {
        $validate = false;
        $id = '' ;
        $name = '' ;
        $age = '' ;
        $grade = '' ;
    }

?>
    <h1 style="text-align: center;">Thêm sinh viên mới</h1>
    <form style=" display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 50%;
  margin: 0 auto;" method="post" action="save_file.php">
    <div>
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" value="<?= $id ?>" required>
        <?php
            if($validate){
                echo '<p style="color: red;">Student ID already exists!</p>';
            }
        ?>
    </div>
    <br>
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $name ?>" required>
    </div>
    <br>
    <div>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?= $age ?>" required>
    </div>
    <br>
    <div>
        <label for="grade">Grade:</label>
        <input type="text" id="grade" name="grade" value="<?= $grade?>" required>
    </div>
    <br>
    <button style="padding: 0.5em;" type="submit">Save</button>
        <a style="padding: 0.5em;" href="index.php">
        <button type="button">
           Exit
        </button>
        </a>
    </form>
</body>
</html>