<?php

namespace Omnipay\Gate2shop;

class CustomFieldBag implements \IteratorAggregate, \Countable
{
    /**
     * Custom field storage
     *
     * @var array
     */
    protected $customfields;

    /**
     * Constructor
     *
     * @param array $customfields An array of custom fields
     */
    public function __construct(array $customfields = array())
    {
        $this->replace($customfields);
    }

    /**
     * Return all the custom fields
     *
     * @return array An array of custom fields
     */
    public function all()
    {
        return $this->customfields;
    }

    /**
     * Replace the contents of this bag with the specified custom fields
     *
     * @param array $customfields An array of custom fields
     */
    public function replace(array $customfields = array())
    {
        $this->customfields = array();

        foreach ($customfields as $customfield) {
            $this->add($customfield);
        }
    }

    /**
     * Add an custom field to the bag
     *
     * @param CustomFieldInterface|array $customfield An existing custom field,
     * or associative array of custom field parameters
     */
    public function add($customfield)
    {
        if ($customfield instanceof CustomFieldInterface) {
            $this->customfields[] = $customfield;
        } else {
            $this->customfields[] = new CustomField($customfield);
        }
    }

    /**
     * Returns an iterator for custom fields
     *
     * @return \ArrayIterator An \ArrayIterator instance
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->customfields);
    }

    /**
     * Returns the number of custom fields
     *
     * @return int The number of custom fields
     */
    public function count()
    {
        return count($this->customfields);
    }
}
