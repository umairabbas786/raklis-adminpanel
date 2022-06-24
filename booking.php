<?php include "includes/header.php";
if(!isset($_SESSION['admin'])){
    header("location:login.php");
    die();
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
                                <h4 class="card-title ">Bookings</h4>
                                <p class="card-category">View Hotel Room Bookings here</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table"  cellspacing="0" width="100%" style="width:100%;white-space: nowrap;">
                                        <thead class=" text-primary">
                                            <th>ID</th>
                                            <th class="text-center">User Details</th>
                                            <th class="text-center">Room Details</th>
                                            <th>Check In Date</th>
                                            <th>Check Out Date</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Created_at</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "select * from reservations";
                                                $r = $conn->query($sql);
                                                while($row = mysqli_fetch_assoc($r)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td class="text-center">
                                                    <?php 
                                                    $uuid = $row['user_uid'];
                                                    $sqll = "select * from users where uid = '$uuid'";
                                                    $rr = $conn->query($sqll);
                                                    while($roww = mysqli_fetch_assoc($rr)){
                                                    ?>
                                                    <img src="https://apis.raklissd.com/data/images/user_avatars/<?php echo $roww['avatar'];?>" alt="avatar not uploaded" width="75" height="75" style="border-radius:50%;">
                                                    <p class="mb-0 pb-0"><?php echo $roww['full_name'];?></p>
                                                    <p class="mt-0 pt-0"><?php echo $roww['Email'];?></p>
                                                    <?php }?>
                                                </td>
                                                <td class="text-center">
                                                    <?php 
                                                    $ruid = $row['hotel_room_uid'];
                                                    $sqlll = "select * from hotel_rooms where uid = '$ruid'";
                                                    $rrr = $conn->query($sqlll);
                                                    while($rowww = mysqli_fetch_assoc($rrr)){
                                                    ?>
                                                    <p class="mb-0 pb-0"><b><?php echo $rowww['name'];?></b></p>
                                                    <p class="mt-0 pt-0"><?php echo $rowww['added_info'];?></p>
                                                    <?php }?>
                                                </td>
                                                <td><?php echo $row['check_in_date'];?></td>
                                                <td><?php echo $row['check_out_date'];?></td>
                                                <td><?php echo $row['total'];?></td>
                                                <td><button class="btn btn-primary"><?php echo $row['state'];?></button></td>
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