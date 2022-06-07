<?php include "includes/header.php";
if(!isset($_SESSION['admin'])){
    header("location:login.php");
    die();
}
?>
<?php 
    if(isset($_GET['deletehotel'])){
        $id = $_GET['deletehotel'];
        $sql = "delete from hotels where id = '$id'";
        $r = $conn->query($sql);
        if($r){
            $_SESSION['h_delete_success'] = "Hotel Deleted Successfully";
            header("location: hotel.php");
            die();
        }else{
            $_SESSION['h_delete_error'] = "Unable to delete Hotel";
        }
    }
?>
<div class="wrapper ">
    <?php include "includes/sidenav.php";?>
    <div class="main-panel">
        <?php include "includes/nav.php";?>
        <div class="content">
            <div class="container-fluid">
            <?php if(isset($_SESSION['h_delete_success'])){?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['h_delete_success'];?>
                </div>
            <?php }unset($_SESSION['h_delete_success']);?>
            <?php if(isset($_SESSION['h_delete_error'])){?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['h_delete_error'];?>
                </div>
            <?php }unset($_SESSION['h_delete_error']);?>
            <?php if(isset($_SESSION['h_add_success'])){?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['h_add_success'];?>
                </div>
            <?php }unset($_SESSION['h_add_success']);?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Hotels</h4>
                                <p class="card-category"> Manage Hotels here</p>
                                <div class="float-right"><a href="add-hotel.php" class="btn btn-block btn-secondary">Add Hotel</a></div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table"  cellspacing="0" width="100%" style="width:100%;white-space: nowrap;">
                                        <thead class=" text-primary">
                                            <th>ID</th>
                                            <th>Manager Details</th>
                                            <th>Hotel Name</th>
                                            <th>Hotel Description</th>
                                            <th>Hotel Features</th>
                                            <th>Hotel Images</th>
                                            <th>Created_at</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "select * from hotels";
                                                $r = $conn->query($sql);
                                                while($row = mysqli_fetch_assoc($r)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td class="text-center">
                                                    <?php 
                                                    $sqll = "select * from managers";
                                                    $rr = $conn->query($sqll);
                                                    while($roww = mysqli_fetch_assoc($rr)){
                                                    ?>
                                                    <img src="https://apis.raklissd.com/data/images/manager_avatars/<?php echo $roww['avatar'];?>" alt="avatar not uploaded" width="75" height="75" style="border-radius:50%;">
                                                    <p class="mb-0 pb-0"><?php echo $roww['full_name'];?></p>
                                                    <p class="mt-0 pt-0"><?php echo $roww['Email'];?></p>
                                                    <?php }?>
                                                </td>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['description'];?></td>
                                                <td>
                                                    <p class="m-0 p-0"> Flat Screen
                                                        <?php if($row['flat_screen'] == 1){?>
                                                        <span><i class="material-icons text-success">done</i></span>
                                                        <?php }else{?>
                                                        <span><i class="material-icons text-danger">close</i></span>
                                                        <?php }?>
                                                    </p>
                                                    <p class="m-0 p-0"> City View
                                                        <?php if($row['city_view'] == 1){?>
                                                        <span><i class="material-icons text-success">done</i></span>
                                                        <?php }else{?>
                                                        <span><i class="material-icons text-danger">close</i></span>
                                                        <?php }?>
                                                    </p>
                                                    <p class="m-0 p-0"> Bathtub
                                                        <?php if($row['bathtub'] == 1){?>
                                                        <span><i class="material-icons text-success">done</i></span>
                                                        <?php }else{?>
                                                        <span><i class="material-icons text-danger">close</i></span>
                                                        <?php }?>
                                                    </p>
                                                    <p class="m-0 p-0"> Free Wifi
                                                        <?php if($row['free_wifi'] == 1){?>
                                                        <span><i class="material-icons text-success">done</i></span>
                                                        <?php }else{?>
                                                        <span><i class="material-icons text-danger">close</i></span>
                                                        <?php }?>
                                                    </p>
                                                    <p class="m-0 p-0"> Gym
                                                        <?php if($row['gym'] == 1){?>
                                                        <span><i class="material-icons text-success">done</i></span>
                                                        <?php }else{?>
                                                        <span><i class="material-icons text-danger">close</i></span>
                                                        <?php }?>
                                                    </p>
                                                    <p class="m-0 p-0"> Breakfast
                                                        <?php if($row['breakfast'] == 1){?>
                                                        <span><i class="material-icons text-success">done</i></span>
                                                        <?php }else{?>
                                                        <span><i class="material-icons text-danger">close</i></span>
                                                        <?php }?>
                                                    </p>
                                                    <p class="m-0 p-0"> Kitchenette
                                                        <?php if($row['kitchenette'] == 1){?>
                                                        <span><i class="material-icons text-success">done</i></span>
                                                        <?php }else{?>
                                                        <span><i class="material-icons text-danger">close</i></span>
                                                        <?php }?>
                                                    </p>
                                                    <p class="m-0 p-0"> Beach View
                                                        <?php if($row['beach_view'] == 1){?>
                                                        <span><i class="material-icons text-success">done</i></span>
                                                        <?php }else{?>
                                                        <span><i class="material-icons text-danger">close</i></span>
                                                        <?php }?>
                                                    </p>
                                                </td>
                                                <td><?php echo $row['created_at'];?></td>
                                                <td><?php echo $row['created_at'];?></td>
                                                <td>
                                                    <a href="?deletehotel=<?php echo $row['id'];?>" onclick="alert('Are You Sure?')">
                                                    <button type="button" data-toggle="tooltip" class="btn btn-danger btn-round" data-original-title="" title="">
                                                    <i class="material-icons">close</i>
                                                    </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "includes/footer.php";?>