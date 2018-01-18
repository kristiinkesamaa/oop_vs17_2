<?php
/**
 * Created by PhpStorm.
 * User: anna.karutina
 * Date: 18.01.2018
 * Time: 10:21
 */

class template
{
    // template obkjekti/klassi omadused
    var $file = ''; // html vaade faili nimi
    // html vaade faili sisu, mis on klassis
    // vastava funktisooni abil loetud
    var $content = false;
    // reaalsed väärtused html vaade sablooni
    // täitmiseks
    var $vars = array();
}