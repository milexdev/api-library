<?php

/*
 * @copyright   2016 Milex Contributors. All rights reserved
 * @author      Milex, Inc.
 *
 * @link        https://milex.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Milex\Tests\QueryBuilder;

use Milex\QueryBuilder\WhereBuilder;
use PHPUnit\Framework\TestCase;

class WhereBuilderTest extends TestCase
{
    public function testClauses()
    {
        $methods = [
            'eq',
            'neq',
            'lt',
            'lte',
            'gt',
            'gte',
            'like',
            'notLike',
            'in',
            'notIn',
            'between',
            'notBetween',
            'isNull',
            'isNotNull',
            'isEmpty',
            'isNotEmpty',
        ];

        $clauses      = [];
        $whereBuilder = new WhereBuilder();
        foreach ($methods as $method) {
            $ignoreWhere = false;
            switch ($method) {
                case 'in':
                case 'notIn':
                    $val = [1, 2];
                    break;
                case 'between':
                case 'notBetween':
                    $val = [1, 2];
                    $whereBuilder->$method($method, $val[0], $val[1]);
                    $ignoreWhere = true;
                    break;
                case 'isNull':
                case 'isNotNull':
                case 'isEmpty':
                case 'isNotEmpty':
                    $val = null;
                    break;
                default:
                    $val = 1;
            }
            $clauses[] = [
                'col'  => $method,
                'expr' => $method,
                'val'  => $val,
            ];

            if (empty($ignoreWhere)) {
                $whereBuilder->$method($method, $val);
            }
        }

        $this->assertEquals($clauses, $whereBuilder->getClauses());

        $andX = $whereBuilder->andX();
        $andX->eq('eq', 2)
            ->neq('neq', 2)
            ->between('between', 1, 2);

        $clauses[] = [
            'col'  => null,
            'expr' => 'andX',
            'val'  => [
                [
                    'col'  => 'eq',
                    'expr' => 'eq',
                    'val'  => 2,
                ],
                [
                    'col'  => 'neq',
                    'expr' => 'neq',
                    'val'  => 2,
                ],
                [
                    'col'  => 'between',
                    'expr' => 'between',
                    'val'  => [1, 2],
                ],
            ],
        ];

        $whereBuilder->add($andX);

        $this->assertEquals($clauses, $whereBuilder->getClauses());
    }
}
