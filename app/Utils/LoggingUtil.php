<?php
/**
 * Created by PhpStorm.
 * User: BaoHoang
 * Date: 11/5/2022
 * Time: 15:30
 */

namespace App\Utils;


use App\Common\SingletonPattern;
use App\Jobs\LogTrafficJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class LoggingUtil extends SingletonPattern
{

    protected function __construct()
    {
    }

    /**
     * @return LoggingUtil
     */
    public static function getInstance()
    {
        return parent::getInstance(); // TODO: Change the autogenerated stub
    }

    public function log(Request $request)
    {
        if (!$request->isMethod('get')) {
            return;
        }
        if ($request->ajax()) {
            return;
        }

        $fullUrl = $request->fullUrl() ?? '';
        $refererUrl = $request->server('HTTP_REFERER') ?? '';
        $query = $request->query() ?? [];
        $userAgent = $request->userAgent() ?? '';
        $ip = $request->ip() ?? '';
        $data = $request->all() ?? [];
        $customerUuid = $this->getCustomerUuid();
        $token = config('api.token');
        $method = $request->method();
        $timestamp = now()->timestamp;
        $timezone = config('app.timezone');
        $sessionId = $request->session()->getId();

        $message = compact(
            'fullUrl',
            'refererUrl',
            'query',
            'userAgent',
            'ip',
            'data',
            'customerUuid',
            'token',
            'method',
            'timestamp',
            'timezone',
            'sessionId'
        );

        LogTrafficJob::dispatch($message);
    }

    private function getCustomerUuid()
    {
        $customerUuid = Cookie::get('ecuuid');
        if (empty($customerUuid)) {
            $customerUuid = md5(Str::uuid()->toString() . '_' . gethostbyaddr($_SERVER["REMOTE_ADDR"] ?? '127.0.0.1'));
            Cookie::queue(Cookie::forever('ecuuid', $customerUuid));
        }
        return $customerUuid;
    }

}