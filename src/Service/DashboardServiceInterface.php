<?php

namespace App\Service;

use App\Dto\Dashboard\DashboardDto;

interface DashboardServiceInterface
{
    public function getDashboard(\DateTimeInterface $day): DashboardDto;
}
