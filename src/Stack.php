<?php

declare(strict_types = 1);

namespace App;

use UnderflowException;

class Stack
{
    /**
     * @var mixed[]
     */
    private array $items = [];

    public function push(mixed $value): void
    {
        $this->items[] = $value;
    }

    public function pop(): mixed
    {
        if (!$this->isEmpty()) {
            return array_pop($this->items);
        }

        throw new UnderflowException('Stack is empty.');
    }

    public function peek(): mixed
    {
        if (!$this->isEmpty()) {
            return ($this->items[array_key_last($this->items)]);
        }

        throw new UnderflowException('Stack is empty.');
    }

    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    public function size(): int
    {
        return count($this->items);
    }
}
