<?php

declare(strict_types=1);

namespace App;

use RuntimeException;
use OutOfRangeException;
use Iterator;

class BooksList implements Iterator
{
    private array $books = [];
    private int $position = 0;

    public function add(Book $book): void
    {
        $this->books[] = $book;
    }

    public function count(): int
    {
        return count($this->books);
    }

    public function get(int $n): Book
    {
        if (!isset($this->books[$n])) {
            throw new OutOfRangeException("Книга с индексом $n не существует.");
        }
        return $this->books[$n];
    }

    public function store(string $fileName): void
    {
        $data = serialize($this->books);
        if (file_put_contents($fileName, $data) === false) {
            throw new RuntimeException("Не удалось записать файл: $fileName");
        }
    }

    public function load(string $fileName): void
    {
        if (!file_exists($fileName)) {
            throw new RuntimeException("Файл не найден: $fileName");
        }

        $data = file_get_contents($fileName);
        $books = unserialize($data, ['allowed_classes' => [Book::class]]);

        if (!is_array($books)) {
            throw new RuntimeException("Не удалось загрузить существующую книгу: $fileName");
        }

        $this->books = $books;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current(): Book
    {
        return $this->books[$this->position];
    }

    public function key(): int
    {
        return $this->books[$this->position]->getId();
    }

    public function next(): void
    {
        $this->position++;
    }

    public function valid(): bool
    {
        return isset($this->books[$this->position]);
    }
}
