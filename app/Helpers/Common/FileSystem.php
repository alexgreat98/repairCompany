<?php
/**
 * Created by PhpStorm.
 * User: jhon
 * Date: 08.10.2019
 * Time: 23:58
 */

namespace App\Helpers\Common;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileSystem
{
    public static function save_portfolio($name, $file)
    {
        //$res = Storage::disk('portfolio')->put('p', $file);
        $res = Storage::putFileAs('p', $file, $name);
        return $res;
    }

    public static function rem_portfolio($name)
    {
        $res = Storage::disk('portfolio')->delete('portfolio/' . $name);
        return $res;
    }

    public static function add_service_image($file)
    {
        $filename = Str::random() . '.' . $file->file('file')->clientExtension();
        $file->file('file')->storeAs('/public/services', $filename);

        return $filename;
    }

    public static function delete_service_image($name)
    {
        return Storage::disk('services')->delete($name);
    }
}
