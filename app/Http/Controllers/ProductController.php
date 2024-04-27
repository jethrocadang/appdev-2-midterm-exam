<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function generateData()
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'id' => $i,
                'product' => 'Product ' . $i,
                'description' => 'Description ' . $i,
                'price' => rand(10, 100)
            ];
        }

        return $data;
    }

    public function uploadImageLocal(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image']
        ], [
            'image.required' => 'required',
            'image.image' => 'image only'
        ]);
        $path = Storage::disk('local')->put('images', $request->file('image'));

        return response()->json([
            'message' => 'Image successfully stored in local disk
        driver.',
            'path' => $path
        ]);
    }

    public function uploadImagePublic(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image']
        ], [
            'image.required' => 'required',
            'image.image' => 'image only'
        ]);
        $path = Storage::disk('public')->put('images', $request->file('image'));

        return response()->json([
            'message' => 'Image successfully stored in public disk
        driver.',
            'path' => $path
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return response()->json(["message" => 'Display all products']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        return response()->json(["message" => "Product created successfully"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(["message" => 'Display product with ID:'. $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response()->json(["message" => "Product with ID: " . $id . " updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json(["message" => " Product with ID: " . $id . "deleted successfully."]);
    }
}
