<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ClientDevice;
use App\Models\Payment;
use App\Models\PackageBook;
use App\Models\Package;
use App\Models\PackageCategory;
use App\Models\Appoinment;

use Carbon\Carbon;



class DashboardController extends Controller
{
    const TODAY = 'today';
    const WEEK = 'week';
    const MONTH = 'month';
    const YEAR = 'year';

    Public function index(){
         $totalVisitor = ClientDevice::count();
         $totalPackage = Package::count();
         $pendingBooking = PackageBook::count();
         $totalPackageCategory = PackageCategory::count();
         $totalAppoinment = Appoinment::count();

          $dashData = [
            'totalUser' => $this->getTotalUsers() ?? 0,
            'totalVisitor' => $this->getTotalVisitor() ?? 0,
            'totalSuccessBooking' => $this->getTotalBooking() ?? 0,
            'pendingBooking' => $pendingBooking ?? 0,
            'totalPackage' => $totalPackage ?? 0,
            'totalPackageCategory' => $totalPackageCategory ?? 0,
            'totalAppoinment' => $totalAppoinment ?? 0,

            'totalColleaction' => $this->getTotalPayments() ?? 0,
        ];
        // return $dashData['totalColleaction']['total_today'];
        return view('admins.dashboard.index',compact('dashData'));
    }
    
    // total payment collations ----------
    public function getTotalPayments(){
        $totalToday = $this->getTotalByPeriod('today');
        $totalWeekly = $this->getTotalByPeriod('week');
        $totalMonthly = $this->getTotalByPeriod('month');
        $totalYearly = $this->getTotalByPeriod('year');
        $totalOverall = Payment::sum('total_price');

        return [
            'total_today' => $totalToday ?? 0,
            'total_weekly' => $totalWeekly ?? 0,
            'total_monthly' => $totalMonthly ?? 0,
            'total_yearly' => $totalYearly ?? 0,
            'total_overall' => $totalOverall ?? 0,
        ];
    }
    // total payment collations ----------
    protected function getTotalByPeriod($period)
    {
        $startDate = Carbon::now()->startOfDay();
        switch ($period) {
            case 'week':
                $startDate = Carbon::now()->startOfWeek();
                break;
            case 'month':
                $startDate = Carbon::now()->startOfMonth();
                break;
            case 'year':
                $startDate = Carbon::now()->startOfYear();
                break;
        }

        $endDate = Carbon::now()->endOfDay();

        return Payment::whereBetween('created_at', [$startDate, $endDate])->sum('total_price');
    }

    // total booking collations
    public function getTotalBooking()
    {
        $totalToday = $this->getTotalByPeriodType(self::TODAY, Payment::class);
        $totalWeekly = $this->getTotalByPeriodType(self::WEEK, Payment::class);
        $totalMonthly = $this->getTotalByPeriodType(self::MONTH, Payment::class);
        $totalYearly = $this->getTotalByPeriodType(self::YEAR, Payment::class);
        $totalOverall = Payment::count();

        return [
            'total_today' => $totalToday ?? 0,
            'total_weekly' => $totalWeekly ?? 0,
            'total_monthly' => $totalMonthly ?? 0,
            'total_yearly' => $totalYearly ?? 0,
            'total_overall' => $totalOverall ?? 0,
        ];
    }

    // total user collations
    public function getTotalUsers()
    {
        $totalToday = $this->getTotalByPeriodType(self::TODAY, User::class);
        $totalWeekly = $this->getTotalByPeriodType(self::WEEK, User::class);
        $totalMonthly = $this->getTotalByPeriodType(self::MONTH, User::class);
        $totalYearly = $this->getTotalByPeriodType(self::YEAR, User::class);
        $totalOverall = User::count();

        return [
            'total_today' => $totalToday,
            'total_weekly' => $totalWeekly,
            'total_monthly' => $totalMonthly,
            'total_yearly' => $totalYearly,
            'total_overall' => $totalOverall,
        ];
    }

    // total user vijiter
    public function getTotalVisitor()
    {
        $totalToday = $this->getTotalByPeriodType(self::TODAY, ClientDevice::class);
        $totalWeekly = $this->getTotalByPeriodType(self::WEEK, ClientDevice::class);
        $totalMonthly = $this->getTotalByPeriodType(self::MONTH, ClientDevice::class);
        $totalYearly = $this->getTotalByPeriodType(self::YEAR, ClientDevice::class);
        $totalOverall = ClientDevice::count();

        return [
            'total_today' => $totalToday,
            'total_weekly' => $totalWeekly,
            'total_monthly' => $totalMonthly,
            'total_yearly' => $totalYearly,
            'total_overall' => $totalOverall,
        ];
    }

    protected function getTotalByPeriodType($period, $model)
    {
        $startDate = Carbon::now()->startOfDay();

        switch ($period) {
            case self::WEEK:
                $startDate = Carbon::now()->startOfWeek();
                break;
            case self::MONTH:
                $startDate = Carbon::now()->startOfMonth();
                break;
            case self::YEAR:
                $startDate = Carbon::now()->startOfYear();
                break;
            // Add more cases as needed

            // For 'today', use the default start date
        }

        $endDate = Carbon::now()->endOfDay();

        return $model::whereBetween('created_at', [$startDate, $endDate])->count();
    }


}
