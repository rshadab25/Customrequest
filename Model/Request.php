<?php
/**
 * A Magento 2 module named Mageguru/Customrequest
 * Copyright (C) 2019 Shadab Reza
 * 
 * This file is part of Mageguru/Customrequest.
 * 
 * Mageguru/Customrequest is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Mageguru\Customrequest\Model;

use Mageguru\Customrequest\Api\Data\RequestInterface;
use Mageguru\Customrequest\Api\Data\RequestInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Request extends \Magento\Framework\Model\AbstractModel
{

    protected $requestDataFactory;

    protected $dataObjectHelper;

    protected $_eventPrefix = 'mageguru_customrequest_request';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param RequestInterfaceFactory $requestDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Mageguru\Customrequest\Model\ResourceModel\Request $resource
     * @param \Mageguru\Customrequest\Model\ResourceModel\Request\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        RequestInterfaceFactory $requestDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Mageguru\Customrequest\Model\ResourceModel\Request $resource,
        \Mageguru\Customrequest\Model\ResourceModel\Request\Collection $resourceCollection,
        array $data = []
    ) {
        $this->requestDataFactory = $requestDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve request model with request data
     * @return RequestInterface
     */
    public function getDataModel()
    {
        $requestData = $this->getData();
        
        $requestDataObject = $this->requestDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $requestDataObject,
            $requestData,
            RequestInterface::class
        );
        
        return $requestDataObject;
    }
}
