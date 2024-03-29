<?php 
use App\Models\Groups;
    function isUppercase($value, $messages, $fail){
        if ($value != mb_strtoupper($value, 'UTF-8')){
            $fail($messages);
        }
    }
    function getAllGroups(){
        $groups = new Groups();
        return $groups->getAll();
    }
?>