<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body >
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    <input type="submit" value="invio" name="invio" />
    <?php
        ///////collegamento al DB///////
        $host="localhost";
        $username="root";
        $password="";
        $db_nome="dipendenti";
        $tab_nome="azienda";

        $conn= new mysqli($host,$username,$password,$db_nome);
        if($conn -> connect_errno){
            echo"Impossibile connetersi al server:".$conn ->connect_error."\n";
            exit;
        }
        ///////collegamento al DB///////

        ///////lettura query///////

        $sql = "SELECT DISTINCT SETTORE_ATTIVITA FROM $tab_nome";

        $result=$conn -> query($sql);
        echo"<select name='settore'>";
        while($row=$result-> fetch_assoc())
        {
            echo "<option value=".$row["SETTORE_ATTIVITA"].">".$row["SETTORE_ATTIVITA"]."</option>";
        }
        echo"</select>";
        $result ->free();
        $conn-> close();

        ///////lettura query///////

        ///////sampa la citta selezionata///////
        if (isset($_POST["invio"])) {     
            $settore = $_POST["settore"];
            echo $settore;
            }
        ///////sampa la citta selezionata///////
        ?>
        
        
        </form>

    
	
</body>
</html>