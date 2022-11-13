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
 * Stages Context.
 */
class Stages extends Api
{
    /**
     * {@inheritdoc}
     */
    protected $endpoint = 'stages';

    /**
     * {@inheritdoc}
     */
    protected $listName = 'stages';

    /**
     * {@inheritdoc}
     */
    protected $itemName = 'stage';

    protected $bcRegexEndpoints = [
        'stages/(.*?)/contact/(.*?)/add'    => 'stages/$1/contact/add/$2', // 2.6.0
        'stages/(.*?)/contact/(.*?)/remove' => 'stages/$1/contact/remove/$2', // 2.6.0
    ];

    /**
     * {@inheritdoc}
     */
    protected $searchCommands = [
        'ids',
    ];

    /**
     * Add a contact to the stage.
     *
     * @param int $id        Stage ID
     * @param int $contactId Contact ID
     *
     * @return array|mixed
     */
    public function addContact($id, $contactId)
    {
        return $this->makeRequest($this->endpoint.'/'.$id.'/contact/'.$contactId.'/add', [], 'POST');
    }

    /**
     * Remove a contact from the stage.
     *
     * @param int $id        Stage ID
     * @param int $contactId Contact ID
     *
     * @return array|mixed
     */
    public function removeContact($id, $contactId)
    {
        return $this->makeRequest($this->endpoint.'/'.$id.'/contact/'.$contactId.'/remove', [], 'POST');
    }
}
