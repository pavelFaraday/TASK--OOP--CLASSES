<?php include 'inc/header.php'; ?>

<?php 
     spl_autoload_register(function($class_name){   // ERROR - on each refreshing it's readding last new record..
        include "classes/".$class_name.".php";   // https://www.youtube.com/watch?v=bRMmLo1FHK0
     });
?>

<section class="mainleft">
<?php 
      $user = new Student();
      if (isset($_POST['create'])) {
        $name = $_POST['name'];
        $dep  = $_POST['dep'];
        $age  = $_POST['age'];

        $user->setName($name);
        $user->setDep($dep);
        $user->setAge($age);

        if($user->insert()){
          echo "Data Inserted Successfully.."; 
        }
      }
?>


<!-- DELETE DATA -->
<?php 
    if(isset($_GET['action']) && $_GET['action']=='delete') {
      $id = (int)$_GET['id'];
      if ($user->delete($id)) {
        echo "Data Deleted Successfully.."; 
      }
    }
?>


<form action="" method="post">
 <table>
    <tr>
        <td>Name: </td>
        <td><input type="text" name="name" placeholder='Your Name..' required="1"/></td>    
    </tr>
    <tr>
       <td>Department: </td>
        <td><input type="text" name="dep" placeholder='Your Department..'  required="1"/></td>
    </tr>
    <tr>
       <td>Age: </td>
       <td><input type="text" name="age" placeholder='Your Age..'  required="1"/></td>
    </tr>
    <tr>
      <td></td>
        <td>
        <input type="submit" name="create" value="Submit"/>
        </td>
    </tr>
  </table>
</form>
</section>

<section class="mainright">
  <table class="tblone">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Department</th>
        <th>Age</th>
        <th>Action</th>
    </tr>
    <?php
        $i = 0; 
        foreach ($user->readAll() as $key => $value){
        $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value['name'];?></td>
        <td><?php echo $value['dep'];?></td>
        <td><?php echo $value['age'];?></td>
        <td>
      
         <?php echo "<a href='index.php?action=delete&id=".$value['id']."'>Delete</a>";?>
        </td>
    </tr>
      <?php } ?>
      

  </table>
</section>

<?php include 'inc/footer.php'; ?>