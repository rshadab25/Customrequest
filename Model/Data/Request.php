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

namespace Mageguru\Customrequest\Model\Data;

use Mageguru\Customrequest\Api\Data\RequestInterface;

class Request extends \Magento\Framework\Api\AbstractExtensibleObject implements RequestInterface
{

    /**
     * Get request_id
     * @return string|null
     */
    public function getRequestId()
    {
        return $this->_get(self::REQUEST_ID);
    }

    /**
     * Set request_id
     * @param string $requestId
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setRequestId($requestId)
    {
        return $this->setData(self::REQUEST_ID, $requestId);
    }

    /**
     * Get customer_id
     * @return string|null
     */
    public function getCustomerId()
    {
        return $this->_get(self::CUSTOMER_ID);
    }

    /**
     * Set customer_id
     * @param string $customerId
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setCustomerId($customerId)
    {
        return $this->setData(self::CUSTOMER_ID, $customerId);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Mageguru\Customrequest\Api\Data\RequestExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Mageguru\Customrequest\Api\Data\RequestExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Mageguru\Customrequest\Api\Data\RequestExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get size
     * @return string|null
     */
    public function getSize()
    {
        return $this->_get(self::SIZE);
    }

    /**
     * Set size
     * @param string $size
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setSize($size)
    {
        return $this->setData(self::SIZE, $size);
    }

    /**
     * Get color
     * @return string|null
     */
    public function getColor()
    {
        return $this->_get(self::COLOR);
    }

    /**
     * Set color
     * @param string $color
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setColor($color)
    {
        return $this->setData(self::COLOR, $color);
    }

    /**
     * Get content
     * @return string|null
     */
    public function getContent()
    {
        return $this->_get(self::CONTENT);
    }

    /**
     * Set content
     * @param string $content
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    /**
     * Get status
     * @return string|null
     */
    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get comment
     * @return string|null
     */
    public function getComment()
    {
        return $this->_get(self::COMMENT);
    }

    /**
     * Set comment
     * @param string $comment
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setComment($comment)
    {
        return $this->setData(self::COMMENT, $comment);
    }

    /**
     * Get image
     * @return string|null
     */
    public function getImage()
    {
        return $this->_get(self::IMAGE);
    }

    /**
     * Set image
     * @param string $image
     * @return \Mageguru\Customrequest\Api\Data\RequestInterface
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }
}
