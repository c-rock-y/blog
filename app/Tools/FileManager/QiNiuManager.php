<?php


namespace App\Tools\FileManager;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class QiNiuManager extends BaseManager
{
    /**
     * Handle the file upload.
     *
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     * @param string                                              $dir
     * @param string                                              $name
     *
     * @return array|bool
     */
    public function store(UploadedFile $file, $dir = '', $name = '')
    {
        $hashName = empty($name)
            ? str_ireplace('.jpeg', '.jpg', $file->hashName())
            : $name;

        $mime = $file->getMimeType();

        $realPath = $this->disk->put($dir, $file, $hashName);
        return [
            'success' => true,
            'filename' => $hashName,
            'original_name' => $file->getClientOriginalName(),
            'mime' => $mime,
            'size' => human_filesize($file->getClientSize()),
            'real_path' => $realPath,
            'relative_url' => $realPath,
            'url' => $this->disk->getUrl($realPath),
        ];
    }
}