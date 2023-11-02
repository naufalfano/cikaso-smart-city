<?php

namespace App\Http\FileUpload;

use App\Exceptions\Pengecualian;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUpload
{
    private UploadedFile $uploaded_file;
    private array $available_type;
    private array $available_mime_type;
    private int $file_size_limit;
    private string $path;
    private string $name;

    private string $file_name;
    private string $real_name;

    public function __construct(UploadedFile $uploaded_file, string $path, string $name, string $real_name)
    {
        $this->uploaded_file = $uploaded_file;
        $this->path = $path;
        $this->name = trim($name);
        $this->real_name = trim($real_name);

        $this->available_type = [
            "jpg",
            "jpeg",
            "png",
            "pdf"
        ];

        $this->available_mime_type = [
            "image/jpg",
            "image/jpeg",
            "image/png",
            "application/pdf",
        ];
        $this->file_size_limit = 1048576; // 1Mb

        $this->check();
    }

    public static function create(UploadedFile $uploaded_file, string $path, string $name, string $real_name): self
    {
        return new self(
            $uploaded_file,
            "public/" . $path,
            $name,
            $real_name
        );
    }

    /**
     * @throws Exception
     */
    public function check(): void
    {
        if (
            !in_array($this->uploaded_file->getClientOriginalExtension(), $this->available_type) ||
            !in_array($this->uploaded_file->getMimeType(), $this->available_mime_type)
        ) {
            Pengecualian::lempar("Tipe File {$this->real_name} salah", 2000);
        }
        if ($this->uploaded_file->getSize() > $this->file_size_limit) {
            Pengecualian::lempar("{$this->real_name} Harus Dibawah 1Mb", 2000);
        }
    }

    /**
     * @return string
     */
    public function upload(): string
    {
        $file_front = str_replace(" ", "_", strtolower($this->name));
        $this->file_name = $file_front . "." . $this->uploaded_file->getClientOriginalExtension();
        $uploaded = Storage::putFileAs(
            $this->path,
            $this->uploaded_file,
            $this->file_name
        );
        if (!$uploaded) {
            Pengecualian::lempar("Upload {$this->real_name} Gagal", 2003);
        }

        return $this->path . '/' . $file_front;
    }

    public function getUrl()
    {
        return Storage::url($this->path . '/' . $this->file_name);
    }
}
