
<?php
session_start();
require '../../Model/db-con.php';


if(isset($_GET['page'])){

  $page = $_GET['page'];

}
else{
  $page = 1;
}

$num_per_page = 05;
$start_from = ($page-1)*05;



/*$query = "SELECT * FROM campaign limit $start_from, $num_per_page";
$res = mysqli_query($con, $query);*/


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Marketing Strategist</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--<link rel="stylesheet" href="dms.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/dms/campaigns.css">
    <link rel="stylesheet" href="../../View/styles/searchNfilter.css">

    
</head>
<body id="whole">
    <div class="nav_bar">
        <div class="search-container">
            <table class="element-container">
              <tr>
                <td>
                  <input type="text" placeholder="Search..." class="search">
                </td>
                <td>
                  <a><i style="color:rgb(235, 137, 58)" class="fa-solid fa-magnifying-glass"></i></a>
                </td>
              </tr>
            </table>
        </div>
        <div class="user-wrapper">
            <img src="../../View/assets/chamodi.png" width="50px" height="50px" alt="user image">
            <div>
                <h4>Chamodi</h4>
                <small style="color:rgb(235, 137, 58)">Digital Marketing Strategist</small>
            </div>
        </div>
    </div>
    <div class="side_bar">
        <div class="logo">
            <img src="../../View/assets/saleslogo-final.png" width= "70%" height="70%">
        </div>
        <ul class="icon-list">
            <li><a href="dms.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li  class="active"><a href="campaigns.html"><i style="margin-right: 2%;" class="fa-solid fa-globe"></i>Campaigns</a></li>
            <li><a href="stats.php"><i style="margin-right: 2%;" class="fa-solid fa-chart-line"></i>Statistics</a></li>
            <li><a href="cust-dms.php"><i style="margin-right: 2%;" class="fa-solid fa-users"></i></i>Customers</a></li>
        </ul>
        <table class="side-bar-icons">
          <tr>
            <td><i class="fa-regular fa-circle-user"></i></td>
            <td><a href="./profile.php">Profile</a></td>
          </tr>
          <tr>
            <td><i class="fa-solid fa-arrow-right-from-bracket"></i></i></td>
            <td><a href="../home/logout.php">Log out</a></td>
          </tr>
        </table>
    </div>
    
    <button id="add_btn" name="add_cmpg">Add Campaign</button>

    <form action="" method="POST">
      <div class="search_wrapper">
          <div class="dropdown">
              <select  name="dmsSelect1" id="stats">
                <option value="" disabled="" selected="">Select Status</option>
                <option value="ongoing">Ongoing</option>
                <option value="tobelaunched">To be launched</option>
                <option value="complete">Complete</option>
              </select>
          </div>

          <div class="dropdown2">
              <select  name="dmsSelect2" id="obj">
                <option value="" disabled="" selected="">Select Objective</option>
                <option value="sales">Sales</option>
                <option value="leads">Leads</option>
                <option value="awareness">Awareness</option>
                <option value="engagement">Engagement</option>
              </select>
          </div>

          <button type="submit" name="filter_button" id="btnFilter">Filter</button>
          
          <!--<button id="resetFilter">Reset</button>-->
    
    </div>
    </form> 

        <table class="content-table">
            <thead>
              <tr>
                <th>Campaign ID</th>
                <th>Start Date</th>
                <th>Objective</th>
                <th>Status</th>
                <th>Budget<br>(Rs.)</th>
              </tr>
            </thead>
            <tbody>
            <?php
                    
                    // if(isset($_GET['dmsSelect1']) && isset($_GET['dmsSelect2'])){
                    //       $filterVal1 = $_GET['dmsSelect1'];
                    //       $filterVal2 = $_GET['dmsSelect2'];

                    //       $sql = "SELECT * FROM campaign WHERE cmpg_stat = '$filterVal1' AND objective = '$filterVal2' limit $start_from, $num_per_page";
                    // }
                    if(isset($_POST['filter_button'])){
                      // Store the selected value in a session variable
                      $_SESSION['selected_value'] = $_POST['dmsSelect1'];

                      $selected_value = '';

                      if(isset($_POST['dmsSelect1'])){
                        $filterVal1 = $_POST['dmsSelect1'];
                        $sql = "SELECT * FROM campaign WHERE cmpg_stat = '$filterVal1' limit $start_from, $num_per_page";
                      }
                      elseif(isset($_POST['dmsSelect2'])){
                        $filterVal2 = $_POST['dmsSelect2'];
                        $sql = "SELECT * FROM campaign WHERE objective = '$filterVal2' limit $start_from, $num_per_page";
                      }
                    }
                    else{
                      $sql = "SELECT * FROM campaign limit $start_from, $num_per_page";
                    }

                    $query = mysqli_query($con, $sql);

                    if(mysqli_num_rows($query) > 0 ){

                        foreach($query as $thing){
                            ?>
                                <tr>
                                    <td scope="row"><?=$thing['id']; ?></td>
                                    <td><?=$thing['startdate']; ?></td>
                                    <td><?=$thing['objective']; ?></td>
                                    <td>
                                        <select id="status" name="stat">
                                          <option value="unknown"><?=$thing['cmpg_stat']; ?></option>
                                          <option value="tobelaunched">To-be Launched</option>
                                          <option value="ongoing">Ongoing</option>
                                          <option value="complete">Complete</option>
                                        </select>   
                                    </td>
                                    <td><?=$thing['budget']; ?></td> 
                                </tr>

                            <?php 

                        }
                    }
                    else{
                        echo "<h4>No records</h4>";
                    }
                
                ?>
            </tbody>
              
            
          </table>
          <!--<div class="navigation-table">
            <button name="left-nav"><i class="fa-solid fa-circle-chevron-left fa-lg"></i></button>
            <button name="right-nav"><i class="fa-solid fa-circle-chevron-right fa-lg"></i></button>
          </div>-->
            
      <div class="popup-container" id="popup_container">
        <div class="popup-modal">
          <form action="../../Model/dms/crud.php" method="post">
            <label for="name" class="title"><h3 style="color: rgb(0, 0, 0); margin-top: 3px; margin-right: 10px; margin-bottom: 20px;">Campaign ID :</h3> <h2 style="color: rgb(0, 0, 0);">002</h2>
          </label>
          <label for="start-date">Start Date
            <input type="date" id="s-date" name="start_d">
          </label>
          <label for="objective">Objective
            <select id="objective" name="obj">
                <option value="awareness">Awareness</option>
                <option value="leads">Leads</option>
                <option value="engagement">Engagement</option>
                <option value="sales">Sales</option>
            </select>
          </label>
          <label for="status">Status
            <select id="status" name="stat">
                <option value="tobelaunched">To-be Launched</option>
                <option value="ongoing">Ongoing</option>
                <option value="complete">Complete</option>
            </select>
          </label>
          <label for="budget">Budget
            <input type="number" id="budget" name="budget">
          </label>
          <button class="cancel" id="close" type="reset" value="Reset">Cancel</button>
          <button class="submit" id="save" type="submit" value="Submit" name="save">Save</button>
          </form>

        </div>
      </div>

    <?php
    
    if(isset($_SESSION['selected_value']) && !empty($_SESSION['selected_value'])){
      // Set the selected value to the session variable
      $selected_value = $_SESSION['selected_value'];
    }

    $pr_query = "SELECT * FROM campaign";

    if(!empty($selected_value)){
      $pr_query .= " WHERE cmpg_stat = '$selected_value'";
    }

    // if(isset($_GET['dmsSelect1'])){
    //   $filterVal1 = $_GET['dmsSelect1'];
    //   $pr_query = "SELECT * FROM campaign WHERE cmpg_stat = '$filterVal1' ";
    // }
    // elseif(isset($_GET['dmsSelect2'])){
    //   $filterVal2 = $_GET['dmsSelect2'];
    //   $pr_query = "SELECT * FROM campaign WHERE objective = '$filterVal2' ";
    // }
    // else{
    //   $pr_query = "SELECT * FROM campaign";
    // }
      
      $pr_res = mysqli_query($con, $pr_query);

      $total_records = mysqli_num_rows($pr_res);

      $total_pages = ceil($total_records/$num_per_page);?>

  <div style="margin-left: 750px; margin-bottom:30px;">

    <?php
      if($page>1){
        echo " <button style='margin-left:10px; border: none; outline: none;' ><a href='campaigns.php?page=".($page-1)." '><i class='fa-solid fa-circle-chevron-left fa-lg' style='color:#F8914A;'></i></a></button>";
      } 

      for($i = 1; $i < $total_pages; $i++){

        echo " <button style='margin-left:10px; border: none; outline: none; padding: 10px; background:#F8914A;' ><a href='campaigns.php?page=".$i." ' style='text-decoration:none; color:#FFFFFF;'>$i</a></button>";

      }

      if($i>$page){
        echo " <button style='margin-left:10px; border: none; outline: none;' ><a href='campaigns.php?page=".($page+1)." '><i class='fa-solid fa-circle-chevron-right fa-lg' style='color:#F8914A;'></i></a></button>";
      } 
    ?>

  </div>

  
    <script>
        const add_btn = document.getElementById('add_btn');
        const close = document.getElementById('close');
        const save = document.getElementById('save');
        const popup_container = document.getElementById('popup_container');

        add_btn.addEventListener('click', () => {
            popup_container.classList.add('show');
        });

        close.addEventListener('click', () => {
            popup_container.classList.remove('show');
        });

        save.addEventListener('click', () => {
            popup_container.classList.remove('show');
        });

    </script>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>