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

namespace Mageguru\Customrequest\Api\Data;

interface RequestInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const COLOR = 'color';
    const SIZE = 'size';
    const CUSTOMER_ID = 'customer_id';
    const IMAGE = 'image';
    const CONTENT = 'content';
    const STATUS = 'status';
    const COMMENT = 'comment';
    const REQUEST_ID = 'request_id';

    /**
     * Get request_id
     * @return string|null
     */
    public function getRequestId();

    /**
     * Set request_id
     * @param string $requestId
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setRequestId($requestId);

    /**
     * Get customer_id
     * @return string|null
     */
    public function getCustomerId();

    /**
     * Set customer_id
     * @param string $customerId
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setCustomerId($customerId);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Mageguru\Customrequest\Api\Data\RequestExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Mageguru\Customrequest\Api\Data\RequestExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Mageguru\Customrequest\Api\Data\RequestExtensionInterface $extensionAttributes
    );

    /**
     * Get size
     * @return string|null
     */
    public function getSize();

    /**
     * Set size
     * @param string $size
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setSize($size);

    /**
     * Get color
     * @return string|null
     */
    public function getColor();

    /**
     * Set color
     * @param string $color
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setColor($color);

    /**
     * Get content
     * @return string|null
     */
    public function getContent();

    /**
     * Set content
     * @param string $content
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setContent($content);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setStatus($status);

    /**
     * Get comment
     * @return string|null
     */
    public function getComment();

    /**
     * Set comment
     * @param string $comment
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setComment($comment);

    /**
     * Get image
     * @return string|null
     */
    public function getImage();

    /**
     * Set image
     * @param string $image
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setImage($image);
}
