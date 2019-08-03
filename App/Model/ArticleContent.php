<?php


namespace App\Model;

/**
 * 文章内容表
 * Class ArticleContent
 * @package App\Model
 */
class ArticleContent extends BaseModel
{
    public function __construct()
    {
        parent::__construct('article_content');
    }

    /**
     * 返回内容
     * @param $aid
     */
    public function getContent($aid)
    {
        $result = $this->select(['content'], ['a_id' => $aid], true);
        return $result['content'] ?? '';
    }

    /**
     * 保存内容
     * @param $aid
     * @param $content
     */
    public function saveContent($aid, $content)
    {
        $result = $this->select(['id'], ['a_id' => $aid], true);
        $id = $result['id'] ?? 0;
        if($id > 0)
        {
            return $this->update(['content' => $content], ['id' => $id]);
        }
        else
        {
            return $this->add(['content' => $content, 'a_id' => $aid]);
        }
    }
}