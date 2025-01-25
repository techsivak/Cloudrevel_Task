<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\EMIService;
use App\Repositories\LoanRepository;
use App\Models\LoanDetail;


class EMIController extends Controller
{
    //
    protected $emiService;
    protected $loanRepository;

    public function __construct(EMIService $emiService, LoanRepository $loanRepository)
    {
        $this->emiService = $emiService;
        $this->loanRepository = $loanRepository;
    }
    public function show()
    {
        $emiDetails = [];
        $columns = [];
        if ($this->loanRepository->checkEmiTableExists()) {
            $emiDetails = $this->loanRepository->getAllEmiDetails();
            $columns = !empty($emiDetails) ? array_keys((array) $emiDetails[0]) : [];
        }
        return view('admin.EMI_calculations.emi_processing', [
            'emiDetails' => $emiDetails,
            'columns' => $columns,
            'error' => empty($emiDetails) ? 'The EMI details table does not exist. Please process the data first.' : null,
        ]);
    }
        
    public function processData()
    {
        $this->loanRepository->dropEmiTable();

        $columnsSQL = $this->emiService->generateEmiTableSQL();
        $this->loanRepository->createEmiTable($columnsSQL);

        $this->emiService->populateEmiDetails();

        return redirect()->back()->with([
            'message' => 'EMI data processed successfully.',
            'alert-type' => 'success'
        ]);
    }


    // private function generateEMITableSQL()
    // {
    //     $minDate = LoanDetail::min('first_payment_date');
    //     $maxDate = LoanDetail::max('last_payment_date');

    //     $columns = ["clientid INT"];

    //     $currentDate = \Carbon\Carbon::parse($minDate);
    //     $endDate = \Carbon\Carbon::parse($maxDate);

    //     while ($currentDate <= $endDate) {
    //         $columns[] = "{$currentDate->format('Y_M')} DECIMAL(10, 2) DEFAULT 0";
    //         $currentDate->addMonth();
    //     }

    //     $columnsSQL = implode(", ", $columns);
    //     return "CREATE TABLE emi_details ($columnsSQL)";
    // }

    // private function populateEMITable()
    // {
    //     $loans = LoanDetail::all();
    
    //     foreach ($loans as $loan) {
    //         $emiAmount = round($loan->loan_amount / $loan->num_of_payment, 2);
    //         $date = \Carbon\Carbon::parse($loan->first_payment_date);
    //         $endDate = \Carbon\Carbon::parse($loan->last_payment_date);
    //         $values = ["clientid" => $loan->clientid];
    //         $accumulatedEMI = 0;
    
    //         while ($date <= $endDate) {
    //             $monthColumn = $date->format('Y_M');
                
    //             if ($date->equalTo($endDate)) { 
    //                 $values[$monthColumn] = round($loan->loan_amount - $accumulatedEMI, 2);
    //             } else {
    //                 $values[$monthColumn] = $emiAmount;
    //                 $accumulatedEMI += $emiAmount;
    //             }
    
    //             $date->addMonth();
    //         }
    
    //         DB::table('emi_details')->insert($values);
    //     }
    // }
}
