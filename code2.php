<?php

session_start();

$con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

    if(isset($_POST['update_btn'])){
        
        $id = $_POST['edit_id'];
        $edit_firstName = mysqli_real_escape_string($con, $_POST['edit_firstName']);
        $edit_lastName = mysqli_real_escape_string($con, $_POST['edit_lastName']);
        $edit_stuPhone1 =mysqli_real_escape_string($con, $_POST['edit_stuPhone1']);
        $edit_stuPhone2 = mysqli_real_escape_string($con, $_POST['edit_stuPhone2']);
        $edit_stuEmail = mysqli_real_escape_string($con, $_POST['edit_stuEmail']);
        $edit_stuAdd1 = mysqli_real_escape_string($con, $_POST['edit_stuAdd1']);
        $edit_stuAdd2 =mysqli_real_escape_string($con, $_POST['edit_stuAdd2']);
        $edit_stuState = $_POST['edit_stuState'];
        $edit_stuLGA = $_POST['edit_stuLGA'];
        $edit_date = $_POST['edit_date'];
        $edit_stuBlood = $_POST['edit_stuBlood'];
        $edit_sex =$_POST['edit_sex'];
        $edit_parFirstName = mysqli_real_escape_string($con, $_POST['edit_parFirstName']);
        $edit_parlastName = mysqli_real_escape_string($con, $_POST['edit_parlastName']);
        $edit_parPhone1 = mysqli_real_escape_string($con, $_POST['edit_parPhone1']);
        $edit_parPhone2 =mysqli_real_escape_string($con, $_POST['edit_parPhone2']);
        $edit_parEmail = mysqli_real_escape_string($con, $_POST['edit_parEmail']);
        $edit_parAdd1 = mysqli_real_escape_string($con, $_POST['edit_parAdd1']);
        $edit_parAdd2 =mysqli_real_escape_string($con, $_POST['edit_parAdd2']);
        $edit_parState = $_POST['edit_parState'];
        $edit_parLGA =$_POST['edit_parLGA'];
        $edit_occupation =$_POST['edit_occupation'];
        $edit_parBlood = $_POST['edit_parBlood'];
        $edit_school = $_POST['edit_school'];
        $edit_class = $_POST['edit_class'];
        $section = $_POST['section'];
        $edit_statement = mysqli_real_escape_string($con, $_POST['edit_statement']);
        $edit_admit =$_POST['edit_admit'];
        $edit_department =$_POST['edit_department'];
        $edit_religion =$_POST['edit_religion'];

     
        $query = "UPDATE student SET stu_firstName='$edit_firstName',stu_lastName='$edit_lastName',stu_phone1='$edit_stuPhone1',stu_phone2='$edit_stuPhone2',stu_email='$edit_stuEmail',stu_add1='$edit_stuAdd1',stu_add2='$edit_stuAdd2',stu_state='$edit_stuState',stu_locgov='$edit_LGA',stu_DOB='$edit_date',stu_BG='$edit_stuBlood',stu_sex='$edit_sex',par_firstName='$edit_parFirstName',par_lastName='$edit_parlastName',par_phone1='$edit_parPhone1',par_phone2='$edit_parPhone2',par_email='$edit_parEmail',par_add1='$edit_parAdd1',par_add2='$edit_parAdd2',par_state='$edit_parState',par_locgov='$edit_parLGA',occupation='$edit_occupation',par_BG='$edit_parBlood',school='$edit_school',class='$edit_class',section='$section',statement='$edit_statement',is_student='$edit_admit',reg_date=now(),stu_department='$edit_department',religion='$edit_religion' WHERE id='$id'";
    
        $query_run = mysqli_query($con, $query);
    
        if($query_run){
           // move_uploaded_file($_FILES["edit_stuImage"]['tmp_name'], "upload/".$_FILES["edit_stuImage"]['name']);
            $_SESSION['success'] = 'Student Data Successfully Updated';
            header('Location: students.php');
           }else{
            $_SESSION['status']= '<h6 class="text-danger">Student Data NOT updated</h6>';
            header('Location: students.php');
           }
    }
?>

<?php

session_start();

$con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');
    
    if(isset($_POST['login_btn'])){

        $username=mysqli_real_escape_string($con, $_POST['username']);
        $password=mysqli_real_escape_string($con, $_POST['password']);
    
        $query= "SELECT * FROM users WHERE first_name='$username' AND password=md5('$password') LIMIT 1";
    
        $query_run= mysqli_query($con, $query);
        
        if(mysqli_fetch_array($query_run)){
            $_SESSION['first_name']= $username; 
            $_SESSION['password']= $password;
            header('Location: index.php');
        }else{
            $_SESSION['status']= '<h6 class="text-danger">Email or Password is incorrect</h6>';
            header('Location: login.php');
                }
        }

?>