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

    $id =$_GET['id'];
    
    $data = find($id);
    $data = $data->fetch_assoc();
   if(isset($_POST['btn'])){
    if(update($_POST,$id)){
        header('location: index.php');
    }
    else{
        echo 'data update fail';
    }
   }

?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-4 bg-red mt-5">
                    <form action="" class='p-4 border ' method='POST' >
                        <div class="form-group my-4">
                            <label for="name">Name</label>
                            <input for='name' type="text" class='form-control' value = "<?php echo $data['Name']; ?>" name="name" id="" placeholder="Enter your name">
                        </div>
                        <div class="form-group my-4">
                            <label for="email">Email</label>
                            <input for='email' type="text" class='form-control' name="email" id="" value = "<?php echo $data['Email']; ?>" placeholder="Enter your email">
                        </div>
                        <div class="form-group my-4">
                            <label for="phone">Phone</label>
                            <input for='phone' type="text" class='form-control' name="phone" id="" value = "<?php echo $data['Phone']; ?>" placeholder="Enter your phone">
                        </div>
                        <div class="form-group my-4">
                            <label for="status">Status</label>
                            <select for='status' class='form-control form-select' name="status" id="" value = "">
                                <option value=""><?php if($data['Status'] == 1){echo 'Active';}else{ echo 'Inactive';} ?></option>
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                            </select>  
                        </div>
                        <button class='btn btn-lg btn-danger' name='btn'>Update</button>
                    </form>
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