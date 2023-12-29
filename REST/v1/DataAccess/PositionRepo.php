<?php
    class PositionRepo{
        

        public function GetAllPositions(){
            

            $db = new DataBase();
            $sql = 'SELECT * FROM `sto_position` as po LEFT JOIN `sto_product` as pr on pr.ID = po.ProductID LEFT JOIN `sto_type` as ty on ty.ID = pr.TypeID LEFT JOIN `sto_container` as co on co.ID = pr.ContainerID LEFT JOIN `sto_storageyard` as ya on ya.ID = po.StorageYardID';
            $list = $db->ExecuteList($sql);
            
            return $list;
        }

        

    }
?>