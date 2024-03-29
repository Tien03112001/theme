<?php
/**
 * Created by PhpStorm.
 * User: BaoHoang
 * Date: 7/4/2022
 * Time: 15:29
 */

namespace App\Utils\Caches;


use App\Models\AppSetting;
use App\Repository\AppSettingRepositoryInterface;

class AppSettingUtil extends AbstractCacheDataUtil
{

    /**
     * @return AppSettingUtil
     */
    public static function getInstance()
    {
        return parent::getInstance(); // TODO: Change the autogenerated stub
    }

    public function __construct()
    {
        parent::__construct('app_settings', AppSettingRepositoryInterface::class, AppSetting::class);
    }

}