<?php

declare(strict_types=1);

namespace App;

class Book
{
    private static int $nextId = 1;
    private int $id;
    private string $title = '';
    private array $authors = [];
    private string $publisher = '';
    private int $year = 0;

    public function __construct()
    {
        $this->id = self::$nextId++;
    }

    public function __toString(): string
    {
        $output = "ID: {$this->id}" . PHP_EOL;
        $output .= "Title: {$this->title}" . PHP_EOL;

        foreach ($this->authors as $index => $author) {
            $num = $index + 1;
            $output .= "Author{$num}: {$author}" . PHP_EOL;
        }
        $output .= "Publisher: {$this->publisher}" . PHP_EOL;
        $output .= "Year: {$this->year}" . PHP_EOL;
        return $output;
    }

    // id
    public function getId(): int
    {
        return $this->id;
    }

    // title
    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    // authors
    public function getAuthors(): array
    {
        return $this->authors;
    }

    public function setAuthors(array $authors): self
    {
        $this->authors = $authors;
        return $this;
    }

    // publisher
    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): self
    {
        $this->publisher = $publisher;
        return $this;
    }

    // year
    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;
        return $this;
    }
}
