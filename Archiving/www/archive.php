<?php
//include auth.php file on all secure pages
  include "auth.php";
  include "function.php";
  $connect = connectdb();

    // $sql = "SELECT * FROM thesisarchivebook";
    if(isset($_POST['search'])){
        if(isset($_POST['taskOption']) && empty($_POST['check_list'])){
            $selectOption = mysqli_real_escape_string($connect, htmlspecialchars($_POST['taskOption']));
            $searchInput = mysqli_real_escape_string($connect, htmlspecialchars($_POST['search']));
            $sql = "SELECT * FROM thesisarchivebook WHERE $selectOption ='$searchInput'";
        }
        if(isset($_POST['taskOption']) && !empty($_POST['check_list'])){
            $selectOption = mysqli_real_escape_string($connect, htmlspecialchars($_POST['taskOption']));
            $searchInput = mysqli_real_escape_string($connect, htmlspecialchars($_POST['search']));
            $checked_box  = "'" . implode("','", $_POST['check_list']) . "'";
            $sql = "SELECT * FROM thesisarchivebook WHERE $selectOption ='$searchInput' AND college IN ($checked_box)";
        }
        if($_POST['taskOption'] == ""){
            $sql = "SELECT * FROM thesisarchivebook";
        }
        if($_POST['taskOption'] == "" && !empty($_POST['check_list'])){
            // $check_list = mysqli_real_escape_string($connect, htmlspecialchars($_POST['check_list']));
            $checked_box  = "'" . implode("','", $_POST['check_list']) . "'";
            $sql = "SELECT * FROM thesisarchivebook WHERE college IN ($checked_box)";
        }
        // $sql = "SELECT * FROM thesisarchivebook WHERE $selectOption ='$searchInput' AND college='$checklist'";
    }
    $result = $connect->query($sql);
      //////////////////////////////////////////
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Welcome Home</title>
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Audiowide">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="alternate" href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" type="application/atom+xml" title="Atom">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
   <script src="script.js"></script>
   <script type="text/javascript">
      function deleteAccount(id){
        if(confirm("Are you sure to delete?")){
          window.location = 'deleteArchive.php?uid=' + id ;
        }
      }

      function setlog(id){
          window.location = 'logarchive.php?uid=' + id ;
      }
    //   function setlog(id){
    //       $('a.yourlink').click(function(e) {
    //         e.preventDefault();
    //         window.location = 'logarchive.php?uid=' + id ;
    //     });
    //   }


    </script>
   <style>
      p{
         color: white;
      }
   </style>
