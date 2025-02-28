<?php

namespace App\Core\Application\Services;
use App\Core\Domain\Entities\ActivityLogEntity;
use App\Core\Domain\DTO\BaseResponse;
class ActivityLogService
{

    protected ActivityLogRepositoryInterface $activityLogRepository;

    public function __construct(ActivityLogRepositoryInterface $activityLogRepository)
    {
       $this->activityLogRepository = $activityLogRepository;
    }

    public function add(ActivityLogEntity $data): ActivityLogEntity
    {
        return $this->activityLogRepository->add($data);
    }
}