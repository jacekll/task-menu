<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Repository\MenuRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends Controller
{
    /**
     * @var MenuRepositoryInterface
     */
    private $menuRepository;

    public function __construct(MenuRepositoryInterface $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $menu = Menu::create($request->json()->all());
        $this->menuRepository->store($menu);

        return new JsonResponse($menu->toArray(), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param mixed $menu
     * @return JsonResponse
     */
    public function show($menu)
    {
        $menu = $this->menuRepository->find($menu);

        return new JsonResponse($menu);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  mixed  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($menu)
    {
        //
    }
}
