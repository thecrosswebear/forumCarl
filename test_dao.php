<!DOCTYPE html>
<?php
    $page_title = 'test dao';
    echo "<h2>".$page_title."<h2>";
    
    require_once('includes/header.php');
    require_once('classes/UserDAO.class.php');
    $mexico = array('YU'=> "Yucatan", "BC" => 'BritishFaggots');
    $usa = array('MD'=> "Maryland", 'DW'=> 'Delaware');
    
    foreach($mexico as $code => $territory)
    {
        
        echo "Abreviation: ".$code." Territoire: ".$territory."<br>";
    }
    
    
    
    
    
    $canada = array("QC"=> "Quebec", "ON"=> 'Ontario', 'SA' => 'Saskatchewan');
    
    echo "<table>
            <tr>
                <th>Abrev</th>
                <th>Province</th>
            </tr>";
    foreach($canada as $abrev => $province)
    {
        echo"<tr><td>".$abrev."</td><td>".$province."</td></tr>";
    }
    echo "</table>";
    
    $northAmerica = array('MEXICO' => $mexico, 'USA'=>$usa, 'CANADA'=>$canada);
    
    echo "<table>
            <tr>
                <th>abrevGROSARRAY</th>
                <th>provGROSARRAY</th>

            </tr>";
    
    foreach($northAmerica as $countryName => $arrayCountry)
    {
        foreach($arrayCountry as $codeAbrev => $fullProvince)
        {
            echo"<tr><td>".$codeAbrev."</td><td>".$fullProvince."</td></tr>";
        }
    }
    /*$userdao = new UserDAO();
    $user5=$userdao->find('tim');
    echo"<h3>".$user5."</h3>";  //
    $user66=$userdao->find('tim');
    echo"<h3>".$user66."</h3>"; 
    $user6=$userdao->find("pearljam");
    echo"<h3>".$user6."</h3>";
     * */
     
    //$liste=$dao->findAll();
    
    
    //$dao2 = new UserDAO();
    //$user5=$dao2->find('tim');
    
    /*while ($liste->next())
    {
        $user = $liste->getCurrent();
        echo "<br>".$user."<br>";
        
    }

    echo "<h2>Liste 2 <h2>";
    $dao2 = new UserDAO();
    $liste2=$dao2->findAll();
    
    while ($liste2->next())
    {
        $user2 = $liste2->getCurrent();
        echo "<br>".$user2."<br>";
        
    }
     * */
     

    include ('includes/footer.php');
?>