<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    const SEX_UN=1;
    const SEX_BOY=2;
    const SEX_GRIL=3;

    protected $table = 'student';

    protected $timesatmp = true;

    protected $fillable =['name','age','sex'];

    public function getDateFormat(){
        return time();
    }

    public function asDateTime($val){
        return $val;
    }

    public function freshTimestamp() {
        return time();
    }

    public function fromDateTime($value) {
        return $value;
    }

    public function getSex($ind=null){
        $arr=[
            self::SEX_UN=>'未知',
            self::SEX_BOY=>'男',
            self::SEX_GRIL=>'女',
        ];
        if($ind!=null){
            return array_key_exists($ind,$arr) ? $arr[$ind] : $arr[self::SEX_UN];
        }
        return $arr;
    }
}
