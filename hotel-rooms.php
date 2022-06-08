<?php include "includes/header.php";
if(!isset($_SESSION['admin'])){
    header("location:login.php");
    die();
}
?>
<?php 
    if(isset($_GET['hoteluid'])){
        $uid = $_GET['hoteluid'];
    }else{
        header("location:hotel.php");
    }
?>
<div class="wrapper ">
    <?php include "includes/sidenav.php";?>
    <div class="main-panel">
        <?php include "includes/nav.php";?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title "><?php echo $_GET['hotelname'];?> Rooms</h4>
                                <p class="card-category"> View Hotel Room Details here</p>
                                <a href="hotel.php" class="btn btn-info float-right">Back to hotels</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table"  cellspacing="0" width="100%" style="width:100%;white-space: nowrap;">
                                        <thead class=" text-primary">
                                            <th>ID</th>
                                            <th>Room Images</th>
                                            <th>Room Name</th>
                                            <th>Room Price</th>
                                            <th>Room Size</th>
                                            <th>Bed Type</th>
                                            <th>Room Information</th>
                                            <th>Room Features</th>
                                            <th>Status</th>
                                            <th>Created_at</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "select * from hotel_rooms where hotel_uid = '$uid'";
                                                $r = $conn->query($sql);
                                                while($row = mysqli_fetch_assoc($r)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td>Images</td>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['price'];?></td>
                                                <td><?php echo $row['room_size'];?></td>
                                                <td><?php echo $row['bed_type'];?></td>
                                                <td><?php echo $row['added_info'];?></td>
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
                                                <td><?php echo $row['state'];?></td>
                                                <td><?php echo $row['created_at'];?></td>
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