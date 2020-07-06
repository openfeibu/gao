<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController as BaseController;
use App\Models\Question;
use App\Repositories\Eloquent\QuestionRepository;
use Illuminate\Http\Request;

class QuestionResourceController extends BaseController
{
    public function __construct(QuestionRepository $question)
    {
        parent::__construct();
        $this->repository = $question;
        $this->repository
            ->pushCriteria(\App\Repositories\Criteria\RequestCriteria::class);
    }
    public function index(Request $request)
    {
        $limit = $request->input('limit',config('app.limit'));
        if ($this->response->typeIs('json')) {
            $orders = $this->repository
                ->orderBy('updated_at','desc')
                ->paginate($limit);

            return $this->response
                ->success()
                ->count($orders->total())
                ->data($orders->toArray()['data'])
                ->output();
        }
        return $this->response->title(trans('app.admin.panel'))
            ->view('question.index')
            ->output();
    }
    public function create(Request $request)
    {
        $question = $this->repository->newInstance([]);

        return $this->response->title(trans('app.admin.panel'))
            ->view('question.create')
            ->data(compact('question'))
            ->output();
    }
    public function store(Request $request)
    {
        try {
            $attributes = $request->all();

            $question = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('question.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('question/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('question'))
                ->redirect();
        }
    }
    public function show(Request $request,Question $question)
    {
        if ($question->exists) {
            $view = 'question.edit';
        } else {
            $view = 'question.create';
        }
        $type = $request->get('type','');
        if($type && $type == 'show')
        {
            $view = "question.show";
        }

        return $this->response->title(trans('app.view') . ' ' . trans('question.name'))
            ->data(compact('question'))
            ->view($view)
            ->output();
    }
    public function update(Request $request,Question $question)
    {
        try {
            $attributes = $request->all();

            $question->update($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('question.name')]))
                ->code(0)
                ->status('success')
                ->url(guard_url('question/'))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('question/' . $question->id))
                ->redirect();
        }
    }
    public function destroy(Request $request,Question $question)
    {
        try {
            $this->repository->forceDelete([$question->id]);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('question.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('question'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('question'))
                ->redirect();
        }
    }
    public function destroyAll(Request $request)
    {
        try {
            $data = $request->all();
            $ids = $data['ids'];
            $this->repository->forceDelete($ids);

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('question.name')]))
                ->status("success")
                ->http_code(202)
                ->url(guard_url('question'))
                ->redirect();

        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('question'))
                ->redirect();
        }
    }
}
