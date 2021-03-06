<?php

namespace Src;

class RegExp {
    public function __construct(private string $pattern) {}

    public function matchOne(string $string): bool {
        return preg_match($this->pattern, $string) ? true : false;
    }

    public function matchAll(string $string): bool {
        return preg_match_all($this->pattern, $string) ? true : false;
    }

    public function returnMatches(string $string): array {
        $matches = [];
        preg_match_all($this->pattern, $string, $matches);

        return $matches;
    }
}
