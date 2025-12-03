<?php

declare(strict_types = 1);

namespace App\Tests;

use App\HashMap;
use PHPUnit\Framework\TestCase;
use UnderflowException;

class HashMapTest extends TestCase
{
    public function testSetAndGetValue(): void
    {
        $map = new HashMap();
        $map->set('key1', 42);

        $this->assertSame(42, $map->get('key1'));
    }

    public function testGetWithDefaultReturnsDefaultWhenKeyNotExist(): void
    {
        $map = new HashMap();
        $this->assertSame('default', $map->get('missing', 'default'));
    }

    public function testGetThrowsExceptionWhenKeyNotExistAndNoDefault(): void
    {
        $this->expectException(UnderflowException::class);
        $this->expectExceptionMessage("HashMap: chave 'missing' não existe.");

        $map = new HashMap();
        $map->get('missing');
    }

    public function testRemoveExistingKey(): void
    {
        $map = new HashMap();
        $map->set('key1', 42);

        $this->assertTrue($map->remove('key1'));
        $this->assertFalse($map->has('key1'));
        $this->assertSame(0, $map->size());
    }

    public function testRemoveNonExistingKeyReturnsFalse(): void
    {
        $map = new HashMap();
        $this->assertFalse($map->remove('missing'));
    }

    public function testHasKey(): void
    {
        $map = new HashMap();
        $map->set('key1', 42);

        $this->assertTrue($map->has('key1'));
        $this->assertFalse($map->has('key2'));
    }

    public function testSize(): void
    {
        $map = new HashMap();
        $this->assertSame(0, $map->size());

        $map->set('key1', 42);
        $this->assertSame(1, $map->size());

        $map->set('key2', 100);
        $this->assertSame(2, $map->size());

        $map->remove('key1');
        $this->assertSame(1, $map->size());
    }
}
