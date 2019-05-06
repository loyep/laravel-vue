<?php

namespace App\Services;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * Class ShareService
 */
class ShareService
{
    /**
     * @var string|null
     */
    protected $title;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var string|null
     */
    protected $image;

    /**
     * @var string|null
     */
    protected $url;

    /**
     * ShareService constructor.
     *
     * @param string $url
     * @param string $title
     * @param string $description
     * @param string $image
     */
    public function __construct(string $url, $title = '', $description = '', $image = '')
    {
        $this->url = $url;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function weibo()
    {
        $image = !empty($this->image) ? '&pic=' . urlencode($this->image) : '';

        if (!empty($this->description)) {
            $text = urlencode(sprintf('【%s】%s', $this->title, $this->description));
        } else {
            $text = $this->title;
        }

        $share_link = sprintf('//service.weibo.com/share/share.php?url=%s&type=button&language=zh_cn&title=%s%s&searchPic=true', urlencode($this->url), $text, $image);

        return $share_link;
    }

    /**
     * @return string
     */
    public function qq()
    {
        $image = !empty($this->image) ? '&pics=' . urlencode($this->image) : '';
        $description = !empty($this->description) ? '&summary=' . urlencode($this->description) : '';

        $share_link = sprintf('https://connect.qq.com/widget/shareqq/index.html?url=%s&title=%s%s%s', urlencode($this->url), urlencode($this->title), $image, $description);

        return $share_link;
    }

    /**
     * @return string
     */
    public function weixin()
    {
        $share_link = 'data:image/png;base64,'.base64_encode(QrCode::format('png')->size(320)->generate($this->url));

        return $share_link;
    }

    /**
     * facebook.
     */
    public function facebook()
    {
        $share_link = sprintf('https://www.facebook.com/sharer.php?u=%s', urlencode($this->url));

        return $share_link;
    }

    /**
     * twitter.
     */
    public function twitter()
    {
        $share_link = sprintf('https://twitter.com/intent/tweet?url=%s', urlencode($this->url));

        return $share_link;
    }

    /**
     * linkedin.
     */
    public function linkedin()
    {
        $share_link = sprintf('https://www.linkedin.com/shareArticle?mini=true&url=%s&title=%s&summary=%s', urlencode($this->url), urlencode($this->title), urlencode($this->description));

        return $share_link;
    }
}
