<?php

namespace App\Service\Impl;

use App\Service\ImageStorageServiceInterface;
use Cloudinary\Cloudinary;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageStorageService implements ImageStorageServiceInterface
{
    public function __construct(
        private readonly Cloudinary $cloudinary
    ) {}

    public function store(UploadedFile $file, string $folder): string
    {
        $folder = trim($folder, '/');

        $ext = strtolower($file->guessExtension() ?: $file->getClientOriginalExtension() ?: 'bin');
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if (!in_array($ext, $allowed, true)) {
            throw new \RuntimeException("Extension non autorisée: .$ext");
        }

        $result = $this->cloudinary->uploadApi()->upload(
            $file->getRealPath(),
            [
                'folder' => $folder,
                'resource_type' => 'image',
                'unique_filename' => true,
                'use_filename' => false,
            ]
        );

        $url = (string)($result['secure_url'] ?? '');
        if ($url === '') {
            throw new \RuntimeException("Upload Cloudinary échoué.");
        }

        return $url;
    }
    public function replace(?string $oldPath, ?UploadedFile $newFile, string $folder): ?string
    {
        if ($newFile === null) {
            return $oldPath;
        }

        return $this->store($newFile, $folder);
    }
}
