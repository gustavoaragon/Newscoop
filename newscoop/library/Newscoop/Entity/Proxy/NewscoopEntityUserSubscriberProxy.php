<?php

namespace Newscoop\Entity\Proxy;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class NewscoopEntityUserSubscriberProxy extends \Newscoop\Entity\User\Subscriber implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    private function _load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    
    public function getSubscriptions()
    {
        $this->_load();
        return parent::getSubscriptions();
    }

    public function hasSubscriptions()
    {
        $this->_load();
        return parent::hasSubscriptions();
    }

    public function getIps()
    {
        $this->_load();
        return parent::getIps();
    }

    public function hasIps()
    {
        $this->_load();
        return parent::hasIps();
    }

    public function getId()
    {
        $this->_load();
        return parent::getId();
    }

    public function getUserId()
    {
        $this->_load();
        return parent::getUserId();
    }

    public function setName($name)
    {
        $this->_load();
        return parent::setName($name);
    }

    public function getName()
    {
        $this->_load();
        return parent::getName();
    }

    public function getRealName()
    {
        $this->_load();
        return parent::getRealName();
    }

    public function setUsername($username)
    {
        $this->_load();
        return parent::setUsername($username);
    }

    public function getUsername()
    {
        $this->_load();
        return parent::getUsername();
    }

    public function setPassword($password)
    {
        $this->_load();
        return parent::setPassword($password);
    }

    public function setEmail($email)
    {
        $this->_load();
        return parent::setEmail($email);
    }

    public function getEmail()
    {
        $this->_load();
        return parent::getEmail();
    }

    public function getTimeCreated()
    {
        $this->_load();
        return parent::getTimeCreated();
    }

    public function setPhone($phone)
    {
        $this->_load();
        return parent::setPhone($phone);
    }

    public function getPhone()
    {
        $this->_load();
        return parent::getPhone();
    }

    public function setTitle($title)
    {
        $this->_load();
        return parent::setTitle($title);
    }

    public function getTitle()
    {
        $this->_load();
        return parent::getTitle();
    }

    public function setGender($gender)
    {
        $this->_load();
        return parent::setGender($gender);
    }

    public function getGender()
    {
        $this->_load();
        return parent::getGender();
    }

    public function setAge($age)
    {
        $this->_load();
        return parent::setAge($age);
    }

    public function getAge()
    {
        $this->_load();
        return parent::getAge();
    }

    public function setCity($city)
    {
        $this->_load();
        return parent::setCity($city);
    }

    public function getCity()
    {
        $this->_load();
        return parent::getCity();
    }

    public function setStreetAddress($streetAddress)
    {
        $this->_load();
        return parent::setStreetAddress($streetAddress);
    }

    public function getStreetAddress()
    {
        $this->_load();
        return parent::getStreetAddress();
    }

    public function setPostalCode($postalCode)
    {
        $this->_load();
        return parent::setPostalCode($postalCode);
    }

    public function getPostalCode()
    {
        $this->_load();
        return parent::getPostalCode();
    }

    public function setState($state)
    {
        $this->_load();
        return parent::setState($state);
    }

    public function getState()
    {
        $this->_load();
        return parent::getState();
    }

    public function setCountry($country)
    {
        $this->_load();
        return parent::setCountry($country);
    }

    public function getCountry()
    {
        $this->_load();
        return parent::getCountry();
    }

    public function setFax($fax)
    {
        $this->_load();
        return parent::setFax($fax);
    }

    public function getFax()
    {
        $this->_load();
        return parent::getFax();
    }

    public function setContactPerson($contactPerson)
    {
        $this->_load();
        return parent::setContactPerson($contactPerson);
    }

    public function getContactPerson()
    {
        $this->_load();
        return parent::getContactPerson();
    }

    public function setPhoneSecond($phoneSecond)
    {
        $this->_load();
        return parent::setPhoneSecond($phoneSecond);
    }

    public function getPhoneSecond()
    {
        $this->_load();
        return parent::getPhoneSecond();
    }

    public function setEmployer($employer)
    {
        $this->_load();
        return parent::setEmployer($employer);
    }

    public function getEmployer()
    {
        $this->_load();
        return parent::getEmployer();
    }

    public function setEmployerType($employerType)
    {
        $this->_load();
        return parent::setEmployerType($employerType);
    }

    public function getEmployerType()
    {
        $this->_load();
        return parent::getEmployerType();
    }

    public function setPosition($position)
    {
        $this->_load();
        return parent::setPosition($position);
    }

    public function getPosition()
    {
        $this->_load();
        return parent::getPosition();
    }

    public function __toString()
    {
        $this->_load();
        return parent::__toString();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'name', 'username', 'password', 'email', 'timeCreated', 'phone', 'title', 'gender', 'age', 'city', 'streetAddress', 'postalCode', 'state', 'country', 'fax', 'contactPerson', 'phoneSecond', 'employer', 'employerType', 'position', 'subscriptions', 'ips');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}