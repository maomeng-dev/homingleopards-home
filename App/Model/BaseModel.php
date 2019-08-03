<?php
/**
 * Created by PhpStorm.
 * User: fengzixi
 * Date: 2018/1/21
 * Time: 上午11:39
 */

namespace App\Model;

class BaseModel
{
    protected $dbConn;

    protected $tableName;

    protected $data;

    public function __construct($tableName)
    {
        $this->dbConn = \Flight::Db();
        $this->tableName = $tableName;
    }

    /**
     * query data from tables on the condition of id = id, if get results then set to data fields.
     * @param        $id
     * @param string $fields
     * @return bool
     */
    public function id($id, $fields = "*")
    {
        $data = $this->dbConn->select($this->tableName, $fields, ['id' => $id]);
        if(empty($data))
        {
            return false;
        }
        $this->data = $data[0];

        return true;
    }

    /**
     * query data from tables on conditon;
     * @param      $fields
     * @param      $condtion
     * @param bool $isSingle
     * @return |null
     */
    public function select($fields, $condtion, $isSingle = false)
    {
        $data = $this->dbConn->select($this->tableName, $fields, $condtion);
        if(empty($data))
        {
            return null;
        }

        return $isSingle ? $data[0] : $data;
    }

    public function getData()
    {
        return $this->data;
    }

    /**
     * query list of data from tables;
     * @param       $fields
     * @param       $condtion
     * @param int   $page
     * @param int   $size
     * @param array $order
     * @return array
     */
    public function getList($fields, $condtion, $page = 1, $size = 10, $order = ['id' => 'DESC'])
    {
        $page = intval($page) ? intval($page) : 1;
        $size = intval($size) ? intval($size) : 10;
        $count = $this->getCount($condtion);
        if($count == 0)
        {
            return ['count' => 0, 'success' => false, 'data' => [], 'msg' => 'data is empty'];
        }
        $start = ($page - 1) * $size;
        $end = $start + $size;
        if($count < $end)
        {
            //return ['count' => $count, 'data' => [], 'success' => false, 'msg' => 'Request more than limit'];
        }
        $condtion['LIMIT'] = [$start, $size];
        $condtion['ORDER'] = $order;

        $data = $this->dbConn->select($this->tableName, $fields, $condtion);

        return ['count' => $count, 'data' => $data, 'success' => true, 'msg' => 'success'];
    }

    public function getCount($condtion)
    {
        try
        {
            return $this->dbConn->count($this->tableName, $condtion);
        }
        catch(\PDOException $exception)
        {
            var_dump($exception->getMessage());

            return 0;
        }
    }

    /**
     * add data to the table, return id when success;
     * @param $data
     * @return int
     */
    public function add($data)
    {
        try
        {
            $retsult = $this->dbConn->insert($this->tableName, $data);
            if($retsult)
            {
                return $this->dbConn->id();
            }
        }
        catch(\PDOException $exception)
        {
            var_dump($exception->getMessage());

            return 0;
        }
    }

    public function update($data, $condtion)
    {
        try
        {
            return $this->dbConn->update($this->tableName, $data, $condtion);
        }
        catch(\Exception $exception)
        {
            var_dump($exception->getMessage());

            return false;
        }
    }

    public function returnSuccess($data, $msg = '操作成功')
    {
        return ['success' => true, 'code' => 200, 'msg' => $msg, 'data' => $data];
    }

    public function returnError($code = 404, $msg = '找不到用户')
    {
        return ['success' => false, 'code' => 404, 'msg' => $msg];
    }
}