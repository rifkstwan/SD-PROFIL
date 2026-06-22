<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Gallery;
use App\Models\User;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $period = $request->input('period', 'this_month');
        $now = Carbon::now();

        if ($period === 'last_30_days') {
            $startOfThisPeriod = $now->copy()->subDays(30);
            $startOfLastPeriod = $now->copy()->subDays(60);
            $endOfLastPeriod = $now->copy()->subDays(30);
            $periodLabel = '30 hari sebelumnya';
        } elseif ($period === 'this_year') {
            $startOfThisPeriod = $now->copy()->startOfYear();
            $startOfLastPeriod = $now->copy()->subYear()->startOfYear();
            $endOfLastPeriod = $now->copy()->subYear()->endOfYear();
            $periodLabel = 'Tahun lalu';
        } elseif ($period === 'all_time') {
            $startOfThisPeriod = Carbon::create(2000, 1, 1);
            $startOfLastPeriod = Carbon::create(2000, 1, 1);
            $endOfLastPeriod = Carbon::create(2000, 1, 1);
            $periodLabel = 'Semua waktu';
        } else { // this_month
            $startOfThisPeriod = $now->copy()->startOfMonth();
            $startOfLastPeriod = $now->copy()->subMonth()->startOfMonth();
            $endOfLastPeriod = $now->copy()->subMonth()->endOfMonth();
            $periodLabel = 'Bulan lalu';
        }

        // Data This Period vs Last Period
        $newsThisPeriod = News::where('created_at', '>=', $startOfThisPeriod)->count();
        $newsLastPeriod = News::whereBetween('created_at', [$startOfLastPeriod, $endOfLastPeriod])->count();
        
        $pubThisPeriod = News::where('status', 'published')->where('created_at', '>=', $startOfThisPeriod)->count();
        $pubLastPeriod = News::where('status', 'published')->whereBetween('created_at', [$startOfLastPeriod, $endOfLastPeriod])->count();
        
        $galThisPeriod = Gallery::where('created_at', '>=', $startOfThisPeriod)->count();
        $galLastPeriod = Gallery::whereBetween('created_at', [$startOfLastPeriod, $endOfLastPeriod])->count();

        // Total Counts overall
        $totalNewsAll = News::count();
        $totalPubAll = News::where('status', 'published')->count();
        $totalGalAll = Gallery::count();

        $stats = [
            'total_news'                => $period === 'all_time' ? $totalNewsAll : $newsThisPeriod,
            'total_news_growth'         => $period === 'all_time' ? 0 : $this->calculateGrowth($newsThisPeriod, $newsLastPeriod),
            'total_news_last_month'     => $period === 'all_time' ? 0 : $newsLastPeriod,

            'published_news'            => $period === 'all_time' ? $totalPubAll : $pubThisPeriod,
            'published_news_growth'     => $period === 'all_time' ? 0 : $this->calculateGrowth($pubThisPeriod, $pubLastPeriod),
            'published_news_last_month' => $period === 'all_time' ? 0 : $pubLastPeriod,

            'total_gallery'             => $period === 'all_time' ? $totalGalAll : $galThisPeriod,
            'total_gallery_growth'      => $period === 'all_time' ? 0 : $this->calculateGrowth($galThisPeriod, $galLastPeriod),
            'total_gallery_last_month'  => $period === 'all_time' ? 0 : $galLastPeriod,

            'total_staf'                => User::where('role', 'staf')->count(),
            'period_label'              => $periodLabel,
            'period'                    => $period,
        ];

        // Search Recent News
        $query = News::latest();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $recentNews = $query->take(5)->get();
        
        $profile = SchoolProfile::first();

        return view('admin.dashboard', compact('stats', 'recentNews', 'profile'));
    }

    private function calculateGrowth($current, $previous)
    {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }
        return round((($current - $previous) / $previous) * 100, 1);
    }
}
