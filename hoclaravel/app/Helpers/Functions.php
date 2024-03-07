<?php 
    function isUppercase($value, $messages, $fail){
        if ($value != mb_strtoupper($value, 'UTF-8')){
            $fail($messages);
        }
    }
?>