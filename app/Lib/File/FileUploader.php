<?php 
namespace App\Lib\File;

use Carbon\Carbon;

/**
 * Class FileUploader
 * @package App\Helpers\Libs
 */
class FileUploader extends BaseUploader
{
    /**
     * @param $file
     * @param $directory
     * @return string
     */
    public static function move($file, $directory)
    {
        $filename =  Carbon::now()->timestamp . '_' . $file->getClientOriginalName();
        $file->move('uploads/' . $directory, $filename);
        return 'uploads/' . $directory . '/' . $filename;
    }
}
