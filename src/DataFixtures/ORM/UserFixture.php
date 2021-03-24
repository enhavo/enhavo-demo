<?php
/**
 * UserFixture.php
 *
 * @since 05/05/17
 * @author gseidel
 */

namespace App\DataFixtures\ORM;

use App\DataFixtures\AbstractFixture;
use Enhavo\Bundle\UserBundle\Model\User;

class UserFixture extends AbstractFixture
{
    /**
     * @inheritdoc
     */
    function create($args)
    {
        $user = new User(); // todo use factory
        $user->setEnabled(true);
        $user->setEmail($args['email']);
        $user->setUsername($args['email']);
        $user->setPlainPassword($args['password']);

        if(isset($args['roles']) && is_array($args['roles'])) {
            foreach($args['roles'] as $role) {
                $user->addRole($role);
            }
        }

        $this->container->get('Enhavo\Bundle\UserBundle\User\UserManager')->update($user, true, false);

        return $user;
    }

    /**
     * @inheritdoc
     */
    function getName()
    {
        return 'User';
    }

    /**
     * @inheritdoc
     */
    function getOrder()
    {
        return 1;
    }
}
