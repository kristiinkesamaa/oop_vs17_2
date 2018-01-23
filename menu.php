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

// loome üks menüü element nimega esimene
$itemTmpl->set('name', 'esimene');
// lisame antud element menüüsse
$menuItem = $itemTmpl->parse(); // string, mis sisaldab ühe nimekirja elemendi lingiga
$menuTmpl->set('menu_items', $menuItem); // nüüd olemas paar 'menu_items'=>'<li>...</li>

// ehitame valmis menüü
$menu = $menuTmpl->parse();

// lisame valmis menüü lehele
$mainTmpl->set('menu', $menu);