<?php 

namespace wojodesign\rate;

use Craft;
use craft\events\RegisterComponentTypesEvent;
use craft\services\Fields;
use yii\base\Event;
use wojodesign\rate\fields\RateField;


class Plugin extends \craft\base\Plugin
{
    public function init(): void
    {
    
        // Defer most setup tasks until Craft is fully initialized:
        Craft::$app->onInit(function() {

            // Register our field type.
            Event::on(
                Fields::class,
                Fields::EVENT_REGISTER_FIELD_TYPES,
                function(RegisterComponentTypesEvent $event) {
                    $event->types[] = RateField::class;
                }
            );
        });
    }

}