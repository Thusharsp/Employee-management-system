<?php 
    require_once "include/header.php";
?>
    
    <?php
    require_once "include/header.php";
?>


<?php  

        $project_idErr = $project_nameErr = $deptErr =  "";
        $project_id = $project_name = $dept =  "";

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["project_id"]) ){
                $project_id ="";
            }else {
                $project_id = $_REQUEST["project_id"];
            }


            if( empty($_REQUEST["project_name"]) ){
                $project_name= "";
            }else {
                $project_name = $_REQUEST["project_name"];
            }

            if( empty($_REQUEST["dept"]) ){
                $dept="";
            }else {
                $dept = $_REQUEST["dept"];
            }

            


            if( !empty($project_id  ) && !empty($project_name) && !empty($dept) ){

                // database connection
                require_once "../connection.php";

                $sql_select_query = "SELECT project_id FROM project WHERE project_id = '$project_id' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $project_idErr = "<p style='color:red'> * Project Already Register</p>";
                } else{

                    $sql = "INSERT INTO project( project_id , project_name , dept ) VALUES( '$project_id' , '$project_name' , '$dept' )  ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        $project_id = $project_name = $dept = "";
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-project.php');
                            $('#linkBtn').text('View projects');
                            $('#addMsg').text('Project Added Successfully!');
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
                                    <h4 class="text-center">Add Project</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                            
                                <div class="form-group">
                                    <label >project_id :</label>
                                    <input type="text" class="form-control" value="<?php echo $project_id; ?>"  name="project_id" >
                                   <?php echo $project_idErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >project_name :</label>
                                    <input type="text" class="form-control" value="<?php echo $project_name; ?>"  name="project_name" >     
                                    <?php echo $project_nameErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >Department :</label>
                                    <input type="text" class="form-control" value="<?php echo $dept; ?>" name="dept" > 
                                    <?php echo $deptErr; ?>           
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