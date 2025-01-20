<?
require_once("functions.php");
// Задание 1:
// 1. Создайте класс Point со свойствами координат точки
// 2. Добавьте в класс метод Show, которая показывает координаты точки
// 3. Создайте класс Rectangle, наследуемый от Point,
// который имеет еще св-ва ширины и высоты прямоугольника
// 4. Переопределите метод Show, чтобы он также выводил новые свойства
// 4.2 Добавить метод, который считает площадь прямоугольника
// 5. Протестируйте код


// Базовый класс
class Point
{
    public int $x, $y; // Координаты точки
    function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    function show()
    {
        echo "x: " . $this->x . " y: " . $this->y;
    }
}
// Подкласс прямоугольник
class Rectangle extends Point
{
    public int $width, $height; // Ширина и высота прямоугольника
    function __construct($x, $y, $width, $height)
    {
        parent::__construct($x, $y);
        $this->width = $width;
        $this->height = $height;
    }
    function show()
    {
        parent::show();
        echo " + width: " . $this->width . " height: " . $this->height;
    }
    function square()
    {
        return $this->width * $this->height;
    }
}

$point = new Point(1, 2);
$point->show();
br();
br();
$rectangle = new Rectangle(4, 6, 3, 4);
$rectangle->show();
br();
echo "Площадь прямоугольника: " . $rectangle->square();


// Задание 2:
// Создайте простую систему для управления библиотекой. Вам необходимо реализовать несколько классов, использующих концепции ООП (объектно-ориентированное программирование), такие как классы, наследование и полиморфизм.
// Шаги выполнения:

// Создание базового класса:
//     Создайте класс Book с полями:
//         title (строка)
//         author (строка)
//         year (число)
// Добавьте методы:
//     getInfo() — возвращает информацию о книге в виде строки.
// Создание подклассов:
//     Создайте класс EBook, который наследует Book и добавляет поле:
//     fileSize (число, размер в МБ)
//     Переопределите метод getInfo(), чтобы он возвращал дополнительную информацию о размере файла.
//     Создайте класс PrintedBook, который наследует Book и добавляет поле:
//     pageCount (число)
//     Переопределите метод getInfo(), чтобы он возвращал информацию о количестве страниц.
// Создание класса Библиотеки:
//     Создайте класс Library, который будет содержать массив книг.
//     Реализуйте методы:
//     addBook(Book $book) — добавляет книгу в библиотеку.
//     listBooks() — выводит список всех книг с использованием метода getInfo() каждого объекта книги.
//     Тестирование:
//     Создайте несколько объектов EBook и PrintedBook.
//     Добавьте их в экземпляр класса Library и выведите информацию о всех книгах.

// Базовый класс Book
class Book
{
    public string $title, $author;
    public int $year;
    function __construct($title, $author, $year)
    {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }
    function getInfo()
    {
        return "Title: " . $this->title . " Author: " . $this->author . " Year: " . $this->year;
    }
}
// Подкласс EBook наследуется от Book + дополнительное свойство размер файла
class EBook extends Book
{
    public int $fileSize;
    function __construct($title, $author, $year, $fileSize)
    {
        parent::__construct($title, $author, $year);
        $this->fileSize = $fileSize;
    }
    function getInfo()
    {
        return parent::getInfo() . " File size: " . $this->fileSize . " MB";
    }
}
// Подкласс PrintedBook наследуется от Book + дополнительное свойство количество страниц
class PrintedBook extends Book
{
    public int $pageCount;
    function __construct($title, $author, $year, $pageCount)
    {
        parent::__construct($title, $author, $year);
        $this->pageCount = $pageCount;
    }
    function getInfo()
    {
        return parent::getInfo() . " Page count: " . $this->pageCount;
    }
}
// Библиотека содержит массив книг
class Library
{
    public $books = [];
    function __construct()
    {
        $this->books = [];
    }
    function addBook(Book $book)
    {
        $this->books[] = $book;
    }
    function listBooks()
    {
        foreach ($this->books as $book) {
            echo $book->getInfo() . br();
        }
    }
}
$library = new Library();

$ebook = new EBook("Clean Code", "Robert C. Martin", 2008, 5);
$printedBook = new PrintedBook("Design Patterns", "Erich Gamma", 1994, 395);

$library->addBook($ebook);
$library->addBook($printedBook);


$library->listBooks();


?>