<?php
    class PositionController{
        public function Execute($args, $method){
            if($method === "GET"){
                header('Content-Type: application/json; charset=utf-8');               
                
                $repo  =new  PositionRepo();
                $list = $repo->GetAllPositions();





                echo json_encode($list);
            }
            if($method === "POST"){
                echo "POST";
            }
        }
    }
?>