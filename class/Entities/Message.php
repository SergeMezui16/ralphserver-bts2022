<?php
namespace RalphServer\Entities;

use RalphServer\Data\DataBase;


class Message {


    public static function addMessage(string $object, int $sender, array $recipient, string $body) : bool
    {
        $add = DataBase::connect()->prepare('INSERT INTO `message` (`Object`, `Sender`, `Recipient`, `Body`, `Status`, `created`, `modified`, `deleted`) VALUE(?,?,?,?,0, NOW(), NOW(), 0)');
        return $add->execute([$object, $sender, json_encode($recipient), $body]);
    }

    public static function delMessage(int $id) : bool
    {
        $del = DataBase::connect()->prepare('UPDATE `message` SET `deleted` = 1 WHERE `id` = ?');
        return $del->execute([$id]);
    }

    public static function getAll() : array
    {
        return DataBase::connect()->query('SELECT `id`, `Object`, `Sender`, `Recipient`, `Status`, `Body`, `created` FROM `message` WHERE `deleted` = 0 ORDER BY `created` DESC')->fetchAll();
    }

    public static function getById(int $id) : array
    {
        $message = DataBase::connect()->prepare('SELECT `id`, `Object`, `Sender`, `Recipient`, `Status`, `Body`, `created` FROM `message` WHERE `deleted` = 0 AND `id` = ? LIMIT 1');

        return $message->execute([$id]) ? $message->fetchAll() : false;
    }

    public static function getUnreadNumber(int $id) : array
    {
        $number = DataBase::connect()->prepare('SELECT COUNT(`id`) FROM `message` WHERE `deleted` = 0 AND `id` = ? AND `Status` = 0 LIMIT 1');

        return $number->execute([$id]) ? $number->fetchAll() : false;
    }
}