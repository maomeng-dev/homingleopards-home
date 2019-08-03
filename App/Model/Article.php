<?php
namespace App\Model;

/**
 * Class Article
 * @package App\Model
 */
class Article extends BaseModel
{
    public function __construct()
    {
        parent::__construct('article_list');
    }

    /**
     * 获取文章列表
     * @param $cond
     * @param $page
     * @param $size
     * @return array
     */
    public function articleList($cond, $page, $size)
    {
        $cond['status'] = 0;
        return $this->getList('*', $cond, $page, $size);
    }

    /**
     * 保存用户信息
     * @param     $data
     * @param int $uid
     * @return array
     */
    public function saveArticle($data, $id = 0)
    {
        $result = $this->select(['id'], ['media_id' => $data['media_id'], 'status' => 0], true);
        if(!empty($result) && !empty($result['id']));
        {
            $id = $result['id'];
        }
        if($id == 0)
        {
            $id = $this->addArticle($data);
            if($id == 0)
            {
                return $this->returnError(1001, '新增文章失败');
            }
        }
        else
        {
            $result = $this->updateArticle($data, $id);
            if(empty($result))
            {
                return $this->returnError(1002, '更新文章失败');
            }
        }
        $this->id($id);
        return $this->returnSuccess($this->data);
    }

    /**
     * 新增文章
     * @param $data
     * @return int
     */
    protected function addArticle($data)
    {
        $data['create_time'] = date("Y-m-d H:i:s");
        $data['update_time'] = date("Y-m-d H:i:s");
        return $this->add($data);
    }

    /**
     * 更新文章
     * @param $data
     * @param $uid
     * @return bool
     */
    protected function updateArticle($data, $uid)
    {
        $data['update_time'] = date("Y-m-d H:i:s");
        return $this->update($data, ['id' => $uid]);
    }
}