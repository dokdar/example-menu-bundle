<?php

namespace Gajdaw\ExampleMenuBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Gajdaw\ExampleMenuBundle\Entity\Menu;
use Doctrine\Common\Persistence\ObjectManager;

class LoadData implements FixtureInterface
{
    function load(ObjectManager $manager)
    {
        $xml = simplexml_load_file('data/menu.xml');
        foreach ($xml->option as $s) {
            $menu = new Menu();
            $menu->setTitle($s->title);
            $menu->setContents($s->contents);
            $manager->persist($menu);
        }
        $manager->flush();
    }
}
