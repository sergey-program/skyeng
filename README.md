Возможный неточности или простое нежелание "сильно парится" на счёт тестового задания.
К примеру в графике показывается банальное количество пользователей, а не процентное 
соотношени как это указано. Или в бд миграции не прописаны внешние ключи, т.к. с ними 
боль при тестах. В конечном итоге желаемое реализовано.

1. Настраиваем хост.
1.1 Клоним репу (в репе уже лежит вендор для простоты поднятия).
2. Настраиваем конфиг (бд).
3. Запускаем миграцию.
4. Запускаем php yii base/create-data (возможно займёт какое то время).
5. Заходим на хост - проверяем (смотреть в навигацию).

Важный момент, у нас юзер фиктивный но он есть, автомтом логинится (реализован плохо). 

На счёт задачи сортировке в файле - сортировка пузырковым методом. Только у нас в
проверке будет два этапа, первый этап это "больше либо меньше, или равно" id, если 
равно то ещё проверка "по дате". Согласно этим проверкам уже "поднимаем" или "опускаем" 
строку в файле, тем самым получим желаемый результат.


Оригинал тестового задания 
=============================================================================
Тестовое задание для разработчика
Комплексная задача

Для учета потенциальных клиентов необходимо создать таблицу в базе данных, в которой будут храниться:
имя и фамилия клиента;
номер телефона клиента;
текущий статус клиента (новый, зарегистрирован, отказался, недоступен);
время, когда мы получили этого клиента.

Первая страница: пользователь добавляет новых клиентов в эту таблицу и затем в любое время может менять им статусы.

Вторая страница: отчет по результатам работы с клиентами, который демонстрирует конверсию по периодам, начиная от даты получения первого клиента. Конверсия, в данном случае, это процент зарегистрированных клиентов от общего числа всех клиентов. Количество дней в каждом периоде должно определяться пользователем. Привествуется вывод отчета в виде графика, где X - это номер периода, Y - это конверсия.

Дополнительно (но не обязательно): добавить на страницу отчета чекбокс, который включает предсказание конверсии. 

Предсказание работает следующим образом: Сначала высчитывается отношение зарегистированых пользователей к потерянным за выбранный период, а затем делается предположение, что пользователи в статусе “новый” и “недоступен” (все еще неопределившиеся) получат такое же распределение, как и определившиеся пользователи для этого периода. Далее вычисляется конверсия так, как будто все пользователи уже определились.

Требования:
— можно использовать любой фреймворк, но не обязательно
— итоговое приложение должно уметь запускаться на встроенном в php сервере
— проект должен работать на  php 5.4+, mysql 5.6+.

Выложите схему базы в виде sql-файла на github.com вместе с приложением.

Вопросы по MySQL

1. Есть таблица платежей пользователей:

CREATE TABLE payments (
`id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
`student_id` INT NOT NULL,
`datetime` DATETIME NOT NULL,
`amount` FLOAT DEFAULT 0,
INDEX `student_id` (`student_id`)
);

Необходимо составить запрос, который находит пользователя, чья сумма платежей находится на втором месте после максимальной.


2. Есть две таблицы. Первая содержит основные данные по студентам:

CREATE TABLE student (
`id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
`name` VARCHAR(20) NOT NULL,
`surname` VARCHAR(20) DEFAULT '' NOT NULL,
`gender` ENUM('male', 'female', 'unknown') DEFAULT 'unknown',
INDEX `gender` (`gender`)
);

Вторая содержит историю статусов студентов, где последний по хронологии статус является текущим:

CREATE TABLE student_status (
`id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
`student_id` INT NOT NULL,
`status` ENUM('new', 'studying', 'vacation', 'testing', 'lost') DEFAULT 'new' NOT NULL,
`datetime` DATETIME NOT NULL,
INDEX `student_id` (`student_id`),
INDEX `datetime` (`datetime`)
);


Необходимо показать имена и фамилии всех студентов, чей пол до сих не известен (gender = 'unknown') и они сейчас находятся на каникулах (status = ‘vacation’).



3. Используя три предыдущие таблицы, найти имена и фамилии всех студентов, которые заплатили не больше трех раз и перестали учиться (status = ‘lost’). Нулевые платежи (amount = 0) не учитывать.


И еще одна задача

В одном файле хранятся ID пользователей и время их заходов на сайт за 5 лет существования сайта в произвольном порядке. Известно, что существует порядка миллиона пользователей, четверть из которых были активными. Активные пользователи в среднем по 100 раз в день заходили на какую-либо страницу сайта.

Необходимо описать в понятной форме наиболее оптимальный алгоритм создания нового файла, в котором записи из первого файла будут отсортированы по поряду возрастания ID, а для одинаковых ID по хронологии. (Можно написать небольшую программу на PHP, но не обязательно)

    Например, если в исходном файле:
    1234567890 2013-03-08 12:26:09
    0987654321 2013-03-09 09:23:17
    1234567890 2014-01-01 00:00:34
    0087645544 2015-02-03 17:45:01
0087645544 2015-01-03 11:05:06

    В результирующем должно быть:
0087645544 2015-01-03 11:05:06
0087645544 2015-01-03 17:45:01
0987654321 2013-03-09 09:23:17
1234567890 2013-03-08 12:26:09
1234567890 2014-01-01 00:00:34