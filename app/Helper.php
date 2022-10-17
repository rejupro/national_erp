<?php
/**
* get company data
*
*/

function companyData()
{
        return \App\Company::first();
}
function branchData()
{
        if(\App\Branch::find(Auth::User()->brand_id)){
          return \App\Branch::where('id',Auth::User()->brand_id)->first();
        }else{
          return \App\Company::first();      
        }
        
}