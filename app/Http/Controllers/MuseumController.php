<?php
/**
 * Visita - Museum Controller
 * File: app/Http/Controllers/MuseumController.php
 */

namespace App\Http\Controllers;

use App\Models\Museum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MuseumController extends Controller
{
    /**
     * Display a listing of museums (READ ALL)
     * GET /api/museums
     */
    public function index(Request $request)
    {
        try {
            $query = Museum::query();

            // Search functionality (optional)
            if ($request->has('search')) {
                $query->search($request->search);
            }

            // Get all museums
            $museums = $query->orderBy('nama_museum', 'asc')->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Museums retrieved successfully',
                'total' => $museums->count(),
                'data' => $museums
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve museums',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created museum (CREATE)
     * POST /api/museums
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_museum' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'jam_operasional' => 'nullable|string',
            'harga_tiket' => 'nullable|string',
            'foto_url' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $museum = Museum::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Museum created successfully',
                'data' => $museum
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create museum',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified museum (READ ONE)
     * GET /api/museums/{id}
     */
    public function show($id)
    {
        try {
            $museum = Museum::findOrFail($id);

            return response()->json([
                'status' => 'success',
                'message' => 'Museum found',
                'data' => $museum
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Museum not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve museum',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified museum (UPDATE)
     * PUT/PATCH /api/museums/{id}
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_museum' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'jam_operasional' => 'nullable|string',
            'harga_tiket' => 'nullable|string',
            'foto_url' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $museum = Museum::findOrFail($id);
            $museum->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Museum updated successfully',
                'data' => $museum
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Museum not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update museum',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified museum (DELETE)
     * DELETE /api/museums/{id}
     */
    public function destroy($id)
    {
        try {
            $museum = Museum::findOrFail($id);
            $museumName = $museum->nama_museum;
            $museum->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Museum deleted successfully',
                'deleted_museum' => $museumName
            ], 200);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Museum not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete museum',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    



    

    
    /**
     * Get museum statistics
     * GET /api/museums/statistics
     */
    public function statistics()
    {
        try {
            $stats = [
                'total_museums' => Museum::count(),
                'museums_with_tickets' => Museum::whereNotNull('harga_tiket')->count(),
                'free_museums' => Museum::where('harga_tiket', 'like', '%gratis%')->count(),
            ];

            return response()->json([
                'status' => 'success',
                'message' => 'Statistics retrieved successfully',
                'data' => $stats
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve statistics',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}