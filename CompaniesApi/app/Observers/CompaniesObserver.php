<?php


namespace App\Observers;

use App\Company;

class CompaniesObserver
{
    public function creating(Company $company)
    {
        $company->company_code = strtoupper(str_random(3)) ."". date('Ymd') ."". rand(999, 9999);
    }

    public function created(Company $company)
    {
//        $ticketNumber = "CMP/". date('Ymd') ."/". rand(999, 9999);
//
//        //create ticket
//        $company->ticket()->create([
//            'ticket_number' => $ticketNumber
//        ]);
    }

    public function updating(Company $company)
    {

    }

    public function updated(Company $company)
    {

    }

    public function saving(Company $company)
    {

    }

    public function saved(Company $company)
    {

    }

    public function deleting(Company $company)
    {

    }

    public function deleted(Company $company)
    {

    }

    public function restoring(Company $company)
    {

    }

    public function restored(Company $company)
    {

    }

    public function retrieved(Company $company)
    {

    }
}
