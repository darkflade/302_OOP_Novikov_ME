<?php

declare(strict_types=1);

namespace App;

use RuntimeException;
use OutOfRangeException;

class BooksList
{
    private array $books = [];

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
            throw new OutOfRangeException("Book at index $n does not exist.");
        }
        return $this->books[$n];
    }

    public function store(string $fileName): void
    {
        $data = serialize($this->books);
        if (file_put_contents($fileName, $data) === false) {
            throw new RuntimeException("Failed to write to file: $fileName");
        }
    }

    public function load(string $fileName): void
    {
        if (!file_exists($fileName)) {
            throw new RuntimeException("File not found: $fileName");
        }

        $data = file_get_contents($fileName);
        $books = unserialize($data, ['allowed_classes' => [Book::class]]);

        if (!is_array($books)) {
            throw new RuntimeException("Failed to load valid books array from file: $fileName");
        }

        $this->books = $books;
    }
}
