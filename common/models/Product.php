<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $product_name
 * @property string $product_image_url
 * @property string $product_description
 * @property int $product_price
 * @property int $product_quantity
 * @property int $product_category_id
 *
 * @property ProductCategory $productCategory
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_name', 'product_image_url', 'product_description', 'product_price', 'product_quantity', 'product_category_id'], 'required'],
            [['product_description'], 'string'],
            [['product_price', 'product_quantity', 'product_category_id'], 'integer'],
            [['product_name'], 'string', 'max' => 100],
            [['product_image_url'], 'string', 'max' => 255],
            [['product_name'], 'unique'],
            [['product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::class, 'targetAttribute' => ['product_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_name' => 'Product Name',
            'product_image_url' => 'Product Image Url',
            'product_description' => 'Product Description',
            'product_price' => 'Product Price',
            'product_quantity' => 'Product Quantity',
            'product_category_id' => 'Product Category ID',
        ];
    }

    /**
     * Gets query for [[ProductCategory]].
     *
     * @return \yii\db\ActiveQuery|ProductCategoryQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::class, ['id' => 'product_category_id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}
