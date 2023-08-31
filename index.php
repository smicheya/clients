<?php
    // Start session 
    session_start(); 
    
    // Get data from session 
    $sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
    
    // Get status from session 
    if(!empty($sessData['status']['msg'])){ 
        $statusMsg = $sessData['status']['msg']; 
        $status = $sessData['status']['type']; 
        unset($_SESSION['sessData']['status']); 
    } 
    include 'includes/class-autoload.php';
    //require_once 'includes/class-autoload.php';

    // Retrieve status message from session 
    if(!empty($_SESSION['statusMsg'])){ 
        echo '<p>'.$_SESSION['statusMsg'].'</p>'; 
        unset($_SESSION['statusMsg']); 
    } 
    //$users = $db->getRows('users', array('order_by'=>'id DESC')); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<?php
    if (isset($_GET['page-nr'])) {
        $id = $_GET['page-nr'];
    }
    else {
        $id = 1;
    }
?>
<body id = "<?=$id?>" >
    <?php
    $obj = new Action();

    //set the start
    $start = 0;
    //number of rows in page
    $rows_on_page = 10;
    //get count of all table
    $nr_of_rows = $obj->readAll();

    //calculating the number of pages
    $pages = ceil($nr_of_rows / $rows_on_page);

    //on click to pagination button, set a new start
    if (isset($_GET['page-nr'])) {
        $page = $_GET['page-nr'] - 1;
        $start = $page * $rows_on_page;
    }

    $users = $obj->read($start,$rows_on_page);
    ?>
    <!-- Status message -->
    <?php if(!empty($statusMsg)){ ?>
        <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
    <?php } ?>

    <div class="header container title">
        <h1>Список клиентов</h1>
    </div>
    <div class="top container">
        <a href="add.php" class="btn">Создать аккаунт</a>
    </div>
    <div class="container">
        <div class="main">
            <h3 class="main_items-title">
                first name
            </h3> 
            <h3 class="main_items-title">
                last name
            </h3>
            <h3 class="main_items-title">
                email
            </h3>
            <h3 class="main_items-title">
                company name
            </h3>
            <h3 class="main_items-title">
                position
            </h3>
            <h3 class="main_items-title">
                phone
            </h3>
        </div>

        <div class="main">
            <?php foreach ($users as $key => $user): ?>
                <div class="main_items main_items-text">
                    <?php
                        echo $user['first_name'] . "<br>";
                    ?>                            
                </div> 
                <div class="main_items main_items-text">
                    <?php
                        echo $user['last_name'] . "<br>";
                    ?>                            
                </div> 
                <div class="main_items main_items-text">
                    <?php
                        echo $user['email'] . "<br>";
                    ?>                            
                </div>
                <div class="main_items main_items-text">
                    <?php
                        echo $user['company_name'] . "<br>";
                    ?>                            
                </div>  
                <div class="main_items main_items-text">
                    <?php
                        echo $user['position'] . "<br>";
                    ?>                            
                </div> 
                <div class="main_items main_items-text">                
                    <div class="main_items-last-col">  
                        <?php
                            echo $user['area_code'] . $user['phone_code'] . $user['phone_number'];
                        ?>                                                   
                        <div class="main_items-btn">
                            <a href="edit.php?id=<?= $user['id_user']; ?>" class="main_items-btn_link"><img src="icons/update-i.png" alt="Update" srcset=""></a>
                            <a href="action.php?action_type=delete&id=<?=$user['id_user']; ?>" class="main_items-btn_link" onclick="return confirm('Are you sure to delete data?');"><img src="icons/delete-i.png" alt="Delete" srcset=""></a>
                        </div>         
                </div>
                </div>                     
                
            <?php endforeach; ?> 
        </div>    
    </div>

    <div class="pagination container">
        <a href="?page-nr=1" class="pagination-btn-link">First</a>
        <?php if (isset( $_GET['page-nr']) && $_GET['page-nr'] > 1 ) { ?>
                    <a href="?page-nr=<?=$_GET['page-nr'] - 1 ?>" class="pagination-btn-link">Prev</a>
            <?php } else { ?> 
                    <a class="pagination-btn-link">Prev</a>
            <?php } ?>
        <div class="page-numbers">
            <?php
                for ($i=1; $i <= $pages ; $i++): ?>
                        <a href="?page-nr=<?=$i?>" class="pagination-btn-link"><?=$i?></a>
            <?php endfor;?>
        </div>
            <?php 
                if (!isset($_GET['page-nr'])) { ?>
                    <a href="?page-nr=2" class="pagination-btn-link">Next</a>
                <?php }
                    else {
                        if ($_GET['page-nr'] >= $pages) { ?>
                            <a class="pagination-btn-link">Next</a>
                    <?php } else { ?>
                            <a href="?page-nr=<?=$_GET['page-nr'] + 1 ?>" class="pagination-btn-link">Next</a>
                    <?php
                            }
                        }
                ?>      
        <a href="?page-nr=<?=$pages?>" class="pagination-btn-link">Last</a>
    </div>
    <script>
        let links = document.querySelectorAll('.page-numbers > .pagination-btn-link');
        let bodyId = parseInt(document.body.id) - 1;
        links[bodyId].classList.add("active");
    </script>
</body>
</html>