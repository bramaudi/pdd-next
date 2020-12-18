<?php

namespace App\Services\Surat;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use ZipArchive;

class Parser
{
    protected bool $parsedStatus = false;

    public string $sha1Hash, $templateStoragePath, $name, $description, $layout, $form;

    public function __construct(string $templateStoragePath)
    {
        $this->sha1Hash = sha1(File::get($templateStoragePath));

        $this->templateStoragePath = $templateStoragePath;

        $this->parse();
    }

    public function isParsed(): bool
    {
        return $this->parsedStatus;
    }

    protected function parse(): void
    {
        $zip = new ZipArchive;

        $zip->open($this->templateStoragePath);

        foreach (['name', 'code', 'description', 'layout', 'form'] as $property) {

            $this->{$property} = "";

            if (in_array($property, ['layout', 'form'])) {

                $stream = $zip->getStream(sprintf('%s.blade.php', $property));
            } else {

                $stream = $zip->getStream(sprintf('%s.txt', $property));
            }

            if (!$stream) throw new Exception(sprintf('%s of Template %s is Corrupted', Str::ucfirst($property), $this->templateStoragePath));

            while (!feof($stream)) $this->{$property} .= fread($stream, 2);

            fclose($stream);
        }

        $zip->close();

        $this->parsed();
    }

    protected function parsed(): void
    {
        $this->parsedStatus = true;
    }
}
