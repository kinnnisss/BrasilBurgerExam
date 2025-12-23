<?php

namespace App\Service\Impl;

use App\Service\ImageStorageServiceInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageStorageService implements ImageStorageServiceInterface
{
    public function __construct(
        private readonly Filesystem $filesystem,
        private readonly string $uploadDir
    ) {}

    public function store(UploadedFile $file, string $folder): string
    {
        $folder = trim($folder, '/');
        $targetDir = rtrim($this->uploadDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $folder;

        if (!$this->filesystem->exists($targetDir)) {
            $this->filesystem->mkdir($targetDir, 0775);
        }

        $ext = $file->guessExtension() ?: $file->getClientOriginalExtension() ?: 'bin';
        $ext = strtolower($ext);

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if (!in_array($ext, $allowed, true)) {
            throw new \RuntimeException("Extension non autorisée: .$ext");
        }

        $name = bin2hex(random_bytes(16)) . '.' . $ext;
        $file->move($targetDir, $name);

        return $folder . '/' . $name;
    }
    public function delete(string $relativePath): void
    {
        $relativePath = ltrim($relativePath, '/');
        $path = rtrim($this->uploadDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $relativePath;

        if ($this->filesystem->exists($path)) {
            $this->filesystem->remove($path);
        }
    }


}
