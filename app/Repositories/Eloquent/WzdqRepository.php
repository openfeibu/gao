<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\WzdqRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;

class WzdqRepository extends BaseRepository implements WzdqRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('model.wzdq.wzdq.search');
    }
    public function model()
    {
        return config('model.wzdq.wzdq.model');
    }

}