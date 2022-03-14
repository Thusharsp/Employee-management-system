<?php 
    require_once "include/header.php";
?>
    
    <?php
    require_once "include/header.php";
?>


<?php  

        $nameErr = $emailErr = $project_idErr = $project_nameErr = $deptErr = "";
        $name = $email = $dept = $project_id = $project_name = $dept = "";

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["name"]) ){
                $nameErr = "<p style='color:red'> * Name is required</p>";
            }else {
                $name = $_REQUEST["name"];
            }

            if( empty($_REQUEST["email"]) ){
                $emailErr = "<p style='color:red'> * Email is required</p> ";
            }else{
                $email = $_REQUEST["email"];
            }

            if( empty($_REQUEST["project_id"]) ){
                $project_idErr = "<p style='color:red'> * Proejct is required</p> ";
            }else{
                $project_id = $_REQUEST["project_id"];
            }

            if( empty($_REQUEST["project_name"]) ){
                $project_nameErr = "<p style='color:red'> * Project name is required</p> ";
            }else{
                $project_name = $_REQUEST["project_name"];
            }
            
            if( empty($_REQUEST["dept"]) ){
                $deptErr = "<p style='color:red'> * Proejct is required</p> ";
            }else{
                $dept = $_REQUEST["dept"];
            }

            if( !empty($name) && !empty($email) && !empty($project_id) && !empty($project_name) && !empty($dept) ){

                // database connection hello how are you....
                require_once "../connection.php";

                $sql_select_query = "SELECT email FROM project_assign WHERE email = '$email' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $emailErr = "<p style='color:red'> * Email Already Register</p>";
                } else{

                    $sql = "INSERT INTO project_assign( name , email , project_id , project_name , dept ) VALUES( '$name' , '$email' , '$project_id' , '$project_name' , '$dept' )  ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        $name = $email = $project_id = $project_name = $dept = "";
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-project.php');
                            $('#linkBtn').text('View Projects');
                            $('#addMsg').text('Project Assigned Successfully!');
                            $('#closeBtn').text('Add More?');
                        })
                     </script>
                     ";
                }

            }
        }
    }

?>



<div style=""> 
<div class="login-form-bg h-100">
        <div class="container mt-5 h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5 shadow">                       
                                    <h4 class="text-center">Assign Project</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                            
                                <div class="form-group">
                                    <label >Full Name :</label>
                                    <input type="text" class="form-control" value="<?php echo $name; ?>"  name="name" >
                                   <?php echo $nameErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >Email :</label>
                                    <input type="email" class="form-control" value="<?php echo $email; ?>"  name="email" >     
                                    <?php echo $emailErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >project_id : </label>
                                    <input type="text" class="form-control" value="<?php echo $project_id; ?>" name="project_id" > 
                                    <?php echo $project_idErr; ?>           
                                </div>

                                <div class="form-group">
                                    <label >project_name :</label>
                                    <input type="text" class="form-control" value="<?php echo $project_name; ?>" name="project_name" >  
                                   
                                </div>

                                <div class="form-group">
                                    <label >dept :</label>
                                    <input type="text" class="form-control" value="<?php echo $dept; ?>" name="dept" >  
                                   
                                </div>

                                
                                <br>

                                <button type="submit" class="btn btn-primary btn-block">Add</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    require_once "include/footer.php";
?>


<?php 
    require_once "include/footer.php";
?>