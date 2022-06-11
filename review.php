<?php include "includes/header.php";
if(!isset($_SESSION['admin'])){
    header("location:login.php");
    die();
}
?>
<?php 
    if(isset($_GET['deletereview'])){
        $id = $_GET['deletereview'];
        $sql = "delete from reviews where id = '$id'";
        $r = $conn->query($sql);
        if($r){
            $_SESSION['r_delete_success'] = "Review Deleted Successfully";
            header("location: review.php");
            die();
        }else{
            $_SESSION['r_delete_error'] = "Unable to delete Review";
        }
    }
?>
<div class="wrapper ">
    <?php include "includes/sidenav.php";?>
    <div class="main-panel">
        <?php include "includes/nav.php";?>
        <div class="content">
            <div class="container-fluid">
            <?php if(isset($_SESSION['r_delete_success'])){?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['r_delete_success'];?>
                </div>
            <?php }unset($_SESSION['r_delete_success']);?>
            <?php if(isset($_SESSION['r_delete_error'])){?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['r_delete_error'];?>
                </div>
            <?php }unset($_SESSION['r_delete_error']);?>
            <?php if(isset($_SESSION['r_add_success'])){?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['r_add_success'];?>
                </div>
            <?php }unset($_SESSION['r_add_success']);?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Reviews</h4>
                                <p class="card-category"> Manage Hotel Reviews here</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table"  cellspacing="0" width="100%" style="width:100%;white-space: nowrap;">
                                        <thead class=" text-primary">
                                            <th>ID</th>
                                            <th>User Details</th>
                                            <th>Hotel Details</th>
                                            <th>Review</th>
                                            <th>Rating</th>
                                            <th>Created_at</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "select * from reviews";
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
                                                <td>
                                                    <?php 
                                                    $huid = $row['hotel_uid'];
                                                    $sqll = "select * from hotels where uid = '$huid'";
                                                    $rr = $conn->query($sqll);
                                                    while($roww = mysqli_fetch_assoc($rr)){
                                                    ?>
                                                    <p class="mb-0 pb-0"><strong><?php echo $roww['name'];?></strong></p>
                                                    <p class="mt-0 pt-0"><?php echo $roww['description'];?></p>
                                                    <?php }?>
                                                </td>
                                                <td><?php echo $row['review'];?></td>
                                                <td><?php echo $row['rating'];?></td>
                                                <td><?php echo $row['created_at'];?></td>
                                                <td>
                                                    <a href="?deletereview=<?php echo $row['id'];?>" onclick="alert('Are You Sure?')">
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