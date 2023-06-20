<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
    // use SoftDeletes;
    protected $fillable = ['generic_name','form','restriction_formula','price','image','description','category_id','faskes1','faskes2','faskes3'];
    //
    public function category(){
        return $this->belongsTo("App\Category", "category_id");
    }
    
    public function transactions()
    {
        return $this->belongsToMany('App\Transaction','medicine_transaction','medicine_id','transaction_id')->withPivot('quantity','subtotal');
    }
}