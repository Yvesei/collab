<?php

include "conn.php";



// print_r($_POST["checkbox"]);



$idTable =  $_POST["Id_table"];

$conn = connectionDb();
$statement = $conn->prepare("delete from pfe.site where Id_table = ?");
$statement->bindParam(1, $idTable);
$statement->execute();

for($i = 1; $i < count($_POST['Url']); $i++) {
    $idUser = 1;

    $conn = connectionDb();
    $statement = $conn->prepare("insert into pfe.site values (NULL, ?, ?, ?, ?, ?, ?, ?);");

    $statement->bindParam(1, $_POST['Url'][$i]);
    $statement->bindParam(2, $_POST['Email'][$i]);
    $statement->bindParam(3, $_POST['Pass'][$i]);
    // $statement->bindParam(1, $_POST['checkbox'][$i]);
    $checkbox = 0;

    if ($_POST['checkbox'][$i] != "on" ) {
        $checkbox = 0;
    } else {
        $checkbox = 1;
    }

    $statement->bindParam(4, $checkbox);
    $statement->bindParam(5, $_POST['comment'][$i]);
    $statement->bindParam(6, $idTable);
    $statement->bindParam(7, $idUser);

    $statement->execute();
}
    

header('Location: ' . $_SERVER['HTTP_REFERER']);




// }

// try {
//     $conn = connectionDb();
//     $statement = $conn->prepare("insert into Gestion_Ventes.Commande (Code_Client, Date)
//                     values (?, curdate());");
//     $statement->bindParam(1, $_SESSION['CodeClient']);
//     $statement->execute();

//     $LastId = $conn->lastInsertId();

//     try {
//         $values = array();

//         for ($i = 0; $i < count($_POST['IdProduit']); $i++) {
//             $_value = "(" . $LastId . "," . $_POST['IdProduit'][$i] . "," . $_POST['Qte'][$i] . ")";
//             array_push($values, $_value);
//         }
//         $values_ = implode(",", $values);
//         // echo $values_;

//         $conn = connectionDb();

//         $statement = $conn->prepare("insert into Gestion_Ventes.Ligne_Commande (Numéro_Commande, Code_Produit, Qte)
//                         values " . $values_ . " ;");
//         $statement->execute();

//         // echo "Votre commande a été bien enregistré!";
//         echo '<span style="position: absolute; top: 50%; left: 50%; transform: translateX(-50%);">Votre commande a été bien enregistré!</span>';
//     } catch (PDOException $e) {
//         echo $e;
//     }
// } catch (PDOException $e) {
//     echo $e;
// }

?>