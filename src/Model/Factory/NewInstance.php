<?php
namespace MonthlyBasis\Website\Model\Factory;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;

class NewInstance
{
    public function buildNewInstance(): WebsiteEntity\Website
    {
        return new WebsiteEntity\Website();
    }
}
