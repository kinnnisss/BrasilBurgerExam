<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface ImageStorageServiceInterface
{
    public function store(UploadedFile $file, string $folder): string;

    public function replace(?string $oldPath, ?UploadedFile $newFile, string $folder): ?string;
}
