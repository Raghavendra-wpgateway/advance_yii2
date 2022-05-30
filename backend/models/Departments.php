<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property int $department_id
 * @property int $branch_id
 * @property int $comapany_id
 * @property string|null $name
 * @property string|null $status
 * @property string|null $created_at
 *
 * @property Branch $branch
 * @property Company $comapany
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['branch_id', 'comapany_id'], 'required'],
            [['branch_id', 'comapany_id'], 'integer'],
            [['status'], 'string'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['comapany_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['comapany_id' => 'company_id']],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branch::class, 'targetAttribute' => ['branch_id' => 'branch_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Department ID',
            'branch_id' => 'Branch ID',
            'comapany_id' => 'Comapany ID',
            'name' => 'Name',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Branch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branch::class, ['branch_id' => 'branch_id']);
    }

    /**
     * Gets query for [[Comapany]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComapany()
    {
        return $this->hasOne(Company::class, ['company_id' => 'comapany_id']);
    }
}
