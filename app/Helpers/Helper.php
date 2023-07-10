<?php

namespace App\Helpers;
use Illuminate\Support\Str;
class Helper
{
    public static function IDGenerator($model, $trow, $length = 12, $prefix){
        $data = $model::orderBy('id', 'desc')->first();
        if(!$data){
            $og_length = $length;
            $last_number = '';
                        // $number = rand(00000, 99999);
            // global $date, $letter, $big_letter;
            $date = date('ym');
            // $big_letter=array("B","C","D","F","G","H","J","K","L","M","N","P","Q","R","S","T","U","V","W","X","Z");
            // $big_letter = rand($big_letter[0], $big_letter[20]);
            $letter = Str::random(5);
            $big_letter = strtoupper($letter);
            return $prefix.$date.$big_letter;

        }else{
            // $number = rand(00000, 99999);
            // global $date, $letter, $big_letter;
            $date = date('ym');
            // $big_letter=array("B","C","D","F","G","H","J","K","L","M","N","P","Q","R","S","T","U","V","W","X","Z");
            // $big_letter = rand($big_letter[0], $big_letter[20]);
            $letter = Str::random(5);
            $big_letter = strtoupper($letter);
            return $prefix.$date.$big_letter;
        }

        
    }
}

?>