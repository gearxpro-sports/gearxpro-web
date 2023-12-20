<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class IpApiService
{
    /**
     * @var Collection|null
     */
    private ?Collection $ipInfo = null;

    /**
     * @param  string  $ip
     */
    public function __construct(private string $ip)
    {
        if (env('IP_API_KEY')) {
            $basePath = 'http://pro.ip-api.com/json/';
            $url = $basePath.$this->ip."?key=".env('IP_API_KEY');
        } else {
            $basePath = 'http://ip-api.com/json/';
            $url = $basePath.$this->ip;
        }
        $this->ipInfo = rescue(fn() => Http::get($url)->collect());
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @param  string  ...$fields
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
