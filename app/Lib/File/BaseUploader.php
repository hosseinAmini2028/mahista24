<?php

namespace App\Lib\File;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

/**
 * Class BaseUploader
 * @package App\Lib\File
 */
abstract class BaseUploader
{

    /**
     * @param $path
     * @return string
     */
    public static function delete($path): string
    {
        $control = new Controller;
        $newpath = $control->unassest($path);
        return File::delete($path);
    }

    /**
     * @param $file
     * @return string
     */
    protected static function fileExtension($file)
    {
        $extension = strtolower($file->getClientOriginalExtension());
        $extension = $extension == 'jpeg' ? 'jpg' : $extension;

        return '.' . $extension;
    }
}
