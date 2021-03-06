<?php
/**
 * Created by PhpStorm.
 * User: anna.karutina
 * Date: 23.01.2018
 * Time: 14:13
 */

// loome menüü ehitamiseks vajalikud objektid
$menuTmpl = new template('menu.menu'); // menüü mall
$itemTmpl = new template('menu.item'); // menüü elemendi mall

// koostame menüü ja sisu loomise päringu
$sql = 'SELECT content_id, content, title '.
    'FROM content WHERE parent_id='.fixDB(0).
    ' AND show_in_menu='.fixDB(1);
$result = $db->getData($sql); //loeme andmed andmebaasist

// kui andmed on andmebaasist olemas
// siis loome menüü nende põhjal
if($result != false){
    foreach ($result as $page){
        $itemTmpl->set('name', $page['title']);
        $link = $http->getLink(array('page_id'=>$page['content_id']));
        $itemTmpl->set('link', $link);
        $menuTmpl->add('menu_items', $itemTmpl->parse());
    }
}
// need elemendid ei ole juba andmebaasist
// sisse logimine
// loome mitte sisse logitud kasutaja jaos user_id
define('USER_ID', 0);
// näitame antud kasutajale logi sisse menüüd
$itemTmpl->set('name', 'logi sisse');
$link = $http->getLink(array('control'=>'login'));
$itemTmpl->set('link', $link);
$menuTmpl->add('menu_items', $itemTmpl->parse());
// paneme paika valmismenüü
$mainTmpl->set('menu', $menuTmpl->parse());