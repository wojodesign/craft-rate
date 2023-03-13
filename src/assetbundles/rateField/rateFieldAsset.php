<?php

namespace wojodesign\rate\assetbundles\rateField;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class RateFieldAsset extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = '@wojodesign/rate/assetbundles/rateField';

        $this->depends = [
            CpAsset::class,
        ];

        $this->css = [
            'css/rateField.css',
        ];

        parent::init();
    }
}
