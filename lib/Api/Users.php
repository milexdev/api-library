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
 * Users Context.
 */
class Users extends Api
{
    /**
     * {@inheritdoc}
     */
    protected $endpoint = 'users';

    /**
     * {@inheritdoc}
     */
    protected $listName = 'users';

    /**
     * {@inheritdoc}
     */
    protected $itemName = 'user';

    /**
     * {@inheritdoc}
     */
    protected $searchCommands = [
        'ids',
        'is:admin',
        'is:active',
        'is:inactive',
        'email',
        'role',
        'username',
        'name',
        'position',
    ];

    /**
     * Get your (API) user.
     *
     * @return array|mixed
     */
    public function getSelf()
    {
        return $this->makeRequest($this->endpoint.'/self');
    }

    /**
     * Get list of permissions for a user.
     *
     * @param int          $id
     * @param string|array $permissions
     *
     * @return array|mixed
     */
    public function checkPermission($id, $permissions)
    {
        return $this->makeRequest($this->endpoint.'/'.$id.'/permissioncheck', ['permissions' => $permissions], 'POST');
    }
}
