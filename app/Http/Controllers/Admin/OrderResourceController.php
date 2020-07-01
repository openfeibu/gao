<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Order;
use App\Repositories\Eloquent\OrderRepository;
use Illuminate\Http\Request;

class OrderResourceController extends BaseController
{
    public function __construct(OrderRepository $order)
    {
        parent::__construct();
        $this->repository = $order;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));
        if ($this->response->typeIs('json')) {
            $orders = $this->repository
                ->orderBy('id','desc')
                ->paginate($limit);

            return $this->response
                ->success()
                ->count($orders->total())
                ->data($orders->toArray()['data'])
                ->output();
        }
        return $this->response->title(trans('app.admin.panel'))
            ->view('order.index')
            ->output();
    }
    public function create(Request $request)
    {
        $order = $this->repository->newInstance([]);

        return $this->response->title(trans('app.admin.panel'))
            ->view('order.create')
            ->data(compact('order'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $order = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('order.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('order/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('order'))
                ->redirect();
        }
    }
    public function show(Request $request,Order $order)
    {
        if ($order->exists) {
            $view = 'order.edit';
        } else {
            $view = 'order.create';
        }
        $type = $request->get('type','');
        if($type && $type == 'show')
        {
            $view = "order.show";
        }

        return $this->response->title(trans('app.view') . ' ' . trans('order.name'))
            ->data(compact('order'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,Order $order)
    {
        try {
            $attributes = $request->all();

            $order->update($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('order.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('order/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('order/' . $order->id))
                ->redirect();
        }
    }
    public function destroy(Request $request,Order $order)
    {
        try {
            $this->repository->forceDelete([$order->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('order.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('order'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('order'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('order.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('order'))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('order'))
                ->redirect();
        }
    }
}
