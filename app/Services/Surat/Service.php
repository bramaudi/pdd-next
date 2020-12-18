<?php

namespace App\Services\Surat;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class Service
{
    protected Collection $templatesCollection;

    public function listTemplates(bool $fresh = false): Collection
    {
        if ($fresh || empty($this->templatesCollection)) {

            $this->setTemplatesCollection(collect(Storage::files('surat/templates'))

                ->map(fn (string $templatePath) => new Parser(Storage::path($templatePath)))

                ->reject(fn (Parser $parsedTemplate) => !$parsedTemplate->isParsed()));
        }

        return $this->templatesCollection;
    }

    protected function setTemplatesCollection(Collection $templatesCollection): void
    {
        $this->templatesCollection = $templatesCollection;
    }

    //
}
