<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class IpApiService
{
    const BASE_PATH = 'http://ip-api.com/json/';

    /**
     * @var Collection|null
     */
    private ?Collection $ipInfo = null;

    /**
     * @param string $ip
     */
    public function __construct(private string $ip)
    {
        $this->ipInfo = rescue(fn () => Http::get(self::BASE_PATH.$this->ip)->collect());
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @param string ...$fields
     * @return array|string|null
     */
    public function getIpInfo(string ...$fields): array|string|null
    {
        if (!$this->ipInfo || 'fail' === $this->ipInfo->get('status')) {
            return null;
        }

        if ($fields) {
            if (count($fields) > 1) {
                return $this->ipInfo->only($fields)->toArray();
            }

            return $this->ipInfo->get($fields[0]);
        }

        return $this->ipInfo->toArray();
    }
}
