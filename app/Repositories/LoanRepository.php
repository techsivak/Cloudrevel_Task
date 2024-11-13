<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\LoanDetail;

class LoanRepository
{
    public function getLoanDetails()
    {
        return LoanDetail::all();
    }

    public function getMinFirstPaymentDate()
    {
        return LoanDetail::min('first_payment_date');
    }

    public function getMaxLastPaymentDate()
    {
        return LoanDetail::max('last_payment_date');
    }

    public function checkEmiTableExists()
    {
        return DB::select("SHOW TABLES LIKE 'emi_details'");
    }

    public function dropEmiTable()
    {
        DB::statement("DROP TABLE IF EXISTS emi_details");
    }

    public function createEmiTable($columnsSQL)
    {
        DB::statement("CREATE TABLE emi_details ($columnsSQL)");
    }

    public function insertEmiRecord($values)
    {
        DB::table('emi_details')->insert($values);
    }

    public function getAllEmiDetails()
    {
        return DB::select("SELECT * FROM emi_details");
    }
}
