<?php

if (!function_exists('uploader')) {
    function uploader($fileOrPath, $type)
    {
        if (!$fileOrPath instanceof \Illuminate\Http\UploadedFile) {
            return $fileOrPath;
        }

        $folder = $type.'/'.date('Ym', time()).'/'.date('d', time());

        $extension = strtolower($fileOrPath->getClientOriginalExtension()) ?: 'zip';
        // 值如：1545971507_PYHH0zoX9u.zip
        $name = time().'_'.\Str::random(10).'.'.$extension;

        $path = $fileOrPath->storeAs($folder, $name);

        return config('filesystems.disks.public.url').'/'.$path;
    }
}