<?php 

function insert($name,$email,$phone,$status){
$mysql = new mysqli("localhost","root","","practice-database-1");


$submitdata = $mysql->query("INSERT INTO tbl_practice_1(name,email,phone,status)VALUES(
    '$name',
    '$email',
    '$phone',
    '$status'
    )");
if ($submitdata){
   echo "Form submitted done";
}
else{
    echo "Form submitted not done";
}

}

function showAll(){
    $mysql = new mysqli("localhost","root","","practice-database-1");
    return $mysql->query("SELECT *FROM tbl_practice_1");


}


function delete($id){
    $mysql = new mysqli("localhost","root","","practice-database-1");
    return $mysql->query("DELETE FROM tbl_practice_1 WHERE Serial_ID = '$id'");
    
}


function find($id){
    $mysql = new mysqli("localhost","root","","practice-database-1");
    return $mysql->query("SELECT * FROM tbl_practice_1 WHERE Serial_ID = '$id'");
}
function update($all,$id){
    $name = $all['name'];
    $email = $all['email'];
    $phone = $all['phone'];
    $status = $all['status'];
    $mysql = new mysqli("localhost","root","","practice-database-1");
    return $mysql->query("UPDATE tbl_practice_1 SET name='$name',
    email='$email',
    phone='$phone',
    status= '$status' 
    WHERE Serial_ID = '$id'
    ");
}


?>