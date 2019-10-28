<?php

class product extends controller
{

    function __construct()
    {
    }

    function index($id)
    {


        $productinfo = $this->modelobject->productinfo($id);
        $getgallery=$this->modelobject->Getgallery($id);
        $only_digikala = $this->modelobject->only_digikala_slider();
        $data = array($productinfo, $only_digikala,$getgallery);
        $this->view('product/index', $data);
    }

    function tab($id,$idcategory)
    {

        $number = $_POST['number'];
        if ($number == 0) {
            $naghd = $this->modelobject->naghd($id);
            $data = [$naghd];
            $this->view('product/tab1', $data, 1, 1);
        }
            if ($number == 1) {
                $fanni = $this->modelobject->fanni($idcategory,$id);
                $data =array($fanni);
                $this->view('product/tab2', $data, 1, 1);
            }
                if ($number == 2) {
                    $comment_param=$this->modelobject->commen_param($idcategory,$id);
                    $comment_name=$comment_param[0];
                    $comment_score=$comment_param[1];
                    $comment=$this->modelobject->getcomment($id);
                    $data2=array($comment_name,$comment,$comment_score);
                    $this->view('product/tab3', $data2, 1, 1);

                }
                if ($number == 3) {
                    $question=$this->modelobject->getquestion($id);
                    $questions=$question[0];
                    $answers=$question[1];
                    $data=array($questions,$answers);
                    $this->view('product/tab4', $data, 1, 1);
                }

            }
}
?>



