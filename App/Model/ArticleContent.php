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
    public function getContent($aid, $url)
    {
        $result = $this->select(['content'], ['a_id' => $aid], true);
        $titleImg = '<img data-src="https://mmbiz.qpic.cn/mmbiz_gif/U3GCYnicWcLNy7oicebEAvTshsLY97d5ibOVicuACnxh9FzD6iaCu8E7u7t0j9oGaQKTMoc5PN8IVPq1gqsOyGH5A6Q/640?wx_fmt=gif" data-type="gif" class="" data-ratio="0.1088" data-w="625"  />';
        //var_dump($result['content']);
        $result['content'] = str_replace(
            $titleImg,
            "<a href='{$url}' >{$titleImg}</a>",
            $result['content']
        );
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