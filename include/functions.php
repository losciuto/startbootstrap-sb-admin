<?php

function get_header(){
    include 'include/header.php';
}
function get_navbar()
{
    include 'include/navbar.php';
}
function get_sidebar()
{
    include 'include/sidebar.php';
}
function get_breadcrumb($area){
    if ($area == "") $area = "Sommario";
    if ($area == "dettpers") $area = "Lista Personale";
    if ($area == "add_pers") $area = "Inserimento Personale";

    include 'include/breadcrumb.php';
}
function get_chartarea(){
    include 'include/chartarea.php';
}
function get_dataarea($area="")
{
    if ($area == "") { 
        include 'include/dataarea.php';
    } else {
        include "include/" . $area . ".php";
    }
}
function get_dataareadiv()
{
    include 'include/dataareadiv.php';
}
function get_footer(){
    include 'include/footer.php';
}
// funzione lookup
// parametri:
// $tab = tabella da consultare
// $field = campo da ritornare assieme al default id
// $id = eventuale id da ricercare
// $ord = eventuale ordine da impostare
// $limit = evenutale limite da impostare
// Ritorna un array con i dati ricercati
function lookup($tab,$field,$id='1',$ord="", $limit = ""){
    $res = array();
    $limite = "";
    $ordine = "";

    if($ord  != "") $ordine = "ORDER BY $ord"; 
    if($limit != "") $limite = "LIMIT 1";

    // connect to the database
    $dblu = mysqli_connect('localhost', 'root', '', 'pixpresenze');
    if ($dblu->connect_error) {
        die("Connessione fallita: " . $dblu->connect_error);
    }

    if($field == "*"){

        $select = "*";
        $sql = "DESCRIBE $tab";
        $results = mysqli_query($dblu, $sql) or die("Errore: " . $sql . "<br/>" . mysqli_error($dblu));
        while ($row = mysqli_fetch_array($results)) {
            $fields[] = $row[0];
        }
        mysqli_free_result($results);
        $sql = "SELECT $select FROM $tab WHERE $id $ordine $limite";
        $results = mysqli_query($dblu, $sql) or die("Errore: " . $sql . "<br/>" . mysqli_error($dblu));

        $row = mysqli_fetch_array($results);
        foreach($fields as $key => $fname){
            $res[$fname] = $row[$key]; 
        }
    }else{ 
        $select = "id," . $field;
        $sql = "SELECT $select FROM $tab WHERE $id $ordine $limite";

        $results = mysqli_query($dblu, $sql) or die("Errore: " . $sql . "<br/>" . mysqli_error($dblu));

        while ($row = mysqli_fetch_array($results)) {
            $res[$row[0]] = $row[1];
        }
        mysqli_close($dblu);        
    }
    return $res;
}
?>
