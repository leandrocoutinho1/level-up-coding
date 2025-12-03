<?php

declare(strict_types = 1);

namespace App;

use UnderflowException;

class Queue
{
    /**
     * @var mixed[]
     */
    private array $items = [];

    public function enqueue(mixed $value): void
    {
        $this->items[] = $value;
    }

    public function dequeue(): mixed
    {
        if (!empty($this->items)) {
            $item        = $this->items[0];
            $this->items = array_slice($this->items, 1);

            return $item;
        }

        throw new UnderflowException('Queue is empty.');
    }

    public function peek(): mixed
    {
        if (!empty($this->items)) {
            return $this->items[0];
        }

        throw new UnderflowException('Queue is empty.');
    }

    public function size(): int
    {
        return count($this->items);
    }

    public function isEmpty(): bool
    {
        return empty($this->items);
    }
}
