<?php
require '../../vendor/autoload.php';
\App\Connection::getInstance();

while (true) {
    $uploadDir = '/Users/afalina/www/books';
    $book = \App\Queue::first();
    if ($book) {
        echo $book->book_id;
        $textOfFile = file_get_contents($uploadDir . '/' . $book->book_id);
        \App\Record::createForBook($book->book_id, $textOfFile);
        $book->delete();
    } else {
        sleep(1);
    }
}

function convertToUTF8($string) 
{
    if (!mb_detect_encoding($string, 'UTF-8', true)) {
        $string = mb_convert_encoding($string, 'UTF-8', 'CP1251');
    }
    return $string;
}

function splitIntoSentences($string)
{
    preg_match_all("/[^.!?\r\n]+[.!?\r\n]+/", $string, $matches);
    return $matches[0];
}