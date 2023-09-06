## Шаги для запуска
!`Примечание: Пункты  1 и 2 обязательны для выполнения, они необходимы для настройки проекта и его запуска.`

1) Клонируем проект
    - `git clone git@github.com:jtokoev/travel-club-calc.git && cd travel-club-calc`
2) Собираем проект
    - прежде убедитесь, что порты `8800(nginx)` свободен, если нет, то необходимо отредактировать порт в [docker-compose.override.yml.dist](docker-compose.override.yml.dist)
    - команда: `make build`.

3) Тесты
    - команда: `make check`

4) http://localhost:8800 (укажите свой порт если вы поменяли)



## Про тесты
- Написал функциональный тест
- Также написал 1 unit есть в качестве демонтрации [CalculatorTest.php](app%2Ftests%2FUnit%2FService%2FCalculatorTest.php)

## Использовал:
- [Docker](https://www.docker.com/): Контейнеризация.
- [Symfony 6.3](https://symfony.com/): PHP-фреймворк.
- [PHP 8.2](https://www.php.net/): PHP.
- [Php-cs-fixer (Phpfixer)](https://cs.symfony.com/): Форматирование PHP-кода.
- [Psalm](https://psalm.dev/): Статический анализатор PHP.
- [PHPUnit](https://phpunit.de/): Тестирование.
- [Makefile](https://www.gnu.org/software/make/manual/make.html): Автоматизация сборки.
- [PhpStorm](https://www.jetbrains.com/phpstorm/): IDE

## Операционная система:

- macOS Ventura

## Девайс:

- MacBook 16 M1 Pro

## Контакты:

- Телеграм: [@tokoevj](https://t.me/tokoevj)
