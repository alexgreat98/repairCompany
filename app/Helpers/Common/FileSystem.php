<?php
/**
 * Created by PhpStorm.
 * User: jhon
 * Date: 08.10.2019
 * Time: 23:58
 */

namespace App\Helpers\Common;

use Illuminate\Support\Facades\Storage;

class FileSystem
{
    public static function save_portfolio($name, $file){
        //$res = Storage::disk('portfolio')->put('p', $file);
        $res= Storage::putFileAs('p', $file, $name);
        return $res;
    }
    public static function rem_portfolio($name){
        $res = Storage::disk('portfolio')->delete('portfolio/'.$name);
        return $res;
    }

    public static function delete_service_image($service)
    {
        return Storage::disk('services')->delete($service->image);
    }
}
