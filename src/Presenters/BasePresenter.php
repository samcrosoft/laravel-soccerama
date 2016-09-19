<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 18/09/2016
 * Time: 23:11
 */

namespace Samcrosoft\Soccerama\Presenters;

/**
 * Class BasePresenter
 *
 * @package Samcrosoft\Soccerama\Presenters
 */
abstract class BasePresenter
{
    var $data = [];

    /**
     * BasePresenter constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    protected function getData()
    {
        return $this->data;
    }

    /**
     * @param      $key
     * @param null $default
     *
     * @return mixed
     */
    protected function getByKey($key, $default=null)
    {
        return array_get($this->getData(), $key, $default);
    }


}