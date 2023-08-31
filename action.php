<?php
// Start session 
session_start(); 
include 'includes/class-autoload.php';

$obj = new Action();
 
$postData = $statusMsg = $valErr = ''; 
$status = 'danger'; 

$postData = $statusMsg = $valErr = ''; 

//ADD USER

if (!empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'insert') {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $company_name = $_POST["company_name"];
    $position = $_POST["position"];
    $area_code = $_POST["area_code"];
    $phone_code = $_POST["phone_code"];
    $phone_number = $_POST["phone_number"];

        
    // Validate form fields 
    if(empty($first_name)){ 
        $valErr .= 'Please enter your first name.<br/>'; 
    } 
    if(empty($last_name)){ 
        $valErr .= 'Please enter your last name no.<br/>'; 
    } 
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){ 
        $valErr .= 'Please enter a valid email.<br/>'; 
    } 
    
    if(empty($valErr)){ 
        // Insert data into the database 
        $userData = array( 
            'first_name' => $first_name, 
            'last_name' => $last_name, 
            'email' => $email 
        ); 
        $jobData = array( 
            'company_name' => $company_name, 
            'position' => $position
        ); 
        $phoneData = array( 
            'area_code' => $area_code, 
            'phone_code' => $phone_code,
            'phone_number' => $phone_number
        ); 
        $setuser = $obj->setUser($userData); 
        
        if($setuser){ 
            $status = 'success'; 
            $statusMsg = 'Данные добавлены!'; 
            $postData = ''; 

            if ($jobData != NULL || $phoneData != NULL) {
                $add = $obj->add($jobData, $phoneData, $setuser);
            }
            header("Location: index.php");
        }else{ 
            $statusMsg = 'Ошибка! Проверьте введенные данные и повторите попытку позднее.'; 
            header("Location: add.php"); 
        } 
    }else{ 
        $statusMsg = '<p>Пожалуйста, заполните обязательные поля:</p>'.trim($valErr, '<br/>'); 
        header("Location: add.php"); 
    } 
    $sessData['postData'] = $postData; 
    $sessData['status']['type'] = $status; 
    $sessData['status']['msg'] = $statusMsg; 
    $_SESSION['sessData'] = $sessData; 

    header("Location: index.php");    
}
//UPDATE USER
elseif(!empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'update' && !empty($_GET['id'])){
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $company_name = $_POST["company_name"];
    $position = $_POST["position"];
    $area_code = $_POST["area_code"];
    $phone_code = $_POST["phone_code"];
    $phone_number = $_POST["phone_number"];
    $id = $_GET['id'];

        
    // Validate form fields 
    if(empty($first_name)){ 
        $valErr .= 'Please enter your first name.<br/>'; 
    } 
    if(empty($last_name)){ 
        $valErr .= 'Please enter your last name no.<br/>'; 
    } 
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){ 
        $valErr .= 'Please enter a valid email.<br/>'; 
    } 
    

    if(empty($valErr)){ 
        // Update data into the database 
        $data = ['first_name', 'last_name', 'email','company_name', 'position','area_code', 'phone_code','phone_number'];
        $items = [];

        foreach ($data as $value) {
            if (!empty($_GET[$value])) {
                $items += [
                    $value => $_GET[$value]
                ];
            }
        }
        $edituser = $obj->update($items, $id); 
        
        if($edituser){ 
            $status = 'success'; 
            $statusMsg = 'Данные успешно изменены!'; 
            $postData = ''; 
            
            //header("Location: index.php");
        }else{ 
            $statusMsg = 'Ошибка! Проверьте введенные данные и повторите попытку позднее.'; 
        } 
    }else{ 
        $statusMsg = '<p>Пожалуйста, заполните обязательные поля:</p>'.trim($valErr, '<br/>'); 
        header("Location: edit.php"); 
    } 
    $sessData['postData'] = $postData; 
    $sessData['status']['type'] = $status; 
    $sessData['status']['msg'] = $statusMsg; 
    $_SESSION['sessData'] = $sessData; 

    header("Location: index.php"); 
}
//DELETE USER
elseif(!empty($_REQUEST['action_type']) && $_REQUEST['action_type'] == 'delete' && !empty($_GET['id'])){
    $id = $_GET['id'];
    $delete = $obj->delete($id);

    if($delete){ 
        $status = 'success'; 
        $statusMsg = 'Клиент удален'; 
    }else{ 
        $statusMsg = 'Ошибка! Проверьте введенные данные и повторите попытку позднее.'; 
    } 
     
    // Store status into the SESSION 
    $sessData['status']['type'] = $status; 
    $sessData['status']['msg'] = $statusMsg; 
    $_SESSION['sessData'] = $sessData; 
    header("Location: index.php");
}
//header("Location: index.php");