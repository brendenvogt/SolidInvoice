<?php

declare(strict_types=1);

/*
 * This file is part of CSBill project.
 *
 * (c) 2013-2016 Pierre du Plessis <info@customscripts.co.za>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CSBill\DataGridBundle\Controller;

use CSBill\CoreBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DataController extends BaseController
{
    /**
     * @param Request $request
     * @param string  $name
     *
     * @return Response
     *
     * @throws \CSBill\DataGridBundle\Exception\InvalidGridException
     */
    public function getDataAction(Request $request, string $name): Response
    {
        $grid = $this->get('grid.repository')->find($name);

        $grid->setParameters($request->get('parameters', []));

        return $this->serializeJs($grid->fetchData($request, $this->getEm()));
    }
}