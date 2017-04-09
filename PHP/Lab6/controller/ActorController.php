<?php

require_once('./model/ActorModel.php');

class ActorController
{
    public $model;

    public function __construct()
    {
        $this->model = new ActorModel();
    }

    public function displayAction()
    {
        $arrayOfActors = $this->model->getAllActors();

        include './view/displayCustomers.php';

    }

    public function updateAction($custID)
    {
        $currentActor = $this->model->getActor($custID);

        include './view/editCustomer.php';
    }

    public function commitUpdateAction($custID,$fName,$lName)
    {
        $lastOperationResults = "";

        $currentActor = $this->model->getActor($custID);

        $currentActor->setFirstName($fName);
        $currentActor->setLastName($lName);

        $lastOperationResults = $this->model->updateActor($currentActor);

        $arrayOfActors = $this->model->getAllActors();

        include './view/displayCustomers.php';
    }
    public function AddActor()
    {
        $lastOperationResults = "";


        include './view/addActor.php';
    }

    public function DeleteAction($custID)
    {
        $this->model->deleteActor($custID);
        $this->displayAction();
        include './view/displayCustomers.php';

    }

    public function SearchAction($query)
    {
        $arrayOfActors = $this->model->searchActor($query);
        include './view/displayCustomers.php';

    }

    public function CreateActor($fName,$Lname)
    {
        $lastOperationResults = "";
        $this->model->AddActor($fName,$Lname);

        include './view/addActor.php';
    }

}

?>
