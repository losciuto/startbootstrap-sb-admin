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
?>