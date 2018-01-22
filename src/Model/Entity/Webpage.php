<?php
namespace LeoGalleguillos\Website\Model\Entity;

use LeoGalleguillos\Html\Model\Entity as HtmlEntity;

class Webpage
{
    /**
     * @var HtmlEntity\Html
     */
    protected $html;

    /**
     * var string
     */
    protected $title;
    protected $url;
    protected $webpageId;
    protected $websiteId;

    public function getHtml()
    {
        return $this->html;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setHtml(HtmlEntity\Html $html)
    {
        $this->html = $html;
        return $this;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
        return $this;
    }
}
