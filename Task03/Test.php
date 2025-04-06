<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Book;
use App\BooksList;

function runTest()
{
    // set methods of Book
    $book1 = (new Book())
        ->setTitle("World and War")
        ->setAuthors(["L. N. Tolstoy"])
        ->setPublisher("Pub")
        ->setYear(1819);

    $book2 = (new Book())
        ->setTitle("1984")
        ->setAuthors(["George Orwell"])
        ->setPublisher("Secker & Warburg")
        ->setYear(1949);


    // __toString()
    echo "__toString() test" . PHP_EOL . $book2;

    // add to Bookslist
    $booksList = new BooksList();
    $booksList->add($book1);
    $booksList->add($book2);

    // store()
    $booksList->store('books_list.dat');

    // load()
    $loadedBooksList = new BooksList();
    $loadedBooksList->load('books_list.dat');

    // count()
    echo "Loaded {$loadedBooksList->count()} books" . PHP_EOL;

    // get() method test in both clases
    echo
    "First book(get test):" . PHP_EOL .
    "Id {$loadedBooksList->get(0)->getId()}" . PHP_EOL .
    "Title {$loadedBooksList->get(0)->getTitle()}" . PHP_EOL .
    "Author {$loadedBooksList->get(0)->getAuthors()[0]} " . PHP_EOL .
    "Publisher {$loadedBooksList->get(0)->getPublisher()}" . PHP_EOL .
    "Year {$loadedBooksList->get(0)->getYear()}" . PHP_EOL;
}
