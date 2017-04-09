<?php

require_once './controller/ActorController.php';

$ActController = new ActorController();

if(isset($_GET['idUpdate']))
{
    $ActController->updateAction($_GET['idUpdate']);
}
elseif (isset($_POST['UpdateBtn']))
{
    $ActController->commitUpdateAction($_POST['editCustId'],$_POST['firstName'],$_POST['lastName']);
}

elseif (isset($_POST['AddActor']))
{
    $ActController->AddActor();
}

elseif (isset($_POST['AddButton']))
{
    $ActController->CreateActor($_POST['FirstName'],$_POST['LastName']);
}

elseif (isset($_GET['Delete']))
{
    $ActController->DeleteAction($_GET['Delete']);
}

elseif (isset($_POST['SubmitSearch']))
{
    $ActController->SearchAction($_POST['Search']);
}

else
{
    $ActController->displayAction();
}

?>