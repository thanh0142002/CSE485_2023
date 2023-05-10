<?php
require_once 'student.php';
require_once 'studentDAO.php';

// Tạo đối tượng StudentDAO để lưu trữ danh sách sinh viên
$studentDAO = new StudentDAO();

// Mở file studentDAO.txt để đọc dữ liệu
$handle = fopen('student.txt', 'r');

// Đọc các dòng dữ liệu từ file và lưu vào đối tượng StudentDAO
while (($data = fgetcsv($handle)) !== false) {
  // Tạo đối tượng Student từ dữ liệu trong file
  $id = $data[0];
  $name = $data[1];
  $age = $data[2];
  $grade = $data[3];
  $student = new Student($id, $name, $age, $grade);
  
  // Thêm đối tượng Student vào đối tượng StudentDAO
  $studentDAO->create($student);
}

// Đóng file sau khi đọc xong
fclose($handle);

// Hiển thị danh sách sinh viên lên trang web
$students = $studentDAO->getAll();
?>

