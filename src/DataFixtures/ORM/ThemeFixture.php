<?php
/**
 * UserFixture.php
 *
 * @since 05/05/17
 * @author gseidel
 */

namespace App\DataFixtures\ORM;

use App\DataFixtures\AbstractFixture;
use Enhavo\Bundle\UserBundle\Entity\User;

class ThemeFixture extends AbstractFixture
{
    /**
     * @inheritdoc
     */
    function create($args)
    {
        $theme = $this->container->get('enhavo_theme.factory.theme')->createNew();
        $theme->setKey($args['key']);
        $theme->setActive($args['active']);

        return $theme;
    }

    /**
     * @inheritdoc
     */
    function getName()
    {
        return 'Theme';
    }

    /**
     * @inheritdoc
     */
    function getOrder()
    {
        return 2;
    }
}
