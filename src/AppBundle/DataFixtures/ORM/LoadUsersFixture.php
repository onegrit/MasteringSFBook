<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 18-9-14
 * Time: 上午9:51
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUsersFixture implements ORMFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setName('John');
        $user1->setBio("He is a cool guy");
        $user1->setEmail("jonh@gmail.com");
        $manager->persist($user1);

        $user2 = new User();
        $user2->setName('Jack');
        $user2->setBio("He is a cool guy too");
        $user2->setEmail("jack@outlook.com");
        $manager->persist($user2);

        $manager->flush();
    }

}