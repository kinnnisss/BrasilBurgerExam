<?php

namespace App\Service;

use App\Dto\Catalogue\DashboardDto;

interface DashboardServiceInterface
{
    public function getDashboard(\DateTimeInterface $day): DashboardDto;
}
