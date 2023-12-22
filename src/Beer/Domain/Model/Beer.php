<?php

namespace App\Beer\Domain\Model;

use DateTimeImmutable;

class Beer
{
    public ?DateTimeImmutable $date = null;

    final public const DATE_FORMAT = 'm/Y';
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $tags,
        string $date,
        public readonly string $description,
        public readonly string $image
    ) {
        $this->date = $date ? DateTimeImmutable::createFromFormat(self::DATE_FORMAT, $date) : null;
    }
}
