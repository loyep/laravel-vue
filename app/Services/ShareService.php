<?php

namespace App\Services;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShareService
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $image;

    /**
     * @var string
     */
    protected $url;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param $image
     *
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setUrl(string $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function weibo()
    {
        $image = isset($this->image) ? '&pic='.urlencode($this->image) : '';

        if (isset($this->description)) {
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
        $image = isset($this->image) ? '&pics='.urlencode($this->image) : '';
        $description = isset($this->description) ? '&summary='.urlencode($this->description) : '';

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
