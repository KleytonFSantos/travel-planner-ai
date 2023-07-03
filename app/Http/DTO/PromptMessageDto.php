<?php

namespace App\Http\DTO;

class PromptMessageDto
{
    private string $locale;

    private string $startDate;

    private string $endDate;

    public function __construct(
        private readonly array $messageData,
    ) {
        $this->locale = $messageData['locale'];
        $this->startDate = $messageData['startDate'];
        $this->endDate = $messageData['endDate'];
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }

    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
    }
}
