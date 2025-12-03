<?php

declare(strict_types = 1);

namespace App\Tests;

use App\Stack;
use PHPUnit\Framework\TestCase;
use UnderflowException;

class StackTest extends TestCase
{
    public function testPushAddsItem(): void
    {
        $stack = new Stack();
        $stack->push(10);

        $this->assertFalse($stack->isEmpty());
        $this->assertSame(1, $stack->size());
    }

    public function testPopRemovesAndReturnsLastItem(): void
    {
        $stack = new Stack();
        $stack->push(10);
        $stack->push(20);

        $this->assertSame(20, $stack->pop());
        $this->assertSame(1, $stack->size());
        $this->assertSame(10, $stack->peek());
    }

    public function testPeekReturnsLastItemWithoutRemoving(): void
    {
        $stack = new Stack();
        $stack->push(10);

        $this->assertSame(10, $stack->peek());
        $this->assertSame(1, $stack->size());
    }

    public function testNewStackIsEmpty(): void
    {
        $stack = new Stack();

        $this->assertTrue($stack->isEmpty());
        $this->assertSame(0, $stack->size());
    }

    public function testSize(): void
    {
        $stack = new Stack();
        $stack->push(10);
        $stack->push(20);
        $stack->push(30);

        $this->assertSame(3, $stack->size());
    }

    public function testPopOnEmptyStackThrowsException(): void
    {
        $this->expectException(UnderflowException::class);
        $this->expectExceptionMessage('Stack is empty.');

        $stack = new Stack();
        $stack->pop();
    }

    public function testPeekOnEmptyStackThrowsException(): void
    {
        $this->expectException(UnderflowException::class);
        $this->expectExceptionMessage('Stack is empty.');

        $stack = new Stack();
        $stack->peek();
    }
}
