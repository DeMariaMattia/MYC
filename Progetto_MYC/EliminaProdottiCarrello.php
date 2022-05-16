<?php
session_start();
if(!isset($_SESSION['ID_Cliente']))
header("location:Login.php");
?>
<?php
require_once 'Config.php';
    $CostoTotale=0;
    $Id_Utente=$_SESSION['ID_Cliente'];
        //Join carrello e tessera
        $sqlControllo="SELECT COUNT(*) as ContaProdotti FROM carrello WHERE ID_Utente=$Id_Utente";
        $resultControllo = mysqli_query($link, $sqlControllo);
        $row = mysqli_fetch_array($resultControllo);
        $count = $row['ContaProdotti'];
if($count>0){
    echo("<p class='Avvisi'>Prodotti presenti</p>");
        $sql="SELECT Quantita,PrezzoUnitario FROM prodotto,carrello WHERE ((1=1) AND (carrello.CodiceProdotto=prodotto.CodiceProdotto) AND carrello.Id_Utente=$Id_Utente)";
        if($stmt= mysqli_prepare($link,$sql)){
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result)){
                    $Quantita=$row['Quantita'];
                    $PrezzoUnitario=$row['PrezzoUnitario']; 
                    $CostoTotale=$CostoTotale+($Quantita*$PrezzoUnitario);
                    }
                    mysqli_free_result($result);
                }
            }
        }
        //Controllo Saldo
        $sqlControlloSaldo="SELECT Saldo FROM tessera WHERE (Id_Utente='$Id_Utente')";
            if($stmtControlloSaldo= mysqli_prepare($link,$sqlControlloSaldo)){
                if(mysqli_stmt_execute($stmtControlloSaldo)){
                    $result = mysqli_stmt_get_result($stmtControlloSaldo);
                    if(mysqli_num_rows($result)==1){
                        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $Saldo=$row['Saldo'];
                        if($Saldo>=$CostoTotale){
                            //Modifico il saldo  della tessera e aggiungo eventuali coupon e punti
                            //Calcolo Punti
                            $CopiaCostoTotale=$CostoTotale;
                            while($CopiaCostoTotale%10!=0){
                                if($CopiaCostoTotale%10==0){
                                    break;
                                }
                                $CopiaCostoTotale=$CopiaCostoTotale-1;
                            }
                            $CopiaCostoTotale=$CostoTotale;
                            $Punti=0;
                            while($CopiaCostoTotale%5==0){
                                $CopiaCostoTotale=$CopiaCostoTotale-5;
                                $Punti++;
                                if($CopiaCostoTotale==0){
                                    break;
                                }
                            }
                            //AggiuntaPunti
                                $sqlPunti="UPDATE tessera SET Punti=(Punti+$Punti) WHERE Id_Utente=$Id_Utente";
                                if($stmtPunti= mysqli_prepare($link,$sqlPunti)){
                                    if(mysqli_stmt_execute($stmtPunti)){
                                    }
                                    mysqli_stmt_close($stmtPunti);
                                }
                            //Coupon
                            $sqlControlloCoupon="SELECT Punti FROM tessera WHERE (Id_Utente='$Id_Utente')";
                            if($stmtCoupon= mysqli_prepare($link,$sqlControlloCoupon)){
                                if(mysqli_stmt_execute($stmtCoupon)){
                                    $result = mysqli_stmt_get_result($stmtCoupon);
                                    if(mysqli_num_rows($result)==1){
                                        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
                                        $Punti=$row['Punti'];
                                        if($Punti>=200){
                                            if($CostoTotale>=30){
                                                $CostoTotale=$CostoTotale-30;
                                                $sqlTPunti="UPDATE tessera SET Punti=(Punti-200) WHERE Id_Utente=$Id_Utente";
                                                if($stmtTPunti= mysqli_prepare($link,$sqlTPunti)){
                                                    if(mysqli_stmt_execute($stmtTPunti)){
                                                    }
                                                mysqli_stmt_close($stmtTPunti);
                                            }
                                }
                                        }
                                    }
                                }
                            }
                            //Aggiorna Saldo
                            $sqlSaldo="UPDATE tessera SET Saldo=(Saldo-$CostoTotale) WHERE Id_Utente=$Id_Utente";
                            if($stmtSaldo= mysqli_prepare($link,$sqlSaldo)){
                                if(mysqli_stmt_execute($stmtSaldo)){
                                    $CostoTotale=0;
                                    header("location:ScansioneCodice.php");
                                }
                                mysqli_stmt_close($stmtSaldo);
                            }else{
                                echo "OPS, qualcosa è andato storto... Riprovare più tardi";
                                exit();
                            }
                            mysqli_stmt_close($stmt);
                            //Elimino prodotti dal carrello
                            $sql3="DELETE FROM carrello WHERE Id_Utente=$Id_Utente";
                            if($stmt3= mysqli_prepare($link,$sql3)){
                                if(mysqli_stmt_execute($stmt3)){
                                }
                                mysqli_stmt_close($stmt3);
                            }else{
                                echo("Impossibile eliminare gli elementi dal carrello");
                            }
                        }else{
                            echo("Spiacenti, il saldo non è sufficiente per coprire il costo della spesa... Ricaricare la carta e riprovare");
                            echo("<br><a href='Carrello.php'>Ritorna al carrello</a>");
                            //Link a ricarica carta
                        }
                    }
                }
            }
}else{
    echo("<p class='Avvisi'>Spiacenti, il carrello è vuoto. Aggiungere dei prodotti prima di acquistare</p>");
    echo("<br><a href='ScansioneCodice.php'>Aggiungi prodotti</a>");
}
        mysqli_close($link);
?>