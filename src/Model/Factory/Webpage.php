<?php
namespace LeoGalleguillos\Website\Model\Factory;

use LeoGalleguillos\Html\Model\Entity as HtmlEntity;
use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;
use Application\Model\Table as ApplicationTable;
use Zend\Db\Adapter\Adapter;

class Webpage
{
    public function __construct(
        WebsiteTable\Webpage $webpageTable
    ) {
        $this->webpageTable = $webpageTable;
    }

    public function buildFromArray(
        array $array
    ) : WebsiteEntity\Webpage {
        $htmlEntity = new HtmlEntity\Html();
        $htmlEntity->setString($array['html']);

        $webpageEntity = $this->buildInstance()
            ->setHtmlEntity($htmlEntity)
            ->setTitle($array['title'])
            ->setUrl($array['url'])
            ->setWebpageId($array['webpage_id']);

        return $webpageEntity;
    }

    public function buildFromWebpageId(int $webpageId) : WebsiteEntity\Webpage
    {
        $array = $this->webpageTable->selectWhereWebpageId(
            $webpageId
        );
        return $this->buildFromArray($array);
    }

    protected function buildInstance() : WebsiteEntity\Webpage
    {
        return new WebsiteEntity\Webpage();
    }
}
