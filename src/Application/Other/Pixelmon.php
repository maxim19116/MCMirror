<?php

namespace App\Application\Other;

use App\Application\ApplicationInterface;

class Pixelmon implements ApplicationInterface
{
    public function isRecommended(): bool
    {
        return false;
    }

    public function isAbandoned(): bool
    {
        return true;
    }

    public function isExternal(): bool
    {
        return false;
    }

    public function getUrl(): ?string
    {
        return null;
    }

    public function getName(): string
    {
        return 'Pixelmon';
    }

    public function getCategory(): string
    {
        return 'Other';
    }

    public function getOfficialLinks(): array
    {
        return [];
    }

    public function getVersionRegex(): array
    {
        return [
            '/[a-zA-Z]+-([0-9.]+).*/',
            '/.*(latest).*/',
        ];
    }
}