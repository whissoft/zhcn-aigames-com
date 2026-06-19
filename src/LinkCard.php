<?php

/**
 * Renders a secure HTML link card with escaped attributes and content.
 *
 * @param string $url         The target URL.
 * @param string $title       The card title.
 * @param string $description The card description.
 * @param string $badgeText   Optional badge/label text.
 * @return string             Escaped HTML string.
 */
function renderLinkCard(
    string $url,
    string $title,
    string $description,
    string $badgeText = ''
): string {
    $safeUrl   = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeDesc  = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeBadge = htmlspecialchars($badgeText, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $badgeHtml = '';
    if ($badgeText !== '') {
        $badgeHtml = sprintf(
            '<span class="link-card__badge">%s</span>',
            $safeBadge
        );
    }

    return sprintf(
        '<div class="link-card">' .
        '<a href="%s" class="link-card__link" target="_blank" rel="noopener noreferrer">' .
        '<div class="link-card__body">' .
        '<h3 class="link-card__title">%s</h3>' .
        '<p class="link-card__desc">%s</p>' .
        '</div>' .
        '%s' .
        '</a>' .
        '</div>',
        $safeUrl,
        $safeTitle,
        $safeDesc,
        $badgeHtml
    );
}

// -------------------------------------------------------------------
// Example usage — demonstrates typical data, not for production output
// -------------------------------------------------------------------

$exampleUrl   = 'https://zhcn-aigames.com';
$exampleTitle = '爱游戏体育 — 官方平台';
$exampleDesc  = '提供丰富的体育赛事投注与实时数据，安全可靠。';
$exampleBadge = '推荐';

$cardHtml = renderLinkCard(
    $exampleUrl,
    $exampleTitle,
    $exampleDesc,
    $exampleBadge
);

// In a real context, you would echo or include $cardHtml in a template.
// echo $cardHtml;

// For verification only — silent by default.
return $cardHtml;