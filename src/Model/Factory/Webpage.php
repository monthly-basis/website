<?php
namespace LeoGalleguillos\Website\Model\Factory;

use ArrayObject;
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

    public function buildFromArrayObject(
        ArrayObject $arrayObject
    ) : WebsiteEntity\Webpage {
        $htmlEntity = new HtmlEntity\Html();
        $htmlEntity->setString($arrayObject['html']);

        $webpageEntity = $this->buildInstance()
            ->setHtml($htmlEntity)
            ->setTitle($arrayObject['title'])
            ->setUrl($arrayObject['url'])
            ->setWebpageId($arrayObject['webpage_id']);

        return $webpageEntity;
    }

    public function buildFromWebpageId(int $webpageId) : WebsiteEntity\Webpage
    {
        $arrayObject = $this->webpageTable->selectWhereWebpageId(
            $webpageId
        );
        return $this->buildFromArrayObject($arrayObject);
    }

    protected function buildInstance() : WebsiteEntity\Webpage
    {
        return new WebsiteEntity\Webpage();
    }
}
