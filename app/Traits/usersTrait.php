<?php

namespace App\Traits;

Trait usersTrait
{
    public function saveImage($img ,$folder){

        $file_ext = $img -> getClientOriginalExtension();
        $file_name = time().'.'.$file_ext ;
        $path = $folder ;

        $img -> move($path , $file_name);
        return $file_name ;
    }

}
