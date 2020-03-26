<?php ob_start() ;?>
<?php  session_start();?>

<?php
    
    $_SESSION['managerName_back'] = null;
    $_SESSION['managerEmail_back'] = null;
    $_SESSION['managerMobile_back'] =null;
    $_SESSION['userDOB_back'] = null;
    $_SESSION['managerPassword_back'] = null;
    $_SESSION['usermanager_id_id'] = null;
    $_SESSION['managerPassword_back'] =null;



    $_SESSION['userName_back'] = null;
    $_SESSION['userEmail_back'] = null;
    $_SESSION['userMobile_back'] = null;
    $_SESSION['userDOB_back'] = null;
    $_SESSION['userPassword_back'] = null;
    $_SESSION['user_id'] = null;
    $_SESSION['userDOB_back'] = null;
    header("Location: ../tessst/manager/manager_includes/index.php");
?>