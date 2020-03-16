<?php

if (!function_exists('uploader')) {
    function uploader($file, $type)
    {
        $folder = $type.'/'.date('Ym', time()).'/'.date('d', time());

        $extension = strtolower($file->getClientOriginalExtension()) ?: 'zip';
        // 值如：1545971507_PYHH0zoX9u.zip
        $name = time().'_'.\Str::random(10).'.'.$extension;

        $path = $file->storeAs($folder, $name);

        return config('filesystems.disks.public.url').'/'.$path;
    }
}
