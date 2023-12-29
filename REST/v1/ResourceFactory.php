<?php
class ResourceFactory
{

    public function GetResource($resourceName)
    {

        switch ($resourceName) {
            case "position":
                return new PositionController();            

            default:
                http_response_code(404);
                exit;
        }
    }
}
