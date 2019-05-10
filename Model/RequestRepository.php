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

use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Mageguru\Customrequest\Model\ResourceModel\Request\CollectionFactory as RequestCollectionFactory;
use Mageguru\Customrequest\Api\RequestRepositoryInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Mageguru\Customrequest\Api\Data\RequestSearchResultsInterfaceFactory;
use Mageguru\Customrequest\Api\Data\RequestInterfaceFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Mageguru\Customrequest\Model\ResourceModel\Request as ResourceRequest;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\DataObjectHelper;

class RequestRepository implements RequestRepositoryInterface
{

    protected $searchResultsFactory;

    protected $dataObjectHelper;

    private $storeManager;

    private $collectionProcessor;

    protected $dataRequestFactory;

    protected $extensibleDataObjectConverter;
    protected $extensionAttributesJoinProcessor;

    protected $requestCollectionFactory;

    protected $requestFactory;

    protected $resource;

    protected $dataObjectProcessor;


    /**
     * @param ResourceRequest $resource
     * @param RequestFactory $requestFactory
     * @param RequestInterfaceFactory $dataRequestFactory
     * @param RequestCollectionFactory $requestCollectionFactory
     * @param RequestSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceRequest $resource,
        RequestFactory $requestFactory,
        RequestInterfaceFactory $dataRequestFactory,
        RequestCollectionFactory $requestCollectionFactory,
        RequestSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->requestFactory = $requestFactory;
        $this->requestCollectionFactory = $requestCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataRequestFactory = $dataRequestFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Mageguru\Customrequest\Api\Data\RequestInterface $request
    ) {
        /* if (empty($request->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $request->setStoreId($storeId);
        } */
        
        $requestData = $this->extensibleDataObjectConverter->toNestedArray(
            $request,
            [],
            \Mageguru\Customrequest\Api\Data\RequestInterface::class
        );
        
        $requestModel = $this->requestFactory->create()->setData($requestData);
        
        try {
            $this->resource->save($requestModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the request: %1',
                $exception->getMessage()
            ));
        }
        return $requestModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($requestId)
    {
        $request = $this->requestFactory->create();
        $this->resource->load($request, $requestId);
        if (!$request->getId()) {
            throw new NoSuchEntityException(__('request with id "%1" does not exist.', $requestId));
        }
        return $request->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->requestCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Mageguru\Customrequest\Api\Data\RequestInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Mageguru\Customrequest\Api\Data\RequestInterface $request
    ) {
        try {
            $requestModel = $this->requestFactory->create();
            $this->resource->load($requestModel, $request->getRequestId());
            $this->resource->delete($requestModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the request: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($requestId)
    {
        return $this->delete($this->getById($requestId));
    }
}
