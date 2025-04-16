<?php

declare(strict_types=1);

namespace App\Tests;

use App\BooksList;
use App\Book;
use PHPUnit\Framework\TestCase;

class BooksListTest extends TestCase
{
    public function testIteratorWithEmptyList(): void
    {
        $list = new BooksList();
        $iterated = false;

        foreach ($list as $id => $book) {
            $iterated = true;
        }

        $this->assertFalse($iterated, 'Итерация по пустому списку не должна выполняться');
    }

    public function testIteratorWithOneBook(): void
    {
        $list = new BooksList();
        $book = new Book();
        $book->setTitle('Test Book');
        $list->add($book);

        $ids = [];
        $books = [];

        foreach ($list as $id => $bookItem) {
            $ids[] = $id;
            $books[] = $bookItem;
        }

        $this->assertEquals([$book->getId()], $ids, 'Ключ должен соответствовать Id книги');
        $this->assertEquals([$book], $books, 'Значение должно соответствовать объекту книги');
    }

    public function testIteratorWithMultipleBooks(): void
    {
        $list = new BooksList();
        $book1 = new Book();
        $book1->setTitle('Book 1');
        $book2 = new Book();
        $book2->setTitle('Book 2');
        $list->add($book1);
        $list->add($book2);

        $ids = [];
        $books = [];

        foreach ($list as $id => $bookItem) {
            $ids[] = $id;
            $books[] = $bookItem;
        }

        $this->assertEquals([$book1->getId(), $book2->getId()], $ids, 'Ключи должны соответствовать Id книг');
        $this->assertEquals([$book1, $book2], $books, 'Значения должны соответствовать объектам книг');
    }

    public function testMultipleIterations(): void
    {
        $list = new BooksList();
        $book = new Book();
        $book->setTitle('Test Book');
        $list->add($book);

        $count = 0;
        foreach ($list as $id => $bookItem) {
            $count++;
        }
        $this->assertEquals(1, $count, 'Первая итерация должна пройти один раз');

        $count = 0;
        foreach ($list as $id => $bookItem) {
            $count++;
        }
        $this->assertEquals(1, $count, 'Вторая итерация должна пройти один раз');
    }
}
