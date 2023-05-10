<?php
require_once 'student.php';
require_once 'studentDAO.php';

// Kiểm tra xem có dữ liệu được gửi đi từ form hay không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Lấy dữ liệu từ form
  $id = $_POST['id'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $grade = $_POST['grade'];

  // Mở file studentDAO.txt để đọc dữ liệu
  $handle = fopen('student.txt', 'r');
  $studentDAO = new StudentDAO();
  // Đọc các dòng dữ liệu từ file và lưu vào đối tượng StudentDAO
  while (($data = fgetcsv($handle)) !== false) {
    // Tạo đối tượng Student từ dữ liệu trong file
    $student = new Student($data[0], $data[1], $data[2], $data[3]);

    // Thêm đối tượng Student vào đối tượng StudentDAO
    $studentDAO->create($student);
  }

  // Đóng file sau khi đọc xong
  fclose($handle);

  // Kiểm tra trùng lặp với sinh viên có cùng ID
  if ($studentDAO->getById($id) == null) {
    // Tạo đối tượng Student từ dữ liệu trong form
    $student = new Student($id, $name, $age, $grade);
  
    // Thêm đối tượng Student mới vào đối tượng StudentDAO
    $studentDAO = new StudentDAO();
    $studentDAO->create($student);

    // Lưu danh sách sinh viên vào file student.txt
    $students = $studentDAO->getAll();
    $file = fopen('student.txt', 'a');
    foreach ($students as $student) {
      fwrite($file, $student->getId() . ',' . $student->getName() . ',' . $student->getAge() . ',' . $student->getGrade() . PHP_EOL);
    }
    fclose($file);

    // Chuyển hướng về trang danh sách sinh viên
    header('Location: index.php');
    setcookie("validate", '', time()-3600);
    setcookie("id", '', time()-3600);
    setcookie("name", '', time()-3600);
    setcookie("age", '', time()-3600);
    setcookie("grade", '', time()-3600);
    exit();
  } else {
    setcookie("validate", 'exists', time()+3600);
    setcookie("id", $id, time()+3600);
    setcookie("name", $name, time()+3600);
    setcookie("age", $age, time()+3600);
    setcookie("grade", $grade, time()+3600);
    header('Location: add_student.php');
    //echo '<p style="color: red;">Student ID already exists!</p>';
  }
}
?>


