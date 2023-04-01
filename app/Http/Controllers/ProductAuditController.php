<?php

namespace App\Http\Controllers;

use App\Models\ProductAudit;
use Illuminate\Http\Request;

class ProductAuditController extends Controller
{
    public function index (Request $request)
    {
        $query = ProductAudit::query();

        if ($request->has('from')) {
            $query->where('created_at', '>=', $request->input('from'));
        }

        if ($request->has('to')) {
            $query->where('created_at', '<=', $request->input('to'));
        }

        $audits = $query->get();

        return response()->json($audits);
    }
}
