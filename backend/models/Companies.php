<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $company_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $status
 * @property string|null $address
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Branch[] $branches
 * @property Department[] $departments
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'address'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'name' => 'Name',
            'email' => 'Email',
            'status' => 'Status',
            'address' => 'Address',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Branches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branch::class, ['company_id' => 'company_id']);
    }

    /**
     * Gets query for [[Departments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::class, ['comapany_id' => 'company_id']);
    }
}
