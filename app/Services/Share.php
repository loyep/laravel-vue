<?php

namespace App\Services;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Share
{

    protected $title;

    protected $des;

    protected $pic;

    protected $url;

    /**
     * Share constructor.
     * @param string $url
     * @param string|null $title
     * @param string|null $des
     * @param string|null $pic
     */
    public function __construct(string $url, string $title = null, string $des = null, string $pic = null)
    {
        $this->url = $url;
        $this->title = $title;
        $this->des = $des;
        $this->pic = $pic;
    }

    /**
     * @return string
     */
    public function weibo()
    {
        $pic = isset($this->pic) ? '&pic=' . urlencode($this->pic) : '';

        if (isset($this->des)) {
            $text = urlencode(sprintf('【%s】%s', $this->title, $this->des));
        } else {
            $text = $this->title;
        }

        $share_link = sprintf('//service.weibo.com/share/share.php?url=%s&type=button&language=zh_cn&title=%s%s&searchPic=true', urlencode($this->url), $text, $pic);

        return $share_link;
    }

    /**
     * @return string
     */
    public function qq()
    {
        $pic = isset($this->pic) ? '&pics=' . urlencode($this->pic) : '';
        $des = isset($this->des) ? '&summary=' . urlencode($this->des) : '';

        $share_link = sprintf('https://connect.qq.com/widget/shareqq/index.html?url=%s&title=%s%s%s', urlencode($this->url), urlencode($this->title), $pic, $des);

        return $share_link;
    }

    /**
     * @return string
     */
    public function weixin()
    {
        $share_link = 'data:image/png;base64,' . base64_encode(QrCode::format('png')->size(320)->generate($this->url));
        return $share_link;
    }

    /**
     * facebook
     */
    public function facebook()
    {
        $share_link = sprintf('https://www.facebook.com/sharer.php?u=%s', urlencode($this->url));
        return $share_link;
    }

    /**
     * twitter
     */
    public function twitter()
    {
        $share_link = sprintf('https://twitter.com/intent/tweet?url=%s', urlencode($this->url));
        return $share_link;
    }

}
