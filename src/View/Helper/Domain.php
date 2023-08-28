<?php
namespace MonthlyBasis\Website\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use MonthlyBasis\Website\Model\Entity as WebsiteEntity;

class Domain extends AbstractHelper
{
    public function __construct(
        protected WebsiteEntity\Config $configEntity,
    ) {
    }

    public function __invoke(): string|null
    {
        return $this->configEntity['domain'] ?? null;
    }
}
