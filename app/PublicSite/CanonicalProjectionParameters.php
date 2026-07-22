<?php

namespace App\PublicSite;

use InvalidArgumentException;

class CanonicalProjectionParameters
{
    /**
     * @param  array<string, scalar|null>  $parameters
     * @return array<string, scalar|null>
     */
    public function normalize(array $parameters): array
    {
        foreach ($parameters as $key => $value) {
            if (! is_string($key) || (! is_scalar($value) && $value !== null)) {
                throw new InvalidArgumentException('Projection parameters must be a shallow scalar map.');
            }
        }

        ksort($parameters, SORT_STRING);

        return $parameters;
    }

    /** @param  array<string, scalar|null>  $parameters */
    public function hash(array $parameters): string
    {
        return hash('sha256', json_encode(
            $this->normalize($parameters),
            JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
        ));
    }
}