</head>
<body>
   <nav>
      <div class="navbar">
         <a href="dashboard.php" class="" ><i class="fa fa-fw fa-home"></i> Home</a> 
         <a href="archive.php" class="active"><i class="fas fa-archive"></i> Archive</a>
         <?php
            if ($_SESSION['cuser']['UserType'] == 'admin' || $_SESSION['cuser']['UserType'] == 'superadmin' ) {
                ?>
                <a href="managearchive.php" class=""><i class="fas fa-folder-plus"></i> Manage Archive</a> 
                <?php
            }
            if ($_SESSION['cuser']['UserType'] == 'superadmin' ) {
                ?>
                <a href="manageaccount.php" class=""><i class="fas fa-user-plus"></i> Manage Account</a>
                <a href="view.php"><i class="fas fa-users"></i> View Accounts</a>
                <a href="activitylogs.php" class=""><i class="fas fa-id-card"></i>  Activity Logs</a>
                <a href="loginhistory.php" class="" ><i class="fas fa-user-clock"></i> Login History</a>
                <a href="notification.php" class="" ><i class="fas fa-bell"></i> Login Request</a>
                <?php
            }
         ?>
         <a href="logout.php" style="float: right;">Logout <i class="fas fa-sign-out-alt"></i></a>
         <a href="#" style="float: right;"><i class="fas fa-id-badge"></i> <?php echo $_SESSION['cuser']['Username']; ?><span  style="color: #888; font-size: 10px;"> (<?php echo ucfirst($_SESSION['cuser']['UserType']); ?>)</span></a>
      </div>
   </nav>
   <section>
        <form action="" method="POST" class="searchform" style="max-width:85%">
            <input id="Gosearch" type="text" placeholder="Search.." name="search">
            <select id="entityID" name="taskOption">
                <option value=""></option>
                <?php
                        if ($_SESSION['cuser']['UserType'] == 'admin' || $_SESSION['cuser']['UserType'] == 'superadmin' ) {
                            ?>
                            <option value="book_id">by Book ID</option>
                            <?php
                        } ?>
                <option value="thesis_title">by Title</option>
                <option value="authors">by Author</option>
                <option value="upload_date">by Upload Date</option>
                <option value="tags">by Tags</option>
            </select>
            <button class="searchbtn" type="submit" name="searchAccount"><i class="fa fa-search"></i></button>
            <div class="college-box col-12">
                <div class="col-1-2 CECS">
                    <input type="checkbox" class="college-chkbx " id="CECS" name="check_list[]" value="CECS"><label for="CECS">CECS</label>
                </div>
                <div class="col-1-2 CHRM">
                    <input type="checkbox" class="college-chkbx " id="CHRM" name="check_list[]" value="CHRM"><label for="CHRM">CHRM</label>
                </div class="col-2">
                <div class="col-1-2 COC">
                    <input type="checkbox" class="college-chkbx " id="COC" name="check_list[]" value="COC"><label for="COC">COC</label>
                </div>
                <div class="col-1-2 CBAA">
                    <input type="checkbox" class="college-chkbx " id="CBAA" name="check_list[]" value="CBAA"><label for="CBAA">CBAA</label>
                </div>
                <div class="col-1-2 CAS">
                    <input type="checkbox" class="college-chkbx " id="CAS" name="check_list[]" value="CAS"><label for="CAS">CAS</label>
                </div>
                <div class="col-1-2 CON">
                    <input type="checkbox" class="college-chkbx " id="CON" name="check_list[]" value="CON"><label for="CON">CON</label>
                </div>
                <div class="col-1-2 CED">
                    <input type="checkbox" class="college-chkbx " id="CED" name="check_list[]" value="CED"><label for="CED">CED</label>
                </div>
            </div>
        </form>
   </sec>
   <section class="table-container">
        <table id="customers">
            <thead>
                <tr>
                    <?php
                        if ($_SESSION['cuser']['UserType'] == 'admin' || $_SESSION['cuser']['UserType'] == 'superadmin' ) {
                            ?>
                            <th style="width:3%;">Book ID</th>
                            <?php
                        } ?>
                    <th>Title</th>
                    <th>Authors</th>
                    <th>College</th>
                    <th>Discussion</th>
                    <th>Tags</th>
                    <th>Uploaded By</th>
                    <th>Upload Date</th>
                    <th>File Name</th>
                    <th style="text-align: center; width:3%;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (isset($_POST['search']) && !$_POST['search']){
                        $query = mysqli_query($connect, $sql);
                        while($row = mysqli_fetch_array($query)){ ?>
                        <tr>
                        <?php
                        // book_id is hidden from other users
                        if ($_SESSION['cuser']['UserType'] == 'admin' || $_SESSION['cuser']['UserType'] == 'superadmin' ) {
                            ?>
                            <td style="width:3%;"><?php echo $row['book_id']; ?></td>
                            <?php
                        } ?>
                        <?php
                        // Confidential Documents must contain higher permission so that it can only be accessed by the same college dean, admins and superadmins
                        if ($_SESSION['cuser']['Perms'] >= $row['permission'] || $_SESSION['cuser']['College'] == $row['college'] || $_SESSION['cuser']['UserType'] == 'admin' || $_SESSION['cuser']['UserType'] == 'superadmin' ) {
                            ?>
                            <td><?php echo $row['thesis_title']; ?></td>
                            <td><?php echo $row['authors']; ?></td>
                            <td><?php echo $row['college']; ?></td>
                            <td><?php echo $row['thesis_desc']; ?></td>
                            <td><?php echo $row['tags']; ?></td>
                            <td><?php echo $row['uploaded_by']; ?></td>
                            <td><?php echo $row['upload_date']; ?></td>
                            <td><?php echo $row['filename']; ?></td>
                            <td style="text-align: center; width:3%;">
                                <div>
                                    <!-- <iframe src="<?php echo $row['filename']; ?>" style="width: 100%;height: 100%;border: none;"></iframe> -->
                                    <a title="View" class="yourlink" target="_blank" href="<?php echo $row['filename']; ?>" onclick="javascript: setlog(<?php echo $row['book_id']; ?>)"><i class="fas fa-external-link-alt"></i></a>
                                    <?php
                                    if ($_SESSION['cuser']['UserType'] == 'admin' || $_SESSION['cuser']['UserType'] == 'superadmin' ) {
                                    ?>
                                     <a title="Delete" href="#" onclick="javascript: deleteAccount(<?php echo $row['book_id']; ?>)"><i class="fas fa-trash"></i></a>
                                        <?php
                                    } ?>
                                </div>
                            </td>
                            <?php
                        } ?>
                        </tr>
                <?php }} else {
                    while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                            <?php
                            // book_id is hidden from other users
                            if ($_SESSION['cuser']['UserType'] == 'admin' || $_SESSION['cuser']['UserType'] == 'superadmin' ) {
                                ?>
                                <td><?php echo $row['book_id']; ?></td>
                                <?php
                            } ?>
                        <?php
                        // Confidential Documents must contain higher permission so that it can only be accessed by the same college dean, admins and superadmins
                        if ($_SESSION['cuser']['Perms'] >= $row['permission'] || $_SESSION['cuser']['College'] == $row['college'] || $_SESSION['cuser']['UserType'] == 'admin' || $_SESSION['cuser']['UserType'] == 'superadmin' ) {
                            ?>
                            <td><?php echo $row['thesis_title']; ?></td>
                            <td><?php echo $row['authors']; ?></td>
                            <td><?php echo $row['college']; ?></td>
                            <td><?php echo $row['thesis_desc']; ?></td>
                            <td><?php echo $row['tags']; ?></td>
                            <td><?php echo $row['uploaded_by']; ?></td>
                            <td><?php echo $row['upload_date']; ?></td>
                            <td><?php echo substr($row['filename'], 8); ?></td>
                            <td style="text-align: center; width:3%;">
                                <div>
                                    <!-- <iframe src="<?php echo $row['filename']; ?>" style="width: 100%;height: 100%;border: none;"></iframe> -->
                                    <a title="View" class="yourlink" target="_blank" href="<?php echo $row['filename']; ?>" onclick="javascript: setlog(<?php echo $row['book_id']; ?>)"><i class="fas fa-external-link-alt"></i></a>
                                    <?php
                                    if ($_SESSION['cuser']['UserType'] == 'admin' || $_SESSION['cuser']['UserType'] == 'superadmin' ) {
                                    ?>
                                     <a title="Delete" href="#" onclick="javascript: deleteAccount(<?php echo $row['book_id']; ?>)"><i class="fas fa-trash"></i></a>
                                        <?php
                                    } ?>
                                </div>
                            </td>
                            <?php
                        } ?>
                        </tr>
                <?php }}?>
            </tbody>
        </table>
    </section>
</body>
</html>

