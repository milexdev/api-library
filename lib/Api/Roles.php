<?php
/**
 * @copyright   2014 Milex, NP. All rights reserved.
 * @author      Milex
 *
 * @see        http://milex.org
 *
 * @license     MIT http://opensource.org/licenses/MIT
 */

namespace Milex\Api;

/**
 * Roles Context.
 */
class Roles extends Api
{
    /**
     * {@inheritdoc}
     */
    protected $endpoint = 'roles';

    /**
     * {@inheritdoc}
     */
    protected $listName = 'roles';

    /**
     * {@inheritdoc}
     */
    protected $itemName = 'role';

    /**
     * {@inheritdoc}
     */
    protected $searchCommands = [
        'ids',
        'is:admin',
        'name',
    ];
}
