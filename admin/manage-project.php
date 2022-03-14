<?php 
    require_once "include/header.php";
?>


<?php 
    require_once "include/header.php";
?>

<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM project";
$result = mysqli_query($conn , $sql);

$i = 1;
$you = "";


?>

<style>
table, th, td {
  border: 1px solid black;
  padding: 15px;
}
table {
  border-spacing: 10px;
}
</style>

<div class="container bg-white shadow">
    <div class="py-4 mt-5"> 
    <div class='text-center pb-2'><h4>Manage Project</h4></div>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">
        <th>S.No.</th>
        <th>Project_Id</th>
        <th>Project_Name</th>
        <th>Department</th> 
      
    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $project_id= $rows["project_id"];
            $project_name= $rows["project_name"];
            $dept = $rows["dept"];
            
            ?>
        <tr>
        <td><?php echo "{$i}."; ?></td>
        <td><?php echo $project_id; ?></td>
        <td><?php echo $project_name ; ?></td>
        <td><?php echo $dept; ?></td>

    

      
        

    <?php 
            $i++;
            }
        }else{
            echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#linkBtn').attr('href', 'add-project.php');
                $('#linkBtn').text('Add Project');
                $('#addMsg').text('No Projects Found!');
                $('#closeBtn').text('Back');
            })
         </script>
         ";
        }
    ?>
     </tr>
    </table>
    </div>
</div>

<?php 
    require_once "include/footer.php";
?>

<?php 
    require_once "include/footer.php";
?>