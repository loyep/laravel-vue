<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ThemeCreateRequest;
use App\Http\Requests\ThemeUpdateRequest;
use App\Repositories\ThemeRepository;
use App\Validators\ThemeValidator;

/**
 * Class ThemeController.
 *
 * @package namespace App\Http\Controllers;
 */
class ThemeController extends Controller
{
    /**
     * @var ThemeRepository
     */
    protected $repository;

    /**
     * @var ThemeValidator
     */
    protected $validator;

    /**
     * ThemeController constructor.
     *
     * @param ThemeRepository $repository
     * @param ThemeValidator $validator
     */
    public function __construct(ThemeRepository $repository, ThemeValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $themes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $themes,
            ]);
        }

        return view('themes.index', compact('themes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ThemeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ThemeCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $theme = $this->repository->create($request->all());

            $response = [
                'message' => 'Theme created.',
                'data'    => $theme->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $theme = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $theme,
            ]);
        }

        return view('themes.show', compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theme = $this->repository->find($id);

        return view('themes.edit', compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ThemeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ThemeUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $theme = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Theme updated.',
                'data'    => $theme->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Theme deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Theme deleted.');
    }
}
