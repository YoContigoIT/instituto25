<?php

namespace Modules\LMS\Http\Controllers\Admin\Courses\Bundle;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\LMS\Repositories\Courses\Bundle\BundleRepository;

class BundleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(protected BundleRepository $bundle) {}

    public function index(Request $request): View
    {

        $options = [];
        $filterType = '';
        if ($request->has('filter')) {
            $filterType = $request->filter ?? '';
        }
        switch ($filterType) {
            case 'trash':
                $options['onlyTrashed'] = [];
                break;
            case 'all':
                $options['withTrashed'] = [];
                break;
        }
        $response = $this->bundle::paginate(10,  options: $options, relations: [
            'courses.translations' => function ($query) {
                $query->where('locale', app()->getLocale());
            },
            'translations' => function ($query) {
                $query->where('locale', app()->getLocale());
            }
        ]);
        $bundles = $response['data'] ?? [];
        $countResponse = $this->bundle->trashCount();

        $countData = [
            'total' => 0,
            'published' => 0,
            'trashed' => 0
        ];

        if ($countResponse['status'] === 'success') {
            $countData = $countResponse['data']->toArray() ?? $countData;
        }

        return view('portal::admin.course.bundle.index', compact('bundles', 'countData'));
    }

    /**
     * create
     */
    public function create(): View
    {
        return view('portal::admin.course.bundle.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        // Check if the user has permission to add a bundle.
        if (!has_permissions($request->user(), ['add.bundle'])) {
            return json_error('You have no permission.');
        }
        // Attempt to save the new bundle with the provided data.
        $response = $this->bundle->save($request);
        // Check if the save operation was successful.
        if ($response['status'] !== 'success') {
            return response()->json($response);
        }
        return $this->jsonSuccess('Bundle has been saved successfully!',  route('bundle.index'));
    }

    /**
     * Edit the specified resource.
     */
    public function edit($id, Request $request)
    {
        // Check if the user has permission to edit the bundle.
        if (!has_permissions($request->user(), ['edit.bundle'])) {
            toastr()->error('You have no permission.');
            return redirect()->back();
        }

        $locale = $request->locale ?? app()->getLocale();
        $response = $this->bundle->first($id, relations: [
            'translations' => function ($query) use ($locale) {
                $query->where('locale', $locale);
            }
        ]);
        // Check if the update was successful.
        if ($response['status'] !== 'success') {
            return view('portal::admin.404');
        }
        $bundle = $response['data'] ?? null;
        return view('portal::admin.course.bundle.form', compact('bundle'));
    }


    /**
     * show the specified resource.
     */
    public function show($id, Request $request)
    {
        // Check if the user has permission to show the bundle.

        $response = $this->bundle->first($id, withTrashed: true);
        // Check if the update was successful.
        if ($response['status'] !== 'success') {
            return view('portal::admin.404');
        }
        $bundle = $response['data'] ?? null;
        return view('portal::admin.course.bundle.view', compact('bundle'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request): JsonResponse
    {
        // Check if the user has permission to edit the bundle.
        if (!has_permissions($request->user(), ['edit.bundle'])) {
            return json_error('You have no permission.');
        }

        $response = $this->bundle->update($id, $request);
        // Check if the update was successful.
        if ($response['status'] !== 'success') {
            return response()->json($response);
        }
        // Return a success response with the status and redirect URL.
        return $this->jsonSuccess('Bundle has been updated successfully!',  route('bundle.index'));
    }

    /**
     * Delete a bundle if the user has permission to delete.
     * 
     * @param Request $request The incoming request to delete the bundle.
     * @param int $id The ID of the bundle to delete.
     * @return JsonResponse A JSON response indicating the result of the delete operation.
     * 
     */
    public function destroy(int $id, Request $request): JsonResponse
    {
        //Check if the user has permission to delete the bundle.
        if (!has_permissions($request->user(), ['delete.bundle'])) {
            return json_error('You have no permission.');
        }
        // Attempt to delete the bundle with the specified ID.
        $bundle = $this->bundle->delete(id: $id);
        $bundle['url'] = route('bundle.index');
        // Return the response indicating the result of the delete operation.
        return response()->json($bundle);
    }

    /**
     * restore the specified bundle from storage.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function restore(int $id, Request $request)
    {
        // Check user permission to bundle a level
        if (!has_permissions($request->user(), ['delete.bundle'])) {
            return json_error('You have no permission.');
        }
        $response = $this->bundle->restore(id: $id);
        $response['url'] = route('bundle.index');
        return response()->json($response);
    }



    public function thumbnailDelete(Request $request, $id)
    {
        //Check if the user has permission to delete the bundle.
        if (!has_permissions($request->user(), ['delete.bundle'])) {
            return json_error('You have no permission.');
        }
        //
        $response = $this->bundle->thumbnailDelete(id: $id);
        return response()->json($response);
    }
}
