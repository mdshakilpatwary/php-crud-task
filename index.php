<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">



</head>
<body>



<?php

include 'Classes.php';
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];

if ($name === ''){
    echo 'name fild is empty';

}
else if ($email === ''){
    echo 'email fild is empty';

}
else if ($phone ===''){
    echo 'phone fild is empty';

}
else if ($status == 0){
    echo 'status fild is empty';

}
else{
    insert($name,$email,$phone,$status);
}
}

if(isset($_GET['id'])){
        $id = $_GET['id'];
        $doneMsg= delete($id);
        if($doneMsg){
           
            header('location: index.php');
        }
        else{
            echo 'Data delete successfully not done';
        }
}

?>
    <section>
	<h2></h2>
        <div class="container">
            <div class="row">
                <div class="col-md-4 bg-red mt-5">
                    <form action="" class='p-4 border ' method='POST' >
                        <div class="form-group my-4">
                            <label for="name">Name</label>
                            <input for='name' type="text" class='form-control' value = "<?php if(isset($_POST['btn'])){
                                echo $_POST['name'] ;
                            }?>" name="name" id="" placeholder="Enter your name">
                        </div>
                        <div class="form-group my-4">
                            <label for="email">Email</label>
                            <input for='email' type="text" class='form-control' name="email" id="" value = "<?php if(isset($_POST['btn'])){
                                echo $_POST['email'] ;
                            }?>" placeholder="Enter your email">
                        </div>
                        <div class="form-group my-4">
                            <label for="phone">Phone</label>
                            <input for='phone' type="text" class='form-control' name="phone" id="" value = "<?php if(isset($_POST['btn'])){
                                echo $_POST['phone'] ;
                            }?>" placeholder="Enter your phone">
                        </div>
                        <div class="form-group my-4">
                            <label for="status">Status</label>
                            <select for='status' class='form-control form-select' name="status" id="" value = "<?php if(isset($_POST['btn'])){
                                echo $_POST['status'] ;
                            }?>">
                                <option value="0">-----Select</option>
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                            </select>  
                        </div>
                        <button class='btn btn-lg btn-danger' name='btn'>Submit</button>
                    </form>
                </div>
                <div class="col-md-8 mt-5">
                    <table class='table' border ='1' id='myTable'>
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            
                             $data = showAll();
                             if($data->num_rows >0){
                                $sl = 1;
                                
                                while($arrayData = $data->fetch_assoc()){ ?>
                               
                                    <tr>
                                     <td><?php echo $sl ?></td>
                                     <td><?php echo $arrayData['Name'] ?></td>
                                     <td><?php echo $arrayData['Email'] ?></td>
                                     <td><?php echo $arrayData['Phone'] ?></td>
                                     <td><?php if ($arrayData['Status'] == 1){ echo "<P class=' bg-primary text-white p-1'>Active</P>";} else{ echo "<P class=' bg-warning text-white p-1'>Inactive</P>";} ?></td>
                                     <td>
                                        <a href="edit.php?id=<?php echo $arrayData['Serial_ID']?>" class='btn btn-sm btn-info'> <i class='fa fa-edit'></i></a>
                                        
                                        <button data-bs-toggle="modal" data-bs-target="#delete<?php echo $arrayData['Serial_ID']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                     </td>
                                    </tr>

     
                                <!-- Modal -->
<div class="modal fade" id="delete<?php echo $arrayData['Serial_ID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation messege!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Are you sure delete this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
        <a href="index.php?id=<?php echo $arrayData['Serial_ID']?>" class='btn btn-lm btn-danger'>Yes</a>
      </div>
    </div>
  </div>
</div>
                                 <?php 
                                 $sl++;
                                 }
                                 ?>
                            <?php
                            
                             }
                             
                             else{?>
                                <tr>
                                <td colspan='6' class='text-center bg-danger text-white'>Data sheed is empty</td>
                            </tr>
                            <?php
                             }
                            ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>



    






<script src="jquery.js"></script>
<script src="https:///cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    let table = new DataTable('#myTable');
</script>

</body>
</html>