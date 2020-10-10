<?php

namespace App\Traits;
use Image;
use Illuminate\Support\Facades\Storage;
/**
 * Class FileUpload
 * @package App\Traits
 *
 */
trait FileUpload
{

    public static function image($files, $subFolder)
    {  
       
        $fileName = Storage::disk('public')->putFile($subFolder, $files);    
        return  $fileName;
    } 
    
   

}

