<?php
namespace Ads\Manager;
use \Ads\Database as Database;
use \Ads\Ad as Ad;

class AdManager extends Database
{
    /**
     * @param id $id [id of ad to fetch in classified-ads database]
     * @return Ad|array [fetched Ad instance on success | ["error" => message] on fail]
     */
    public function getAdById($id){
        try{
            $database = $this -> connect();
            $select = "SELECT id, user_id, category_id, title, description, creationDate, validationDate, picture FROM ad WHERE id = :id";
            $request = $database -> prepare($select);
            $request -> bindValue(':id', $id);
            $request -> execute();
            if ($ad = $request->fetch()) {
                return new Ad($ad);
            } else {
                throw new \InvalidArgumentException("Ad not found !");
            }
        } catch (\InvalidArgumentException $e) {
            return(["error"=>$e->getMessage()]);
        }
    }
}