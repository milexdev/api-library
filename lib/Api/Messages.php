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
 * Marketing Messages Context.
 */
class Messages extends Api
{
    /**
     * {@inheritdoc}
     */
    protected $endpoint = 'messages';

    /**
     * {@inheritdoc}
     */
    protected $listName = 'messages';

    /**
     * {@inheritdoc}
     */
    protected $itemName = 'message';
}
