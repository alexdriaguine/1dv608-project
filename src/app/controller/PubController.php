<?php

namespace controller;

class PubController  {

    /**
     * @var ListPubsView
     */
    private $listPubsView;

    /**
     * @var null | \view\PubView
     */
    private $pubView = null;

    /**
     * @var null | \view\BeerView
     */
    private $beerView = null;

    /**
     * @var \view\NavigationView
     */
    private $navView;

    /**
     * @var \model\PubRepository
     */
    private $pubs;

    /**
     * @var \model\BeerRepository
     */
    private $beers;

    public function __construct(\view\ListPubsView $listPubsView, \view\NavigationView $navView,
                                \model\BeerRepository $beers) {
        $this->navView = $navView;
        $this->listPubsView = $listPubsView;
        $this->beers = $beers;
    }


    public function doControl() {

        if ($this->navView->userWantsToSeePub()) {
            $this->viewPub();
        } elseif ($this->navView->userWantsToSeeBeer()) {
            $this->viewBeer();
        }

    }

    public function viewPub() {
        $selectedPub = $this->listPubsView->getSelectedPub();
        if ($selectedPub == null) return;
        $this->pubView = new \view\PubView($selectedPub, $this->navView);
    }

    /**
     * @return string
     * @throws \BeerDoesNotExistException
     */
    public function viewBeer() {
        $beerID = $this->navView->getBeerId();
        $beer = $this->beers->getById($beerID);
        $this->beerView = new \view\BeerView($beer);

    }

    public function getView() {

        if ($this->beerView != null)
            return $this->beerView;
        elseif ($this->pubView != null)
            return $this->pubView;
        else
            return $this->listPubsView;
    }
}