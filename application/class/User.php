<?php
namespace Ads;

class User
{
    public $id;
    public $email;
    public $lastName;
    public $firstName;
    public $phone;

    //take array of ["attribute"=>value] and hydrate object
    public function __construct(array $array) {
        foreach($array as $attribute => $value){
            $this->$attribute = $value;
        }
    }
}