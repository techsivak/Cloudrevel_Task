<?php

namespace App\Services;

use App\Repositories\LoanRepository;
use Carbon\Carbon;

class EMIService
{
    protected $loanRepository;

    public function __construct(LoanRepository $loanRepository)
    {
        $this->loanRepository = $loanRepository;
    }

    public function generateEmiTableSQL()
    {
        $minDate = $this->loanRepository->getMinFirstPaymentDate();
        $maxDate = $this->loanRepository->getMaxLastPaymentDate();

        $columns = ["clientid INT"];
        $currentDate = Carbon::parse($minDate);
        $endDate = Carbon::parse($maxDate);

        while ($currentDate <= $endDate) {
            $columns[] = "{$currentDate->format('Y_M')} DECIMAL(10, 2) DEFAULT 0";
            $currentDate->addMonth();
        }

        return implode(", ", $columns);
    }

    public function populateEmiDetails()
    {
        $loans = $this->loanRepository->getLoanDetails();

        foreach ($loans as $loan) {
            $emiAmount = round($loan->loan_amount / $loan->num_of_payment, 2); 
            $date = Carbon::parse($loan->first_payment_date);
            $values = ["clientid" => $loan->clientid];
            $accumulatedEMI = 0;

            for ($i = 0; $i < $loan->num_of_payment; $i++) {
                $monthColumn = $date->format('Y_M');
                if ($i < $loan->num_of_payment - 1) {
                    $values[$monthColumn] = $emiAmount;
                    $accumulatedEMI += $emiAmount;
                } else {
                    $values[$monthColumn] = round($loan->loan_amount - $accumulatedEMI, 2);
                }
                $date->addMonth();
            }
            $this->loanRepository->insertEmiRecord($values);
        }
    }
}
