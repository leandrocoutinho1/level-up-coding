<?php

declare(strict_types = 1);

namespace App;

use UnderflowException;

/**
 * Implementação simples de um HashMap usando array associativo.
 */
class HashMap
{
    /**
     * Array interno que armazena os pares chave-valor.
     *
     * @var array<string|int, mixed>
     */
    private array $items = [];

    /**
     * Adiciona ou sobrescreve um valor associado a uma chave.
     *
     * @param string|int $key   Chave usada para armazenar o valor.
     * @param mixed      $value Valor a ser armazenado.
     *
     * @return void
     */
    public function set(string|int $key, mixed $value): void
    {
        $this->items[$key] = $value;
    }

    /**
     * Obtém o valor associado a uma chave.
     *
     * Caso a chave não exista:
     *   - Se `$default` for fornecido, retorna esse valor.
     *   - Caso contrário, lança UnderflowException.
     *
     * @param string|int $key     A chave a ser buscada.
     * @param mixed|null $default Valor retornado caso a chave não exista.
     *
     * @return mixed Valor associado à chave ou o valor default.
     *
     * @throws UnderflowException Se a chave não existir *e* nenhum default for fornecido.
     */
    public function get(string|int $key, mixed $default = null): mixed
    {
        if ($this->has($key)) {
            return $this->items[$key];
        }

        if (func_num_args() === 2) {
            return $default;
        }

        throw new UnderflowException("HashMap: chave '{$key}' não existe.");
    }

    /**
     * Remove um item pela chave.
     *
     * @param string|int $key Chave do elemento a ser removido.
     *
     * @return bool Retorna true se o item existia e foi removido, false caso contrário.
     */
    public function remove(string|int $key): bool
    {
        if (!$this->has($key)) {
            return false;
        }

        unset($this->items[$key]);

        return true;
    }

    /**
     * Verifica se uma chave existe no HashMap.
     *
     * @param string|int $key Chave a ser verificada.
     *
     * @return bool True se a chave existe, false caso contrário.
     */
    public function has(string|int $key): bool
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * Retorna a quantidade de elementos armazenados.
     *
     * @return int Número total de pares chave-valor.
     */
    public function size(): int
    {
        return count($this->items);
    }
}
