<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 2015-10-23
 * Time: 16:52
 */

namespace controller;


class PubController implements IController {

    private $pubView;
    private $navView;

    public function __construct(\view\PubFormView $pubView, \view\NavigationView $navView) {
        $this->pubView = $pubView;
        $this->navView = $navView;
    }


    public function doControl() {

    }

    public function getView() {
        // TODO: Implement getView() method.
    }
}