<?php
/**
 * Created by PhpStorm.
 * User: fengzixi
 * Date: 2018/1/21
 * Time: 上午11:38
 */

namespace App\Model;



class DownloadRes extends BaseModel
{
    protected $table = 'res_down_list';
    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}