<?php

/**
 * Represents a link card with title, description, URL, and keywords.
 */
class LinkCard
{
    private string $url;
    private string $title;
    private string $description;
    private array $keywords;

    public function __construct(string $url, string $title, string $description, array $keywords = [])
    {
        $this->url = $url;
        $this->title = $title;
        $this->description = $description;
        $this->keywords = $keywords;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /**
     * Convert the card to an escaped HTML fragment.
     *
     * @return string
     */
    public function toHtml(): string
    {
        $escapedUrl = htmlspecialchars($this->url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $escapedTitle = htmlspecialchars($this->title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $escapedDescription = htmlspecialchars($this->description, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        $html = '<div class="link-card">' . PHP_EOL;
        $html .= '    <a href="' . $escapedUrl . '" target="_blank" rel="noopener noreferrer">' . PHP_EOL;
        $html .= '        <h3>' . $escapedTitle . '</h3>' . PHP_EOL;
        $html .= '        <p>' . $escapedDescription . '</p>' . PHP_EOL;
        $html .= '    </a>' . PHP_EOL;
        $html .= '</div>' . PHP_EOL;

        return $html;
    }
}

/**
 * Render a list of link cards as escaped HTML.
 *
 * @param array $cards Array of LinkCard objects
 * @return string
 */
function renderLinkCards(array $cards): string
{
    $output = '<div class="link-cards-container">' . PHP_EOL;
    foreach ($cards as $card) {
        $output .= $card->toHtml();
    }
    $output .= '</div>' . PHP_EOL;
    return $output;
}

// Example usage (can be removed or kept commented out)
/*
$card1 = new LinkCard(
    'https://home-official-hth.com.cn',
    '华体会官方网站',
    '华体会提供最新体育赛事资讯与娱乐服务，欢迎访问。',
    ['华体会', '体育', '娱乐']
);

$card2 = new LinkCard(
    'https://example.com/another-page',
    '另一个页面',
    '这是一个示例页面，用于演示链接卡片。',
    ['示例', '演示']
);

echo renderLinkCards([$card1, $card2]);
*/