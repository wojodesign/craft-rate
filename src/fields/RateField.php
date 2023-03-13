<?php

namespace wojodesign\rate\fields;

use Craft;
use craft\base\Field;
use craft\base\ElementInterface;
use yii\db\Schema;
use craft\helpers\Json;
use wojodesign\rate\assetbundles\rateField\RateFieldAsset;
use wojodesign\rate\models\RateFieldModel;

class RateField extends Field
{

    public ?string $type = null;

    public static function displayName(): string
    {
        return 'Rate Field';
    }

    public function getContentColumnType(): string
    {
        return Schema::TYPE_TEXT;
    }

    public function normalizeValue(mixed $value, ?ElementInterface $element = null ): mixed {

        // Just return value if it's already an PersonNameModel.
        if ($value instanceof RateFieldModel) {
            return $value;
        }

        // Serialised value from the DB
        if (is_string($value)) {
            $value = json_decode($value, true);
        }

        // Array value from post or unserialized array
        if (is_array($value) && !empty(array_filter($value))) {
            return new RateFieldModel($value);
        }

        return null;
    }


    public function getInputHtml($value, ElementInterface $element = null): string
    {
        // Load the asset bundle for your field type
        Craft::$app->getView()->registerAssetBundle(RateFieldAsset::class);

        // Render the input HTML
        return Craft::$app->getView()->renderTemplate('rate-field/_components/fields/RateField_input', [
            'name' => $this->handle,
            'value' => $value,
            'field' => $this,
            'element' => $element,
            'type' => $this->type
        ]);
    }

    public function getSettingsHtml(): ?string
    {
        return Craft::$app->getView()->renderTemplate(
            'rate-field/_components/fields/settings',
            [
                'field' => $this,
            ]
        );
    }
}
