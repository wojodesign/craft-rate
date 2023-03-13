<?php

namespace wojodesign\rate\models;

use yii\base\Model;

class RateFieldModel extends Model
{
    public function rules()
    {
        return [
            [
                [
                    'nominal',
                    'annual',
                    'type'
                ],
                'safe',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'nominal' => 'Nominal',
            'annual' => 'Annual',
            'type' => 'Type'
        ];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return implode( " ", [ $this->nominal, $this->annual, $this->type ]
        );
    }

    public $nominal;
    public $annual;

    public $type;


    /**
     * @return mixed
     */
    public function getNominal()
    {
        return $this->nominal;
    }

    /**
     * @return mixed
     */
    public function getAnnual()
    {
        return $this->annual;
    }

    public function getType()
    {
        return $this->type;
    }
    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty(
        array_filter(
            [
                $this->nominal,
                $this->annual
            ]
        )
        );
    }

}
