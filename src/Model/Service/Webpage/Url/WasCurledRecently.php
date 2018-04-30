<?php
namespace LeoGalleguillos\Website\Model\Service\Webpage\Url;

use LeoGalleguillos\Website\Model\Table as WebsiteTable;

class WasCurledRecently
{
    public function __construct(
        WebsiteTable\UrlHttpStatusCodeLog $urlHttpStatusCodeLogTable
    ) {
        $this->urlHttpStatusCodeLogTable = $urlHttpStatusCodeLogTable;
    }

    public function wasCurledRecently(
        string $url
    ) : bool {
        return (bool) $this->urlHttpStatusCodeLogTable->selectCountWhereUrl(
            $url
        );
    }
}
