<?php

namespace App\Console\Commands;

use App\PublicSite\ValidatePublicProjectionSnapshot;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('public-projection:validate {--snapshot= : Validate a specific immutable version} {--strict : Reject undeclared files} {--json : Emit machine-readable output}')]
#[Description('Validate the active public projection snapshot and its integrity manifest')]
class ValidatePublicProjectionCommand extends Command
{
    public function handle(ValidatePublicProjectionSnapshot $validator): int
    {
        $version = $this->option('snapshot');
        $result = $validator->handle(is_string($version) && $version !== '' ? $version : null, (bool) $this->option('strict'));

        if ($this->option('json')) {
            $this->line(json_encode([
                'valid' => $result->isValid(),
                'version' => $result->version,
                'validated_files' => $result->validatedFiles,
                'errors' => $result->errors,
            ], JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES));
        } elseif ($result->isValid()) {
            $this->info("Projection [{$result->version}] is valid ({$result->validatedFiles} files).");
        } else {
            $this->error("Projection [{$result->version}] is invalid.");

            foreach ($result->errors as $error) {
                $this->line(" - {$error}");
            }
        }

        return $result->isValid() ? self::SUCCESS : self::FAILURE;
    }
}
