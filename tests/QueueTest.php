<?php

declare(strict_types = 1);

namespace App\Tests;

use App\Queue;
use PHPUnit\Framework\TestCase;
use UnderflowException;

class QueueTest extends TestCase
{
    public function testEnqueueAddsItems(): void
    {
        $queue = new Queue();
        $queue->enqueue(10);

        $this->assertFalse($queue->isEmpty());
        $this->assertSame(1, $queue->size());
    }

    public function testDequeueRemovesAndReturnsFirstItem(): void
    {
        $queue = new Queue();
        $queue->enqueue(10);
        $queue->enqueue(20);

        $this->assertSame(10, $queue->dequeue());
        $this->assertSame(1, $queue->size());
        $this->assertSame(20, $queue->peek());
    }

    public function testPeekReturnsFirstItemWithoutRemoving(): void
    {
        $queue = new Queue();
        $queue->enqueue(10);
        $queue->enqueue(20);

        $this->assertSame(10, $queue->peek());
        $this->assertSame(2, $queue->size());
    }

    public function testNewQueueIsEmpty(): void
    {
        $queue = new Queue();

        $this->assertTrue($queue->isEmpty());
        $this->assertSame(0, $queue->size());
    }

    public function testSize(): void
    {
        $queue = new Queue();
        $queue->enqueue(10);
        $queue->enqueue(20);
        $queue->enqueue(30);

        $this->assertSame(3, $queue->size());
    }

    public function testDequeueOnEmptyQueueThrowsException(): void
    {
        $this->expectException(UnderflowException::class);
        $this->expectExceptionMessage('Queue is empty.');

        $queue = new Queue();
        $queue->dequeue();
    }

    public function testPeekOnEmptyQueueThrowsException(): void
    {
        $this->expectException(UnderflowException::class);
        $this->expectExceptionMessage('Queue is empty.');

        $queue = new Queue();
        $queue->peek();
    }
}
