<?php
/**
 * Created by PhpStorm.
 * User: fengzixi
 * Date: 2018/1/21
 * Time: 上午11:39
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    public function __construct(array $attributes = [])
    {
        \Flight::Capsule();
        parent::__construct($attributes);
    }
    
    public function del()
    {
        $this->runSoftDelete();
    }
}