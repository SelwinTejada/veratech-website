<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuditLogController extends Controller
{
    public function index(Request $request): View
    {
        $query = AuditLog::with('user')->latest();
        if ($action = $request->query('action')) {
            $query->where('action', 'like', $action.'%');
        }
        return view('admin.audit-logs.index', [
            'logs' => $query->paginate(50)->withQueryString(),
            'action' => $action,
        ]);
    }
}