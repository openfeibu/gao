<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Wzdq;
use App\Repositories\Eloquent\WzdqRepository;
use Illuminate\Http\Request;

class WzdqResourceController extends BaseController
{
    public function __construct(WzdqRepository $wzdq)
    {
        parent::__construct();
        $this->repository = $wzdq;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));
        if ($this->response->typeIs('json')) {
            $wzdqs = $this->repository
                ->orderBy('id','asc')
                ->paginate($limit);

            return $this->response
                ->success()
                ->count($wzdqs->total())
                ->data($wzdqs->toArray()['data'])
                ->output();
        }
        return $this->response->title(trans('app.admin.panel'))
            ->view('wzdq.index')
            ->output();
    }
    public function create(Request $request)
    {
        $wzdq = $this->repository->newInstance([]);

        return $this->response->title(trans('app.admin.panel'))
            ->view('wzdq.create')
            ->data(compact('wzdq'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $wzdq = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('wzdq.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('wzdq/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('wzdq'))
                ->redirect();
        }
    }
    public function show(Request $request,Wzdq $wzdq)
    {
        if ($wzdq->exists) {
            $view = 'wzdq.edit';
        } else {
            $view = 'wzdq.create';
        }
        $type = $request->get('type','');
        if($type && $type == 'show')
        {
            $view = "wzdq.show";
        }

        return $this->response->title(trans('app.view') . ' ' . trans('wzdq.name'))
            ->data(compact('wzdq'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,Wzdq $wzdq)
    {
        try {
            $attributes = $request->all();

            $wzdq->update($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('wzdq.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('wzdq/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('wzdq/' . $wzdq->id))
                ->redirect();
        }
    }
    public function destroy(Request $request,Wzdq $wzdq)
    {
        try {
            $this->repository->forceDelete([$wzdq->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('wzdq.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('wzdq'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('wzdq'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('wzdq.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('wzdq'))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('wzdq'))
                ->redirect();
        }
    }
}
