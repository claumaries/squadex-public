<?php

namespace App\PublicSite;

final readonly class ProjectionValidationResult
{
    /** @param  list<string>  $errors */
    public function __construct(
        public string $version,
        public array $errors,
        public int $validatedFiles,
    ) {}

    public function isValid(): bool
    {
        return $this->errors === [];
    }
}
