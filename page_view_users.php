<!DOCTYPE html>
<?php

//include_once('classes/Database.class.php');
include_once('classes/UserDAO.class.php');

$page_title = "Page view users";

include_once('includes/header.php');

 $display = 5; 
 
 $dao = new UserDAO();
 $records = $dao->countAll();
 echo "nombre de records: ".$records;
 
 // Determine how many pages there are....
 
 if (isset($_GET['p'])&& is_numeric($_GET['p']))
 {
     $pages = $_GET['p'];
     
 }
 else
{   // count records
     
     
     
 
        //Calculate the number of pages
        if ($records > $display)
        {
            $pages = ceil($records/$display);
        }
        else
        {
            $pages = 1; 
        }
                 
}
 // Determine where the database will be returning results
 if (isset($_GET['s'])&& is_numeric($_GET['s']))
 {
     $start = $_GET['s'];
 }
 else
 {
     $start = 0; 
 }
 
    // make the query
 
 
?>

<table>
    <tr>
        <th> user id </th>
        <th> username </th>
        <th> password</th>
        <th> first name </th>
        <th> last name </th>
        <th> email </th>
        <th> registration date </th>
    </tr>
    <?php
        
        //echo"<br>avant le while pour afficher chaque<br>";
         //$dao2 = new UserDAO();
         //echo"<br>deuxieme dao cree<br>";
        $liste = $dao->findAllLimit($start, $display);
        //echo"<br>apres deuxieme findall<br>";
        
        foreach($liste as $user)
        //while($liste->next())
        {
            //$user = $liste->getCurrent();
            echo"<tr><td>".$user->getUser_id()."</td>"."<td>".$user->getUsername()."</td><td>".$user->getPass()."</td><td>".
                    $user->getFirst_name()."</td><td>".$user->getLast_name()."</td><td>".$user->getEmail().
                    "</td><td>".$user->getRegistration_date()."</td></tr>";
        }
        
    
    
    ?>
    
    
    
</table>


<?php
echo "<br>";
echo "<h2>allo allo allo</h2>";
// print linkds
    if ($pages >1)
    {
        $current_page = ($start/$display)+1;
    }
    // make previous button
    if ($current_page !=1)
    {
        echo '<a href="page_view_users.php?s='.($start-$display).'&p='.$pages.'">Previous</a';
    }
    // make all numbered pages
    
    for ($i =1;$i<=$pages;$i++)
    {
        if ($i !=$current_page)
        {
            echo '<a href="page_view_users.php?s='.(($display * ($i-1))).'&p='.$pages.'">'.$i.'</a>';
        }
        else
        {
            echo $i.' ';
        }
    } // end of for loop
    
    
    if ($current_page != $pages)
    {
        echo '<a href="page_view_users.php?s='.($start +$display).'&p='.$pages.'">Next</a>';
    }
?>




<?php
include_once('includes/footer.php');
?>