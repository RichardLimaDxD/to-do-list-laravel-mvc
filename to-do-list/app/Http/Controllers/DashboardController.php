<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        $MAX_ITEMS_PER_PAGE = 5;

        $query = $user
            ->todolists()
            ->orderBy('created_at', 'desc')
            ->whereNull('deleted_at');

        if ($request->filled('status'))
            $query->where('status', $request->status);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            });
        }

        $hour = (int) now()->setTimezone('America/Sao_Paulo')->format('H');
        $greeting = match (true) {
            $hour >= 5 && $hour < 12 => 'Good Morning',
            $hour >= 12 && $hour < 17 => 'Good Afternoon',
            $hour >= 17 && $hour < 22 => 'Good Evening',
            default => 'Good Night',
        };

        return view('dashboard', [
            'todolists' => $query->paginate($MAX_ITEMS_PER_PAGE)->withQueryString(),
            'greeting' => $greeting,
        ]);
    }
}
