<?php

declare(strict_types=1);

namespace App\Domain\Invoice\ValueObjects\Report;

use App\Domain\Invoice\ValueObjects\Report\ReportPage;

/**
 * 請求書ページコレクション
 */
final class ReportPageCollection
{
    /**
     * @param ReportPage[] $pages
     */
    public function __construct(public readonly array $pages)
    {
    }

    public function getSalesCount(): int
    {
        return array_reduce(
            $this->pages,
            fn (int $c, ReportPage $page) => $c + $page->salesCount,
            0
        );
    }

    public function getPagesCount(): int
    {
        return count($this->pages);
    }

    public function getSalesAmount(): int
    {
        return array_reduce(
            $this->pages,
            fn (int $c, ReportPage $page) => $c + $page->salesAmount,
            0
        );
    }
}
