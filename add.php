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
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Добавить аккаунт</title>
</head>
<body>
    <div class="container">
            <!-- Status message -->
        <?php if(!empty($statusMsg)){ ?>
            <div class="alert alert-<?php echo $status; ?>" ><?php echo $statusMsg;?></div>
        <?php } ?>
        <div class="header title">
            <h1>Добавление клиента</h1>
        </div>
        <!-- includes/action.php -->
        <div class="input_form">
            <form action="action.php?action_type=insert" method="post" class="form" name="main">
                <div class="name-row">
                    <div class="name-col">
                        <label for="firstName" class="form-label">First name</label>
                        <input type="text" class="form__input input_first_name" name="first_name" placeholder="first name" required>
                    </div>
                    <div class="name-col">
                        <label for="lastName" class="form-label">Last name</label>
                        <input type="text" class="form__input input_last_name" name="last_name" placeholder="Last name" required>
                    </div>
                </div>

                <label for="Email" class="form-label">E-mail</label>
                <input type="email" class="form__input input_email" name="email" placeholder="email" required>

                <label for="companyName" class="form-label">Company name</label>
                <input type="text" class="form__input" name="company_name" placeholder="company name">

                <label for="position" class="form-label">Position</label>
                <input type="text" class="form__input" name="position" placeholder="position">

                <label for="phone" class="form-label">Phone</label>
                <div class="phone">
                    <input type="tel" class="form__input" name="area_code"  placeholder="+7">
                    <input type="tel" class="form__input" name="phone_code"  placeholder="(999)">
                    <input type="tel" class="form__input" name="phone_number"  placeholder="999-99-99">
                </div>

                <button type="submit" class="btn" onclick="insertSubmit()">Добавить</button>
            </form>
        </div>
    </div>
    <script src="js/main.js"></script>  
</body>
</html>