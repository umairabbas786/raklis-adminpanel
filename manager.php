<?php include "includes/header.php";?>
<?php 
    if(isset($_GET['deletemanager'])){
        $id = $_GET['deletemanager'];
        $sql = "delete from managers where id = '$id'";
        $r = $conn->query($sql);
        if($r){
            $_SESSION['m_delete_success'] = "Manager Deleted Successfully";
            header("location: manager.php");
            die();
        }else{
            $_SESSION['m_delete_error'] = "Unable to delete Manager";
        }
    }

?>
<div class="wrapper ">
    <?php include "includes/sidenav.php";?>
    <div class="main-panel">
        <?php include "includes/nav.php";?>
        <div class="content">
            <div class="container-fluid">
            <?php if(isset($_SESSION['m_delete_success'])){?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['m_delete_success'];?>
                </div>
            <?php }unset($_SESSION['m_delete_success']);?>
            <?php if(isset($_SESSION['m_delete_error'])){?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['m_delete_error'];?>
                </div>
            <?php }unset($_SESSION['m_delete_error']);?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Managers</h4>
                                <p class="card-category"> Manage Managers here</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Password</th>
                                            <th>Created_at</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "select * from managers";
                                                $r = $conn->query($sql);
                                                while($row = mysqli_fetch_assoc($r)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id'];?></td>
                                                <td>
                                                    <img src="https://apis.raklissd.com/data/images/manager_avatars/<?php echo $row['avatar'];?>" alt="avatar not uploaded" width="100" height="100" style="border-radius:50%;">
                                                    <span class="ml-3"><?php echo $row['full_name'];?></span>
                                                </td>
                                                <td><?php echo $row['Email'];?></td>
                                                <td><?php echo $row['phone'];?></td>
                                                <td><?php echo $row['password'];?></td>
                                                <td><?php echo $row['created_at'];?></td>
                                                <td>
                                                    <a href="?deletemanager=<?php echo $row['id'];?>" onclick="alert('Are You Sure?')">
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