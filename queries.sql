/* Добавляем пользователей */
INSERT INTO `doingsdone`.`users` (`name`, `email`, `password`) VALUES ('John Doe', 'john@gmail.com', MD5('a'));
INSERT INTO `doingsdone`.`users` (`name`, `email`, `password`) VALUES ('Bill', 'gates@ms.com', MD5('b'));
INSERT INTO `doingsdone`.`users` (`name`, `email`, `password`) VALUES ('Jane', 'jane@mail.com', MD5('c'));

/* Добавляем проекты */
INSERT INTO `doingsdone`.`projects` (`user_id`, `name`) VALUES ('1', 'Входящие');
INSERT INTO `doingsdone`.`projects` (`user_id`, `name`) VALUES ('1', 'Учеба');
INSERT INTO `doingsdone`.`projects` (`user_id`, `name`) VALUES ('1', 'Работа');
INSERT INTO `doingsdone`.`projects` (`user_id`, `name`) VALUES ('1', 'Домашние дела');
INSERT INTO `doingsdone`.`projects` (`user_id`, `name`) VALUES ('1', 'Авто');
INSERT INTO `doingsdone`.`projects` (`user_id`, `name`) VALUES ('2', 'Входящие');
INSERT INTO `doingsdone`.`projects` (`user_id`, `name`) VALUES ('3', 'Входящие');

/* Добавляем задачи */
INSERT INTO `doingsdone`.`tasks` (`project_id`, `user_id`, `name`, `deadline_at`) VALUES ('3', '1', 'Собеседование в IT компании', '2019-12-01');
INSERT INTO `doingsdone`.`tasks` (`project_id`, `user_id`, `name`, `deadline_at`) VALUES ('3', '1', 'Выполнить тестовое задание', '2019-12-25');
INSERT INTO `doingsdone`.`tasks` (`project_id`, `user_id`, `name`, `deadline_at`, `executed_at`, `status`) VALUES ('2', '1', 'Сделать задание первого раздела', '2019-12-21', '2019-03-30 18:48:33', '1');
INSERT INTO `doingsdone`.`tasks` (`project_id`, `user_id`, `name`, `deadline_at`) VALUES ('1', '1', 'Встреча с другом', '2019-12-22');
INSERT INTO `doingsdone`.`tasks` (`project_id`, `user_id`, `name`, `deadline_at`) VALUES ('4', '1', 'Купить корм для кота', '2019-03-15');
INSERT INTO `doingsdone`.`tasks` (`project_id`, `user_id`, `name`, `deadline_at`) VALUES ('5', '1', 'Заказать пиццу', '2019-03-17');
INSERT INTO `doingsdone`.`tasks` (`project_id`, `user_id`, `name`, `deadline_at`) VALUES ('1', '2', 'Приступить к созданию Windows 11', '2019-12-31');
INSERT INTO `doingsdone`.`tasks` (`project_id`, `user_id`, `name`, `deadline_at`) VALUES ('1', '3', 'Встреча с подругами', '2019-09-01');

/* Получаем список из всех проектов для одного пользователя */
SELECT name FROM `doingsdone`.`projects` WHERE user_id = 1;

/* Получаем список из всех задач для одного проекта */
SELECT * FROM `doingsdone`.`tasks` WHERE project_id = 3;

/* Помечаем задачу как выполненную */
UPDATE `doingsdone`.`tasks` SET status=1, executed_at=now() WHERE id=2;

/* Обновляем название задачи по её идентификатору */
UPDATE `doingsdone`.`tasks` SET name='Встреча с подругами в кафе' WHERE  id=8;
