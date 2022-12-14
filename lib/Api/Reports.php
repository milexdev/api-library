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
 * Reports Context.
 */
class Reports extends Api
{
    /**
     * {@inheritdoc}
     */
    protected $endpoint = 'reports';

    /**
     * {@inheritdoc}
     */
    protected $listName = 'reports';

    /**
     * {@inheritdoc}
     */
    protected $itemName = 'report';

    /**
     * {@inheritdoc}
     */
    protected $searchCommands = [
        'ids',
        'is:published',
        'is:unpublished',
        'is:mine',
    ];

    /**
     * @var array
     */
    protected $endpointsSupported = [
        'get',
        'getList',
    ];

    /**
     * Get a single report data.
     *
     * @param int      $id
     * @param int|null $limit
     * @param int|null $page
     *
     * @return array|mixed
     */
    public function get($id, $limit = null, $page = null, \DateTime $dateFrom = null, \DateTime $dateTo = null)
    {
        $options = [];

        if ($limit) {
            $options['limit'] = (int) $limit;
        }

        if ($page) {
            $options['page'] = (int) $page;
        }

        if ($dateFrom) {
            $options['dateFrom'] = $dateFrom->format('c');
        }

        if ($dateTo) {
            $options['dateTo'] = $dateTo->format('c');
        }

        return $this->makeRequest("{$this->endpoint}/$id", $options);
    }
}
