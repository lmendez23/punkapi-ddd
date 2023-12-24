<?php

namespace App\Beer\Domain\Model;

class Beer
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly ?string $tags,
        public readonly ?string $date,
        public readonly ?string $description,
        public readonly ?string $image
    ) {
    }
}
