<?php
namespace MonthlyBasis\Website\Model\Service;

class ShowAds
{
    /**
     * @var bool
     */
    protected $showAds;

    public function getShowAds(): bool
    {
        if (!isset($this->showAds)) {
            $this->showAds = true;
        }

        return $this->showAds;
    }

    public function setShowAds(bool $showAds)
    {
        $this->showAds = $showAds;
    }
}
