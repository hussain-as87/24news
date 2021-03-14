<?php
/*
Class Hellpers Function
By TiToASH
*/
class UploadImage
{
    /*
        Get uploade photo
    */
    public static function upload_image($photo,$path)
    {
        $extension = $photo -> getClientOriginalExtension();
        $image_name = time() . '.' . $extension;
        $photo -> storeAs($path,$image_name);
        return $image_name;
    }

}
