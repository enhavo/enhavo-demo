<?php

namespace App\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Enhavo\Bundle\UserBundle\Factory\UserFactory;
use Enhavo\Bundle\UserBundle\Model\UserInterface;
use Enhavo\Bundle\UserBundle\User\UserManager;

class UserFixture extends Fixture
{
    public const REFERENCE_ADMIN = 'user-admin';

    public function __construct(
        private readonly UserFactory $userFactory,
        private readonly UserManager $userManager,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        /** @var UserInterface $user */
        $user = $this->userFactory->createNew();
        $user->setEnabled(true);
        $user->setEmail('admin@enhavo.com');
        $user->setUsername('admin@enhavo.com');
        $user->setPlainPassword('admin');
        $user->addRole('ROLE_SUPER_ADMIN');

        // UserManager::update() hashes the plain password and flushes, but does
        // not persist new entities — do that first.
        $manager->persist($user);
        $this->userManager->update($user, true);

        $this->addReference(self::REFERENCE_ADMIN, $user);
    }
}
